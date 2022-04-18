<?php

require 'includes/database.inc.php';

function get_profile(int $fid) {
    $sqlImg = "SELECT * FROM profileimg WHERE user_id=?";
    echo $fid;
    $stmt = mysqli_stmt_init($conn);
    echo 'here';
    if (!mysqli_stmt_prepare($stmt, $sqlImg)) {
        header("Location: index.php?sqlError");
        exit();
    }echo 'here';
    mysqli_stmt_bind_param($stmt, "s", $fid);
    mysqli_stmt_execute($stmt);
    $resultImg = mysqli_stmt_get_result($stmt);
    echo 'here';
    if (mysqli_num_rows($resultImg) == 1) {
        $rowImg = mysqli_fetch_assoc($resultImg);
        $file = 'uploads/profile'.$fid.'.'.'*';
        $fileInfo = glob($file);
        $fileExt = explode('.', $fileInfo[0]);
        $fileActExt = strtolower(end($fileExt));
        echo $fileActExt;
    
        if ($rowImg['status'] == 1) {
            return $fileActExt;
        }
        else {
            return NULL;
        }
    }
}