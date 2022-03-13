<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $string = "My name is Salome, Salome is my name";
        $pattern = "/salome/i";
        if (preg_match($pattern, $string, $array)) {
            print_r($array);
        }
    ?>
</body>
</html>