<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $string = "My name is Salome, salome is my name\nI mean a lot to me";
        $pattern = "/(sal)(ome)/i";
        $pattern2 = "/me/m";
        $pattern3 = "/is/";
        $replacement = "will be";
        
        if (preg_match($pattern, $string, $array)) {
            print_r($array);
        }
        
        if (preg_match_all($pattern2, $string, $array)) {
            print_r($array);
        }

        $newString = preg_replace($pattern3, $replacement, $string);
        echo $newString;
    ?>
</body>
</html>