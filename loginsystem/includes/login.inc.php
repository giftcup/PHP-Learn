<?php

    if (!isset($_POST['login-submit'])) {
        header("Location: ../login.php?login=error");
        exit();
    }

    require './database.inc.php';

    $mailuid = $_POST['mailuid'];
    $pwd = $_POST['pwd'];

    if (empty($mailuid) || empty($pwd)) {
        header("Location: ../login.php?login=empty?mailuid=$mailuid");
        exit();
    }

    $stmt = mysqli_stmt_init($conn);
    $sql = "SELECT uname, uemail, upwd FROM users WHERE (uname='$mailuid' OR uemail='$mailuid') AND upwd='$pwd' ";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0)
        header("Location: ../index.php?login=success");
    else {
        header("Location: ../login.php?login=failed?mailuid=$mailuid");
    }