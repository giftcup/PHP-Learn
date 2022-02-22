<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>

    <form action="includes/signup.php" method="POST">
        <input type="text" name="first" placeholder="Firstname">
        <br>
        <input type="text" name="last" placeholder="Lastname">
        <br>
        <input type="text" name="email" placeholder="E-mail">
        <br>
        <input type="text" name="uid" placeholder="Username">
        <br>
        <input type="password" name="pwd" placeholder="Password">
        <br>
        <button type="submit" name="submit">Signup</button>
    </form>

    <?php 
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if (strpos($fullUrl, "signup=empty") == true) {
            echo "<p>You did not fill in all fields!</p>";
            exit();
        }
        else if (strpos($fullUrl, "signup=char") == true) {
            echo "<p>You used invalid characters!</p>";
            exit();
        }
        else if (strpos($fullUrl, "signup=email") == true) {
            echo "<p>You used an invalid e-mail!</p>";
            exit();
        }
        else if (strpos($fullUrl, "signup=success") == true) {
            echo "<p>You have beem signed up!</p>";
            exit();
        }
    ?>
    
</body>
</html>