<?php 
    include_once './includes/database.php';
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
    $data = "Admin";
    $sql = "SELECT * FROM users WHERE user_uid=?;";

    // Create a prepared statement
    $stmt = mysqli_stmt_init($conn);
    //Prepare the prepared statement
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
    }
    else {
        // Bind parameters to the placeholders
        mysqli_stmt_bind_param($stmt, "s", $data);
        // Run parameters inside database
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['user_first']. "<br>";
        }
    }
    mysqli_close($conn);
?>

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
    
</body>
</html>