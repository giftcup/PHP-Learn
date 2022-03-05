<?php 

    if (isset($_POST['submit'])) {
        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name']; //$files['name']
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'pdf');
        
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 10000000) {
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = 'uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);

                    header("Location: ./index.php?uploadsuccess");
                }
                else {
                    echo "Your file is too large!";
                }  
            }
            else {
                echo "There was an error uploadig the file";
            }
        }
        else {
            echo "You can not upload files of this type!";
        }
    }