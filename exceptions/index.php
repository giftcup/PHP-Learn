<?php
    echo "14/7 : ".divide(14, 7)."<br>";
    
    function divide($num1, $num2) {
        if ($num2 == 0) {
            throw new Exception("Division by zero");
        }
        return $num1 / $num2;
    }

    try {
        echo divide(5,0);
    }
    catch (Exception $e){
        echo "Unable to divide<br>";
        echo $e->getMessage()."<br>";
        echo $e->getCode()."<br>";
        echo $e->getFile()."<br>";
        echo $e->getLine()."<br>";
    }
    finally {
        echo "Finished!";
    }