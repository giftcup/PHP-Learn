<?php
    session_start();
    require 'includes/database.inc.php';
    require 'header.php';
?>

<main>
    <h2>Your Friends</h2>

    <div class="registered">
    <?php 
        
        if (isset($_SESSION['userName'])) {
            $id = $_SESSION['userId'];
            $sql = "SELECT * FROM friends WHERE user_id=?;";
            $stmt = mysqli_stmt_init($conn);
            
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: index.php?sqlError");
                exit();
            }
            mysqli_stmt_bind_param($stmt, "s", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $fid = $row['friend_id'];

                    if ($fid == $_SESSION['userId'])
                        continue;
                    
                    echo '<div class="user">';
                        echo '<div class="userImg">';
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
                                $file = 'uploads/profile'.$fid.'.'.'*';
                                $fileInfo = glob($file);
                                $fileExt = explode('.', $fileInfo[0]);
                                $fileActExt = strtolower(end($fileExt));

                                if ($rowImg['status'] == 1) {
                                    echo '<img src="uploads/profile'.$fid.'.'.$fileActExt.'?'.mt_rand().'" alt="profile_image">';
                                }
                                else {
                                    echo '<img src="uploads/profiledefault.jpg" alt="profile_image">';
                                }
                            }
                        echo '</div>';

                        echo '<div class="userInfo">';
                            $sqlUser = "SELECT * FROM users WHERE user_id=?";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sqlUser)) {
                                header("Location: index.php?sqlError");
                                exit();
                            }
                            mysqli_stmt_bind_param($stmt, "s", $fid);
                            mysqli_stmt_execute($stmt);
                            $resultUser = mysqli_stmt_get_result($stmt);
                            if (mysqli_num_rows($resultUser) == 1) {
                                $rowUser = mysqli_fetch_assoc($resultUser);
                                echo '<p class="uname">'.$rowUser['uname'].'</p>';
                                echo '<div>';
                                    echo '<form action="includes/remove.inc.php" method="POST">';
                                        echo '<input type="hidden" value="'.$row['friend_id'].'" name="friend">'; //vulnerable
                                        echo '<div class="buttons">';
                                            echo '<button type="submit" name="submit-remove" class="submit">Unfollow</button>';
                                        echo '</div>';
                                    echo '</form>';
                                    echo '<form action="includes/message.inc.php" method="POST">';
                                        echo '<input type="hidden" value="'.$row['friend_id'].'" name="friend">'; //vulnerable
                                        echo '<div class="buttons">';
                                            echo '<button type="submit" name="submit-add" class="submit">Message</button>';
                                        echo '</div>';
                                    echo '</form>';
                                echo '</div>';
                            }

                        echo '</div>';
                    echo '</div>';
                }
            }
        }
        else {
            echo '<p>You are logged out!</p>';
        }
    ?>
    </div>

</main>