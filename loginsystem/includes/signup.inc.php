<?php

    if (!isset($_POST['signup-submit'])) {
        header("Location: ../signup.php?signup=error");
        exit();
    }
    else {
        require "./database.inc.php";

    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $mail = mysqli_real_escape_string($conn, $_POST['mail']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $pwdRepeat = mysqli_real_escape_string($conn, $_POST['pwd-repeat']);

    if (empty($uid) || empty($mail) || empty($pwd) || empty($pwdRepeat)) {
        header("Location: ../signup.php?signup=empty&uid=$uid&mail=$mail");
        exit();
    }

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?signup=email&uid=$uid&mail=$mail");
        exit();
    }
    else {
        $sql = "SELECT uname FROM users WHERE uname=?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?signup=sqlerror&uid=$uid&mail=$mail");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $uid);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if ($resultCheck > 0) {
                header("Location: ../signup.php?signup=userNameTaken&uid=$uid&mail=$mail");
                exit();
            }

            else {
                $sql = "SELECT uemail FROM users WHERE uemail=?;";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?signup=sqlerror&uid=$uid&mail=$mail");
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt, "s", $mail);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    $resultCheck = mysqli_stmt_num_rows($stmt);

                    if ($resultCheck > 0) {
                        header("Location: ../signup.php?signup=emailRegistered&uid=$uid&mail=$mail");
                        exit();
                    }
                }
            }
        }
    }

    if ($pwd !== $pwdRepeat) {
        header("Location: ../signup.php?signup=nomatch&uid=$uid&mail=$mail");
        exit();
    }
    else {
        $pwdHashed = password_hash($pwd, PASSWORD_DEFAULT);
    }

    $stmt = mysqli_stmt_init($conn);
    $sql = "INSERT INTO users (uname, uemail, upwd) VALUES (?,?,?);";

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo 'SQL Error';
        header("Location: ../index.php?signup=sqlfailure");
    }
    else {
        mysqli_stmt_bind_param($stmt, "sss", $uid, $mail, $pwdHashed);
        mysqli_stmt_execute($stmt);

        $sql = "SELECT * FROM users WHERE uname=? AND uemail=?";
        $stmt = mysqli_stmt_init($conn);
        echo "HERE ";
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "500 error";
            header("Location: ../index.php?signup=sqlfailure");
        }
        echo "HERE ";
        mysqli_stmt_bind_param($stmt, "ss", $uid, $mail);
        mysqli_stmt_execute($stmt);
        
        $result = mysqli_stmt_get_result($stmt);
        echo "HERE ";
        if ($row = mysqli_fetch_assoc($result)) {
            $pwdCheck = password_verify($pwd, $row['upwd']);
            if ($pwdCheck == true) {
                $status = 0;
                $sqlImg = "INSERT INTO profileimg (status, user_id) VALUES (?,?);";
                $stmtImg = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmtImg, $sqlImg)) {
                    echo "ERROR";
                }
                mysqli_stmt_bind_param($stmtImg, "ss", $status, $row['user_id']);
                mysqli_stmt_execute($stmtImg);
            }
        }


        header("Location: ../login.php?signup=success");
    }
}