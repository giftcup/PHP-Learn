<?php
    session_start();
    include_once 'dbh.php';
    $id = $_SESSION['id'];

    if (isset($_POST['submitfile'])) {
        $file = $_FILES['file'];

        // print_r($file);

        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileType = $file['type'];
        $fileError = $file['error'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');
        // echo 'hello';
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 10000000) {
                    $fileNewName = "profile".$id.".".$fileActualExt;
                    $destination = 'uploads/'.$fileNewName;
                    move_uploaded_file($fileTmpName, $destination);
                    $sql = "UPDATE profileimg SET status='0' WHERE userId='$id';";
                    $result = mysqli($conn, $sql);

                    header("Location: index.php?profilechanged");
                } 
                else {
                    echo 'The size can not be more than 10 MB!';
                }
            } 
            else {
                echo "There was an error while uploading your picture";
            }
        } 
        else {
            echo "You can't upload files of this type.";
        }
    } 