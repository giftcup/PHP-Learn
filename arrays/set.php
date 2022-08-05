<?php

$odd = [];
$even = [];
$others = [];

for ($i = 0; $i < 20; $i++) {
    if (($i % 2) !== 0) {
        $odd[$i + 1] = true;
    }
    else if(($i % 2) !== 0){
        $even[$i + 2] = true;
    }
    $others[$i + 2] = true;
}

$union = $odd + $even;
$even_others_inter = array_intersect_key($even, $others);
$even_odd_inter = array_intersect_key($even, $odd);
$compliment = array_diff_key($even, $odd);
$compliment2 = array_diff_key($others, $even);

print_r($union);
print_r($even_odd_inter);
print_r($even_others_inter);
print_r($compliment);
print_r($compliment2);