<?php
    require 'includes/database.inc.php';
    require 'header.php';
?>

    <main>
        <h2>Other Users</h2>

        <div class="registered">
        <?php 
        
            if (isset($_SESSION['userName'])) {
                $sql = "SELECT * FROM users;";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $fid = $row['user_id'];
                        $id = $_SESSION['userId'];
                        
                        $sqlFriends = "SELECT * FROM friends WHERE user_id=? AND friend_id=?;";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sqlFriends)) {
                            header("Location: index.php?sqlerror");
                        }
                        mysqli_stmt_bind_param($stmt, "ss", $id, $fid);
                        mysqli_stmt_execute($stmt);
                        $resultFriends = mysqli_stmt_get_result($stmt);
                        $resultNum = mysqli_num_rows($resultFriends);
                        $rows = mysqli_fetch_assoc($resultFriends);

                        if ($fid == $id || $resultNum > 0)
                            continue;
                        
                        echo '<div class="user">';
                            echo '<div class="userImg">';
                                // $sqlImg = "SELECT * FROM profileimg WHERE user_id=?";
                                // $stmt = mysqli_stmt_init($conn);
                                // if (!mysqli_stmt_prepare($stmt, $sqlImg)) {
                                //     header("Location: index.php?sqlError");
                                //     exit();
                                // }
                                // mysqli_stmt_bind_param($stmt, "s", $fid);
                                // mysqli_stmt_execute($stmt);
                                // $resultImg = mysqli_stmt_get_result($stmt);
                                
                                // if (mysqli_num_rows($resultImg) == 1) {
                                //     $rowImg = mysqli_fetch_assoc($resultImg);
                                //     $file = 'uploads/profile'.$fid.'.'.'*';
                                //     $fileInfo = glob($file);
                                //     $fileExt = explode('.', $fileInfo[0]);
                                //     $fileActExt = strtolower(end($fileExt));

                                //     if ($rowImg['status'] == 1) {
                                //         echo '<img src="uploads/profile'.$fid.'.'.$fileActExt.'?'.mt_rand().'" alt="profile_image">';
                                //     }
                                //     else {
                                //         echo '<img src="uploads/profiledefault.jpg" alt="profile_image">';
                                //     }
                                // }
                                include 'display-profile.php';

                                $fileActExt = get_profile($fid);
                                echo "here";
                                if ($fileActExt === NULL) {
                                    echo '<img src="uploads/profiledefault.jpg" alt="profile_image">';
                                } 
                                else {
                                    echo '<img src="uploads/profile'.$fid.'.'.$fileActExt.'?'.mt_rand().'" alt="profile_image">';
                                }
                            echo '</div>';
                            echo '<div class="userInfo">';
                                echo '<p class="uname">'.$row['uname'].'</p>';
                                echo '<div>';
                                    echo '<form action="includes/add.inc.php" method="POST">';
                                        echo '<input type="hidden" value="'.$row['user_id'].'" name="friend">'; //vulnerable
                                        echo '<button type="submit" name="submit-add" class="submit">Follow</button>';
                                    echo '</form>';
                                echo '</div>';
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

<?php
    require 'footer.php';
?>