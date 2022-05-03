<?php

function get_picture($friend_id, $conn)
{
    $sqlImg = "SELECT * FROM profileimg WHERE user_id=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlImg)) {
        header("Location: index.php?sqlError");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $friend_id);
    mysqli_stmt_execute($stmt);
    $resultImg = mysqli_stmt_get_result($stmt);

    return $resultImg;
}

function display_pic($friend_id) {
    $file = 'uploads/profile' . $friend_id . '.' . '*';
    $fileInfo = glob($file);
    $fileExt = explode('.', $fileInfo[0]);
    $fileActExt = strtolower(end($fileExt));

    return $fileActExt;
}
