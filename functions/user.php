<?php
    // avoid echoing out values in functions
    function calcAdd($num1, $num2) {
        $GLOBALS['num'] = $num1 + $num2; // changes the value of a global variable from within a function
        return $GLOBALS['num'];
    }
    $num = 9;
    echo "<br>".$num;
    echo "<br>".calcAdd(2, 4);
    echo "<br>".$num;