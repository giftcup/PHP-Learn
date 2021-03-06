<?php
require 'includes/database.inc.php';
require 'header.php';
?>

<main>
    <h2>Other Users</h2>

    <div class="registered">
        <?php

        if (isset($_SESSION['userName'])) :
            $sql = "SELECT * FROM users;";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) :
                while ($row = mysqli_fetch_assoc($result)) :
                    $fid = $row['user_id'];
                    $id = $_SESSION['userId'];

                    $sqlFriends = "SELECT * FROM friends WHERE user_id=? AND friend_id=?;";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sqlFriends)) :
                        header("Location: index.php?sqlerror");
                    endif;
                    mysqli_stmt_bind_param($stmt, "ss", $id, $fid);
                    mysqli_stmt_execute($stmt);
                    $resultFriends = mysqli_stmt_get_result($stmt);
                    $resultNum = mysqli_num_rows($resultFriends);
                    $rows = mysqli_fetch_assoc($resultFriends);

                    if ($fid == $id || $resultNum > 0)
                        continue;
        ?>
                    <div class="user">
                        <div class="userImg">

                            <?php
                            $resultImg = get_picture($fid, $conn);

                            if (mysqli_num_rows($resultImg) == 1) :
                                $rowImg = mysqli_fetch_assoc($resultImg);
                                $fileActExt = display_pic($fid);

                                if ($rowImg['status'] == 1) :
                            ?>
                                    <img src="<?php echo 'uploads/profile' . $fid . '.' . $fileActExt . '?' . mt_rand() ?>" alt="profile_image">
                                <?php else : ?>
                                    <img src="uploads/profiledefault.jpg" alt="profile_image">
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <div class="userInfo">
                            <p class="uname"><?php echo $row['uname'] ?></p>
                            <div>
                                <form action="includes/add.inc.php" method="POST">
                                    <input type="hidden" value="<?php $row['user_id'] ?>" name="friend">
                                    <button type="submit" name="submit-add" class="submit">Follow</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        <?php else : ?>
            <p>You are logged out!</p>
        <?php endif; ?>
    </div>
</main>

<?php
require 'footer.php';
?>

</body>

</html>