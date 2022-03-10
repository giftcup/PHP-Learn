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