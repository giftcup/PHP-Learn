<!-- Contains information about the user's friends -->

<?php
session_start();
require 'includes/database.inc.php';
require 'header.php';
?>

<main>
    <h2>Your Friends</h2>

    <div class="registered">
        <?php
        if (isset($_SESSION['userName'])) :
            $id = $_SESSION['userId'];
            $sql = "SELECT * FROM friends WHERE user_id=?;";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) :
                header("Location: index.php?sqlError");
                exit();
            endif;
            mysqli_stmt_bind_param($stmt, "s", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) :
                while ($row = mysqli_fetch_assoc($result)) :
                    $fid = $row['friend_id'];

                    if ($fid == $_SESSION['userId'])
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
                                    <img src=<?php echo 'uploads/profile' . $fid . '.' . $fileActExt . '?' . mt_rand() ?> alt="profile_image">
                                <?php else : ?>
                                    <img src="uploads/profiledefault.jpg" alt="profile_image">
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>

                        <div class="userInfo">
                            <?php
                            $resultUser = get_user($fid, $conn);

                            if (mysqli_num_rows($resultUser) == 1) :
                                $rowUser = mysqli_fetch_assoc($resultUser);
                            ?>
                                <p class="uname"> <?php echo $rowUser['uname']; ?> </p>
                                <div>
                                    <form action="includes/remove.inc.php" method="POST">
                                        <input type="hidden" value="<?php echo $row['friend_id']; ?>" name="friend">
                                        <div class="buttons">
                                            <button type="submit" name="submit-remove" class="submit">Unfollow</button>
                                        </div>
                                    </form>
                                    <form action="includes/message.inc.php" method="POST">
                                        <input type="hidden" value="<? echo $row['friend_id'] ?>" name="friend">
                                        <div class="buttons">
                                            <button type="submit" name="submit-add" class="submit">Message</button>
                                        </div>
                                    </form>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        <?php else : ?>
            <p>You are logged out!</p>
        <?php endif; ?>
    </div>

</main>
<?php require 'footer.php'; ?>

</body>

</html>