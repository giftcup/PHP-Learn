<?php

declare(strict_types = 1);

function hammingDistance(string $strandA, string $strandB) : int {
    $i = 0; 
    $count = 0;

    if(strlen($strandA) != strlen($strandB)) {
        throw new InvalidArgumentException("DNA strands must be of equal length.");
    }

    while ($i < strlen($strandA)) {
        if($strandA[$i] !== $strandB[$i]) {
            $count++;
        }
        $i++;
        echo "{$i} and {$count}\n";
    }
    
    return $count;
}

echo hammingDistance("GAGCCTACTAACGGGAT", "CATCGTAATGACGGCCT")."\n";