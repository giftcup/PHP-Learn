<?php

    session_start();
    include 'database.inc.php';

    if (!isset($_POST['submit-add'])) {
        header("Location: ../index.php?failed");
        exit();
    }
    $user_id = $_SESSION['userId'];
    $friend_id = $_POST['friend'];

    $sql = "INSERT INTO friends(user_id, friend_id) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo 'SQL Error';
        header("Location: ../index.php?failed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "ss", $user_id, $friend_id);
    mysqli_stmt_execute($stmt);