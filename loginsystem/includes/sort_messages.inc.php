<?php

function sort_messages($msg) {
    $num_messages = sizeof($msg);
    $time = 3;

    print_r($msg);

    for ($i = 0; $i < $num_messages - 1; $i++) {
        $swapped = false;

        for ($j = 0; $j < ($num_messages - $i - 1); $j++ )  {
            if ($msg[$j][$time] < $msg[$j+1][$time]) {
               $tmp_msg = $msg[$j];
               $msg[$j] = $msg[$j+1];
               $msg[$j+1] = $tmp_msg;

               $swapped = true;
            }
        }

        if ($swapped === false) {
            break;
        }
    }

    return $msg;
}