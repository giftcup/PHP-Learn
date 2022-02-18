<?php
    function myCalculator($num01, $oper, $num02) {
        $res;
        
        switch ($oper) {
            case "add":
                $res = $num01 + $num02;
                break;
            case "sub":
                $res = $num01 - $num02;
                break;
            case "mul":
                $res = $num01 * $num02;
                break;
            case "div":
                if ($num02 == 0) {
                    $res = "Division by zero is not possible";
                } 
                else
                    $res = $num01 / $num02;
                break;
            default:
                $res = "There was an error";
                break;
        }
        return $res; 
    }

    $num01 = $_GET["num01"];
    $oper = $_GET["oper"];
    $num02 = $_GET["num02"];

    echo "Value: " . myCalculator($num01, $oper, $num02);