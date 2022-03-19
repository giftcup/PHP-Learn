<?php
    require 'includes/database.inc.php';
    require 'header.php';
?>

    <main>
        <h2>All Users</h2>

        <div class="registered">
        <?php 
        
            if (isset($_SESSION['userName'])) {
                $sql = "SELECT * FROM users;";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['user_id'];

                        if ($id == $_SESSION['userId'])
                            continue;
                        
                        echo '<div class="user">';
                            echo '<div class="userImg">';
                                $sqlImg = "SELECT * FROM profileimg WHERE user_id=?";
                                $stmt = mysqli_stmt_init($conn);
                                if (!mysqli_stmt_prepare($stmt, $sqlImg)) {
                                    header("Location: index.php?sqlError");
                                    exit();
                                }
                                mysqli_stmt_bind_param($stmt, "s", $id);
                                mysqli_stmt_execute($stmt);
                                $resultImg = mysqli_stmt_get_result($stmt);
                                
                                if (mysqli_num_rows($resultImg) == 1) {
                                    $rowImg = mysqli_fetch_assoc($resultImg);
                                    $file = 'uploads/profile'.$id.'.'.'*';
                                    $fileInfo = glob($file);
                                    $fileExt = explode('.', $fileInfo[0]);
                                    $fileActExt = strtolower(end($fileExt));

                                    if ($rowImg['status'] == 1) {
                                        echo '<img src="uploads/profile'.$id.'.'.$fileActExt.'?'.mt_rand().'" alt="profile_image">';
                                    }
                                    else {
                                        echo '<img src="uploads/profiledefault.jpg" alt="profile_image">';
                                    }
                                }
                            echo '</div>';
                            echo '<div class="userInfo">';
                                echo '<p class="uname">'.$row['uname'].'</p>';
                                echo '<div>';
                                    echo '<form action="includes/add.inc.php" method="POST">';
                                        echo '<input type="hidden" value="'.$row['user_id'].'" name="friend">'; //vulnerable
                                        echo '<button type="submit" name="submit-add" class="submitAdd">Add</button>';
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