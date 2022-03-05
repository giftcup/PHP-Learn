<?php 
    session_start();
    include_once 'dbh.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h1>Hello World</h1>
    <?php 
        $sql = "SELECT * FROM users;";
        
        $result = mysqli_query($conn, $sql);
        $resultNum = mysqli_num_rows($result);

        if ($resultNum > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['userId'];
                $sqlImg = "SELECT * FROM profileimg WHERE userId='$id';";
                $resultImg = mysqli_query($conn, $sqlImg);
                while ($rowImg = mysqli_fetch_assoc($resultImg)) {
                    echo '<div>';
                        if ($rowImg['status'] == 0) {
                            echo '<img src="uploads/profile '.$id.'.jpg">';
                        }
                        else {
                            echo '<img src="uploads/profiledefault.jpg">';
                        }
                        echo $row['username'];
                    echo '</div>';
                }
            } 
        }
        else {
            echo 'There are no users yet!';
        }

        
        if (isset($_SESSION['id'])) {
            if ($_SESSION['id'] == 1) {
                echo 'You are logged in as user #1';
            }
            echo '<form action="upload.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file">
                <button type="submit" name="submitfile">UPLOAD</button>
                </form>';
        }
        else {
            echo "You are not logged in!";
            echo 
            '<form action="signup.php" method="POST">
                <input type="text" name="first" placeholder="First name">
                <input type="text" name="last" placeholder="Last name">
                <input type="text" name="uid" placeholder="Username">
                <input type="password" name="pwd" placeholder="Password">
                <button type="submit" name="submitSignup">Signup</button>
            </form';
        } 
    
    ?>
    
    <p>Login as User</p>
    <form action="login.php" method="POST">
        <button type="submit" name="submitLogin">Login</button>
    </form>

    <p>Logout as User</p>
    <form action="logouts.php" method="POST">
        <button type="submit" name="submitLogout">Logout</button>
    </form>

</body>
</html>