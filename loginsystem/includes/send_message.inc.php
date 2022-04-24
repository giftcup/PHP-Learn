<?php

if (!isset($_POST['signup-submit'])) {
    header("Location: ../signup.php?signup=error");
    exit();
}

else {
    require './database.inc.php';


    $message = mysqli_real_escape_string($conn, $_POST['message']);

    if (empty($message)) {
        header("Location: ../send_message.php?message=empty");
        exit();
    }
    else {
        $sql = "SELECT * FROM messages WHERE sender_id=?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?signup=sqlerror&uid=$uid&mail=$mail");
            exit();
        }
        else {
            
        }
    }
}