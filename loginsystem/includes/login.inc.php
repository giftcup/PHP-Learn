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
    $sql = "SELECT * FROM users WHERE uname=? OR uemail=? ";
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?login=error");
        exit();
    }
    else {
        mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result > 1) {
            echo '<h1> 404 ERROR </h1>';
            header("Location: ../login.php?login=failed");
            exit();
        }

        if ($row = mysqli_fetch_assoc($result)) {
            $pwdCheck = password_verify($pwd, $row['upwd']);

            if ($pwdCheck == false) {
                header("Location: ../login.php?login=failed&mailuid=$mailuid");
                exit();
            }
            else if($pwdCheck == true) {
                session_start();
                $_SESSION['userId'] = $row['user_id'];
                $_SESSION['userName'] = $row['uname'];
                $_SESSION['userEmail'] = $row['uemail'];
                
                $id = $row['user_id'];
                $sqlImg = "SELECT * FROM profileimg WHERE user_id=?;";
                
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo '500 ERROR';
                }
                mysqli_stmt_bind_param($stmt, "i", $id);
                mysqli_stmt_execute($stmt);
                $resultImg = mysqli_stmt_get_result($stmt);
                
                if ($resultImg > 1) {
                    echo '500 ERROR';
                }

                if ($row = mysqli_fetch_assoc($resultImg)) {
                    $_SESSION['userImage'] = $row['status'];
                }
                
                header("Location: ../index.php?login=success");
            }
            else {
                header("Location: ../login.php?login=failed&mailuid=$mailuid");
                exit();
            }
        }
        else {
            header("Location: ../login.php?login=failed&mailuid=$mailuid");
            exit();
        }
    }