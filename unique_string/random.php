<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 

        function generateKey() {
            $keyLength = 9;
            $str = "1234567890abcdefghijklmnopqrstuvwxyz()/$";
            $randStr = substr(str_shuffle($str), 0, $keyLength);
            return $randStr;
        }
        echo generateKey();

        function uniqueId() {
            $randStr = uniqid();
            return $randStr;
        }
        echo uniqueId();

    ?>
</body>
</html>