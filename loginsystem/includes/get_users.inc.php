<?php

function get_user($user_id, $conn) {
    $sqlFriend = "SELECT * FROM users WHERE user_id=?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sqlFriend)) {
        echo 'Error querying database';
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $user_id);
    mysqli_stmt_execute($stmt);
    $resultsFriends = mysqli_stmt_get_result($stmt);

    return $resultsFriends;
}

function get_friends($user_id, $conn) {
    $sql = "SELECT * FROM friends WHERE user_id=?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: index.php?error");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    return $result;
}