<?php

    session_start();
    include 'database.inc.php';

    if (!isset($_POST['submit-remove'])) {
        header(("Location: ../contacts.php?submit=error"));
        exit();
    }

    $fid = $_POST['friend'];
    $id = $_SESSION['userId'];
    $sql = "DELETE FROM friends WHERE user_id=? AND friend_id=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header(("Location: ../contacts.php?sql=error"));
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $id, $fid);
    mysqli_stmt_execute($stmt);
    
    header("Location: ../contacts.php?unfollow=success");