<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>

    <form action="includes/signup.php" method="POST">
        <?php 
            if (isset($_GET['first'])) {
                $first = $_GET['first'];
                echo '<input type="text" name="first" placeholder="Firstname" value="'.$first.'">';
            }
            else {
                echo '<input type="text" name="first" placeholder="Firstname">';
            }
            echo '<br>';
            if (isset($_GET['last'])) {
                $last = $_GET['last'];
                echo '<input type="text" name="last" placeholder="Lastname" value="'.$last.'">';
            }
            else {
                echo '<input type="text" name="last" placeholder="Lastname">';
            }
            echo '<br>';    
        ?>

        <input type="text" name="email" placeholder="E-mail">
        <br>

        <?php 
            if (isset($_GET['uid'])) {
                $uid = $_GET['uid'];
                echo '<input type="text" name="uid" placeholder="Username" value="'.$uid.'">';
            }
            else {
                echo '<input type="text" name="uid" placeholder="Username">';
            }   
        ?>
        <br>
        <input type="password" name="pwd" placeholder="Password">
        <br>
        <button type="submit" name="submit">Signup</button>
    </form>

    <?php 
        /* $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

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
        } */

        if (!isset($_GET['signup'])) {
            exit();
        }
        else {
            $signupCheck = $_GET['signup'];

            if ($signupCheck == 'empty') {
                echo "<p>You did not fill in all fields!</p>";
                exit(); 
            }
            else if ($signupCheck == 'char') {
                echo "<p>You used invalid characters!<p>";   
                exit(); 
            }
            else if ($signupCheck == 'email') {
                echo "<p>You used an invalid e-mail!<p>";   
                exit(); 
            }
            else if ($signupCheck == 'success') {
                echo "<p>You have been signed up!</p>";   
                exit(); 
            }
        }
    ?>
    
</body>
</html>