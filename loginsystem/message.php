<?php

session_start();
require 'includes/database.inc.php';
include 'includes/sort_messages.inc.php';
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
        <div class="msg-ttl">
            <h1>Messages</h1>
        </div>
        <div class="friends">
            <?php

            $user_id = $_SESSION['userId'];
            $result = get_friends($user_id, $conn);

            if (mysqli_num_rows($result) > 0) :
                while ($row = mysqli_fetch_assoc($result)) :

                    $fid = $row['friend_id'];
            ?>

                    <a class="user-message" href="./message.php?friendId=<?php echo $fid; ?>">
                        <div class="userImg-message">

                            <?php
                            $resultImg = get_picture($fid, $conn);

                            if (mysqli_num_rows($resultImg) == 1) :
                                $rowImg = mysqli_fetch_assoc($resultImg);
                                $fileActExt = display_pic($fid);

                                if ($rowImg['status'] == 1) :
                            ?>
                                    <img src="<?php 'uploads/profile' . $fid . '.' . $fileActExt . '?' . mt_rand() ?>" alt="profile_image">';
                                <?php else : ?>
                                    <img src="uploads/profiledefault.jpg" alt="profile_image">';
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>

                        <?php
                        $resultsFriends = get_user($fid, $conn);
                        $numOfResults = mysqli_num_rows($resultsFriends);

                        if ($numOfResults > 1) :
                            echo "An error occured. Blocking process...";
                            exit();
                        endif;
                        $row = mysqli_fetch_assoc($resultsFriends);
                        ?>
                        <div class="userInfo-message">
                            <h4><?php $row['uname'] ?></h4>
                            <p class="last-message">Lorem ipsum dolor sit amet consectetur</p>
                        </div>
                    </a>';
            <?php endwhile;
            endif;
            ?>
        </div>

    </div>

    <div class="text-area">
        <div class="user-info">
            <div class="userImg">
                <?php

                if (!isset($_GET['friendId'])) :
                else :
                    $fid = $_GET['friendId'];

                    $resultImg = get_picture($fid, $conn);

                    if (mysqli_num_rows($resultImg) == 1) :
                        $rowImg = mysqli_fetch_assoc($resultImg);
                        $fileActExt = display_pic($fid);

                        if ($rowImg['status'] == 1) :
                ?>
                            <img src="<?php echo 'uploads/profile' . $fid . '.' . $fileActExt . '?' . mt_rand() ?>" alt="profile_image">
                        <?php else : ?>
                            <img src="uploads/profiledefault.jpg" alt="profile_image">  
                <?php endif;
                    endif;
                endif;
                ?>
            </div>
            <p class="uname">
                <?php
                $resultUser = get_user($fid, $conn);
                $numOfResults = mysqli_num_rows($resultUser);

                if ($numOfResults > 1) :
                    echo "An error occured. Blocking process...";
                    exit();
                endif;
                $row = mysqli_fetch_assoc($resultUser);

                echo $row['uname'];
                ?>
            </p>
        </div>
        <div class="message-area">

            <?php

            $uid = $_SESSION['userId'];

            $sql = "SELECT * FROM message WHERE (sender_id=? AND receiver_id=?) OR (sender_id=? AND receiver_id=?) ORDER BY time_sent";
            $stmt = mysqli_stmt_init($conn);

            if (!(mysqli_stmt_prepare($stmt, $sql))) :
                echo "SQL FAILURE";
                header('Location: message.php?fail=sql');
            endif;

            mysqli_stmt_bind_param($stmt, 'ssss', $uid, $fid, $fid, $uid);
            mysqli_stmt_execute($stmt);
            $messages = mysqli_stmt_get_result($stmt);
            $num_of_messages = mysqli_num_rows($messages);

            if ($num_of_messages > 0) :
                while ($message_row = mysqli_fetch_assoc($messages)) :
                    if ($uid == $message_row['sender_id']) :
            ?>
                        <div class="sent">
                            <p> <?php stripcslashes($message_row['messages']) ?></p>
                        </div>
                    <?php elseif ($uid == $message_row['receiver_id']) : ?>
                        <div class="received">
                            <p> <?php stripcslashes($message_row['messages']) ?></p>
                        </div>
                <?php endif;
                endwhile;
            else :
                ?>
                <h1>No messages</h1>
            <?php endif; ?>

            ?>
        </div>
        <div class="send-area">
            <form action="includes/send_message.inc.php" method="POST">
                <input type="hidden" value=<?php echo $fid; ?> name="friend_id">
                <textarea name="message" id="message"></textarea>
                <button type="submit" name="send-message" class="send-message"><i class="fas fa-paper-plane"></i></button>
            </form>
        </div>
    </div>
</main>
</body>

</html>