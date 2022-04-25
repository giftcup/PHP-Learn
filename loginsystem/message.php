<?php
session_start();
include 'includes/database.inc.php';
include 'header.php';
?>

<main class="messages">

    <?php

    if (!isset($_SESSION['userId'])) {
        echo '<h1>You are logged out</h1>';
        exit();
    }

    ?>

    <div class="contact-list">

        <h1>Messages</h1>
        <div class="friends">
            <?php

            $user_id = $_SESSION['userId'];

            $sql = "SELECT * FROM friends WHERE user_id=?";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: index.php?error");
                exit();
            }
            mysqli_stmt_bind_param($stmt, "s", $user_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

                    $fid = $row['friend_id'];

                    echo '  <a class="user-message" href="./message.php?friendId=' . $fid . '">
                            <div class="userImg-message"> ';

                    $sqlImg = "SELECT * FROM profileimg WHERE user_id=?";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sqlImg)) {
                        header("Location: index.php?sqlError");
                        exit();
                    }
                    mysqli_stmt_bind_param($stmt, "s", $fid);
                    mysqli_stmt_execute($stmt);
                    $resultImg = mysqli_stmt_get_result($stmt);

                    if (mysqli_num_rows($resultImg) == 1) {
                        $rowImg = mysqli_fetch_assoc($resultImg);
                        $file = 'uploads/profile' . $fid . '.' . '*';
                        $fileInfo = glob($file);
                        $fileExt = explode('.', $fileInfo[0]);
                        $fileActExt = strtolower(end($fileExt));

                        if ($rowImg['status'] == 1) {
                            echo '<img src="uploads/profile' . $fid . '.' . $fileActExt . '?' . mt_rand() . '" alt="profile_image">';
                        } else {
                            echo '<img src="uploads/profiledefault.jpg" alt="profile_image">';
                        }
                    }
                    echo  '</div>';

                    $sqlFriend = "SELECT * FROM users WHERE user_id=?;";
                    $stmt = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($stmt, $sqlFriend)) {
                        echo 'Error querying database';
                        exit();
                    }
                    mysqli_stmt_bind_param($stmt, "s", $fid);
                    mysqli_stmt_execute($stmt);
                    $resultsFriends = mysqli_stmt_get_result($stmt);
                    $numOfResults = mysqli_num_rows($resultsFriends);

                    if ($numOfResults > 1) {
                        echo "An erro occured. Blocking process...";
                        exit();
                    }
                    $row = mysqli_fetch_assoc($resultsFriends);
                    $username = $row['uname'];

                    echo '   <div class="userInfo-message">
                                <h4>' . $row['uname'] . '</h4>
                                <p class="last-message">Lorem ipsum dolor sit amet consectetur</p>
                            </div>
                        </a>';
                }
            }
            ?>
        </div>

    </div>

    <div class="text-area">
        <div class="user-info">
            <div class="userImg">
                <?php

                if (!isset($_GET['friendId'])) {
                } else {
                    $fid = $_GET['friendId'];

                    $sqlImg = "SELECT * FROM profileimg WHERE user_id=?";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sqlImg)) {
                        header("Location: index.php?sqlError");
                        exit();
                    }
                    mysqli_stmt_bind_param($stmt, "s", $fid);
                    mysqli_stmt_execute($stmt);
                    $resultImg = mysqli_stmt_get_result($stmt);

                    if (mysqli_num_rows($resultImg) == 1) {
                        $rowImg = mysqli_fetch_assoc($resultImg);
                        $file = 'uploads/profile' . $fid . '.' . '*';
                        $fileInfo = glob($file);
                        $fileExt = explode('.', $fileInfo[0]);
                        $fileActExt = strtolower(end($fileExt));

                        if ($rowImg['status'] == 1) {
                            echo '<img src="uploads/profile' . $fid . '.' . $fileActExt . '?' . mt_rand() . '" alt="profile_image">';
                        } else {
                            echo '<img src="uploads/profiledefault.jpg" alt="profile_image">';
                        }
                    }
                }
                ?>
            </div>
            <p class="uname"><?php echo $username; ?></p>
        </div>
        <div class="message-area">

            <?php 
            
            $sql = "SELECT * FROM message WHERE ";
            $stmt = mysqli_stmt_init($conn);

            ?>


            <div class="sent">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac luctus est. Morbi viverra pellentesque enim a interdum. Praesent tincidunt ornare nulla</p>
            </div>
            <div class="received">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac luctus est. Morbi viverra pellentesque enim a interdum. Praesent tincidunt ornare nulla, vitae finibus magna fringilla a. Fusce maximus mattis purus. Nam risus elit, vehicula quis .</p>
            </div>
            <div class="received">
                <p> Praesent tincidunt ornare nulla, vitae finibus magna fringilla a. Fusce maximus mattis purus. Nam risus elit, vehicula quis .</p>
            </div>
            <div class="sent">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac luctus est. Morbi viverra pellentesque enim a interdum. Praesent tincidunt ornare nulla</p>
            </div>
            <div class="sent">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac luctus est. Morbi viverra pellentesque enim a interdum. Praesent tincidunt ornare nulla</p>
            </div>
            <div class="received">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac luctus est. Morbi viverra pellentesque enim a interdum. Praesent tincidunt ornare nulla, vitae finibus magna fringilla a. Fusce maximus mattis purus. Nam risus elit, vehicula quis .</p>
            </div>
            <div class="sent">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac luctus est. Morbi viverra pellentesque enim a interdum. Praesent tincidunt ornare nulla</p>
            </div>
            <div class="received">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac luctus est. Morbi viverra pellentesque enim a interdum. Praesent tincidunt ornare nulla, vitae finibus magna fringilla a. Fusce maximus mattis purus. Nam risus elit, vehicula quis .</p>
            </div>
        </div>
        <div class="send-area">
            <!-- <div class="message-form"> -->
            <form action="includes/send_message.inc.php" method="POST">
                <input type="hidden" value=<?php echo $fid; ?> name="friend_id">
                <textarea name="message" id="message"></textarea>
                <button type="submit" name="send-message" class="send-message"><i class="fas fa-paper-plane"></i></button>
            </form>
            <!-- </div> -->
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>