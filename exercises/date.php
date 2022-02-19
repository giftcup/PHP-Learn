<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="./date.css">
</head>
<body>
    <?php
        $dayofweek = date("w");

        switch($dayofweek) {
            case 1:
                echo "It is Monday!";
                break;
            case 2:
                echo "It is Tuesday!";
                break;
            case 3:
                echo "It is Wednesday!";
                break;
            case 4:
                echo "It is Thursday!";
                break;
            case 5:
                echo "It is Friday!";
                break;
            case 6:
                echo "<p>It is Saturday!</p>";
                break;
            case 0:
                echo "It is Sunday!";
                break;
            default:
                echo "Not a day :(";
        }

    ?>
</body>
</html>