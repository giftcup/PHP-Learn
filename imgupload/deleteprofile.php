<?php

session_start();
include_once 'dbh.php';
$sessionid = $_SESSION['id'];

$filename = 'uploads/profile'.$sessionid.'.'.'*';
$fileinfo = glob($filename);    //glob() searches for a file with part of the name we're looking for
$fileExt = explode('.', $fileinfo[0]);
$fileActualExt = $fileExt[1];

$file = 'uploads/profile'.$sessionid.'.'.$fileActualExt;

// unlink is used to delete the file
if (!unlink($file)) {
    echo "File was not deleted!";
} 
else {
    echo "File was deleted!";
}

$sql = "UPDATE profileimg SET status=1 WHERE userId='$sessionid';";
mysqli_query($conn, $sql);

header("Location: index.php?deletesuccess");