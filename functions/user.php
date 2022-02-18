<?php
    // avoid echoing out values in functions
    function calcAdd($num1, $num2) {
        $value = $num1 + $num2;
        return $value;
    }

    echo calcAdd(2, 4);