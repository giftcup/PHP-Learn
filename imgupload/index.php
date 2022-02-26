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

    <?php 
        if (isset($SESSION['id'])) {
            if (isset($_SESSION['id']) == 1) {
                echo 'You are logged in';
            }
        }
    
    ?>
    

    <form action="upload.php">
        <input type="file" name="file">
        <button type="submit" name="file-submit">UPLOAD</button>
    </form>

    <p>Login as User</p>
    <form action="login.php" method="POST">
        <button type="submit" name="submitLogin">Login</button>
    </form>

    <p>Login out User</p>
    <form action="logout.php" method="POST">
        <button type="submit" name="submitLogout">Logout</button>
    </form>

</body>
</html>