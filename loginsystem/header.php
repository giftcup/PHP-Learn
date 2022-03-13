<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">
</head>
<body>
    
    <header class="header">
        <nav class="nav-header"> 
            <ul class="ul-nav-header">
                <li class="ul-nav-header-li"><a href="index.php">Home</a></li>
                <li class="ul-nav-header-li"><a href="#">Portfolio</a></li>
                <li class="ul-nav-header-li"><a href="#">About Me</a></li>
                <li class="ul-nav-header-li"><a href="#">Contact</a></li>
            </ul>
            <div class="pages-nav-header">

            <?php 

                if (isset($_SESSION['userName']) && isset($_SESSION['userId'])) {
                    echo '<div class="profile">';
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
                    echo '<p>'.$_SESSION['userName'].'</p>';
                    echo '</div>';
                    echo '
                        <form action="includes/logout.inc.php" method="post" class="logout-button">
                        <button type="submit" name="logout-submit"  class="submit-button">Logout</button>
                        </form>';
                }
                else {
                    echo '<a href="login.php">Login</a>
                          <a href="signup.php">Signup</a>';
                }
                
            ?>
            </div>
        </nav>
    </header>