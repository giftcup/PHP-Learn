<?php

session_start();

if (!isset($_POST['send-message'])) {
    header("Location: ../message.php?send=error");
    exit();
}

else {
    require './database.inc.php';
    
    $sender_id = $_SESSION['userId'];
    $friend_id = $_POST['friend_id'];
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $time = date('Y-m-d h:i:s', time());

    if (empty($message)) {
        header("Location: ../message.php?message=empty&friendId=");
        exit();
    }
    else {
        $sql = "INSERT INTO message (sender_id, receiver_id, messages, time_sent) VALUES (?,?,?,?);";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../message.php?sql=failed&friendId=".$friend_id."");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ssss", $sender_id, $friend_id, $message, $time);
        mysqli_stmt_execute($stmt);

        header("Location:../message.php?message=sent&friendId=".$friend_id."");

    }
}