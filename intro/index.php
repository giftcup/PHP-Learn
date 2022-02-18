<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <p>This is a paragraph</p>
    <?php
        /*
            Data Types
        */
        $name = "Esther";
        $num1 = 9;
        $num2 = 5;
        $a = 1;
        $b = 5;
        $array = ["Daniel", "Timmy", "Jane"];

        echo "Hello World\r\n";
        echo "Her name is " . $name . "\r\n";
        echo $num1.$num2;

        /* Conditional statements */
        /*
            if statements are used to check more
            complex conditions.
        */
        if ($a === $b) {
            // if both datatypes and data are the same
            echo "\nThey are the same!";
        }
        else {
            echo "\nThey are NOT the same!";
        }

        /*
            switch statements are preferable when testing
            multible values against one value
        */
        switch ($b) {
            case 3:
                echo "Variable is equal to 3";
                break;
            case 5:
                echo "Variable is equal to 5";
                break;
            default:
                echo "None were true!";
                break;
        }


        /* LOOPS */
        while ($a <= 10) {
            echo " " . $a++;
        }

        do {
            echo " " . $b++;
        } while(b <= 5);

        for ($i = 0; $i < 4; $i++) {
            echo "- " . $i;
        }

        /* 
            used to loop though an array until there's no
            data in the array
        */
        $array2 = [
        //  key        value
            "Name" => "Rita",
            "Eyecolor" => "black"
        ]; // associative array

        foreach ($array as $value) {
            echo $value;
        }

        foreach ($array1 as $key => $value) {
            echo $key . ": " . $value;
            // First loop = Name: Rita
            // Second loop = Eyecolor: black
        }

        while ($a++) {
            echo $a;
            while ($a <= 10) {
                break 2;    // number after the break specifies how many levels to leave from.
            }
        }

    ?> 

</body>
</html>