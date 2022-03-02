<?php

include_once 'dbh.php'; 

    $first = $_POST['first'];
    $last = $_POST['last'];
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    $sql = "INSERT INTO users(first, last, username, password) VALUES ('$first', '$last', '$uid', '$pwd');";

    $result = mysqli_query($conn, $sql);

    $sql = "SELECT * FROM users WHERE username='$uid' AND first='$first';";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $userId = $row['userId'];
            $sql = "INSERT INTO profileImg(userId, status) VALUES ('$userId', 1)';";
            mysqli_query($conn, $sql);
            header("Location: index.php");
        }
    }