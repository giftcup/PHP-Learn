<?php
    require 'header.php';
?>

    <main>

        <?php 

            if (isset($_SESSION['userName'])) {
                echo '<div class="profileImg">';
                    $id = $_SESSION['userId'];
                    $img = $_SESSION['userImage'];


                    if ($img === 1) {
                        $fileName = 'uploads/profile'. $_SESSION['userId'] . '.' . '*';
                        $fileInfo = glob($fileName);
                        $fileExt = explode('.', $fileInfo[0]);
                        $fileActualExt = strtolower(end($fileExt));

                        echo '<img src="uploads/profile'.$id.'.'.$fileActualExt.'?'.mt_rand().'" alt="Profile Image">';
                    } 
                    else {
                        echo '<img src="uploads/profiledefault.jpg" alt="Profile Image">';
                    }
                    echo '<p>Username: '.$_SESSION['userName'].'</p>';
                    echo '<p>Email: '.$_SESSION['userEmail'].'</p>';
                    echo '
                    <div>
                        <form action="includes/upload.inc.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="profile" accept="image/png image/jpg image/jpeg">
                            <button type="submit" name="submit-upload">Add Image</button>
                        </form>
                    </div>';
                    echo '
                    <div>
                        <form action="includes/delete.inc.php" method="POST">
                            <button type="submit" name="submit-delete">Remove Image</button>
                        </form>
                    </div>';
                echo '</div>';
            }
            else {
                echo '<p>You are logged out!</p>';
            }
        
        ?>
    </main>

<?php
    require 'footer.php';
?>