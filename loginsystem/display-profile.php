<?php

require 'includes/database.inc.php';

function get_profile(int $fid) {
    $sqlImg = "SELECT * FROM profileimg WHERE user_id=?";
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sqlImg)) {
        header("Location: index.php?sqlError");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "s", $fid);
    mysqli_stmt_execute($stmt);
    $resultImg = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($resultImg) == 1) {
        $rowImg = mysqli_fetch_assoc($resultImg);
        $file = 'uploads/profile'.$fid.'.'.'*';
        $fileInfo = glob($file);
        $fileExt = explode('.', $fileInfo[0]);
        $fileActExt = strtolower(end($fileExt));
    
        if ($rowImg['status'] == 1) {
            return $fileActExt;
        }
    }