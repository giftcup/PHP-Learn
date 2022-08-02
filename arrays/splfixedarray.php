<?php

$size = 10;
$array = new SplFixedArray($size);

for ($i = 0; $i < $size; $i++) {
    $array[$i] = $i + 1;
}

// for ($i = 0; $i < $size; $i++) {
//     echo $array[$i] . "\n";
// }


// Memory comparison between SplFixedArray and PHP Arrays

/** php array **/

$startMemory = memory_get_usage();
$array = range(1, 100000);
$endMemory = memory_get_usage();
echo (ceil(($endMemory - $startMemory) / (1024 * 1024))) . " MB \n";


/** SplFixedArray */

$size = 100000;
$startMemory = memory_get_usage();
$array = new SplFixedArray($size);
for ($i = 0; $i < $size; $i++) {
    $array[$i] = $i + 1;
}
$endMemory = memory_get_usage();

$memoryConsumed = ($endMemory - $startMemory) / (1024*1024);
$memoryConsumed = ceil($memoryConsumed);
echo "memory = {$memoryConsumed} MB\n";

// Converting php arrays to splfixed array at runtime

$array = [1 => 10, 3 => 20, 2 => 40, 4 => 100, 7 => 500];
$splArray = SplFixedArray::fromArray($array, false);
print_r($splArray);