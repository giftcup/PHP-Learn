<?php

session_start();
include 'database.inc.php';

if (!isset($_POST['submit-upload'])) {
    header("Location: ../about.php?upload=failure");
}

$file = $_FILES['profile'];
// print_r($file);

$fileName = $file['name'];
$fileTmpName = $file['tmp_name'];
$fileError = $file['error'];
$fileSize = $file['size'];

$fileExt = explode('.', $fileName);
$fileActExt = strtolower(end($fileExt));

$allow = array('jpg', 'jpeg', 'png');

if ($fileError == 1) {
    header("Location: ../about.php?upload=error");
    exit();
}
if (!in_array($fileActExt, $allow)) {
    header("Location: ../about.php?upload=not_allowed");
    exit();
}
if ($fileSize > 1000000) {
    header("Location: ../about.php?uploadfailure=large");
    exit();
}

$id = $_SESSION['userId'];

$fileNewName = 'profile'. $id . '.' . $fileActExt;
echo $fileNewName;
$destination = '../uploads/' . $fileNewName;
move_uploaded_file($fileTmpName, $destination);

$sql = "UPDATE profileimg SET status=1 WHERE user_id=?;";

$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../about.php?upload=error");
}
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);


$sql = "SELECT * FROM profileimg WHERE user_id=?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../about.php?upload=error");
    exit();
}
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if ($result > 1 || $result < 0) {
    header("Location: ../about.php?upload=error");
    exit();
}
if ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['userImage'] = $row['status'];
}

// header("Location: ../about.php?upload=success");