<?php 

function generateRandomNumber() {
    $numDigits = rand(8, 10);
    $min = pow(10, $numDigits - 1);
    $max = pow(10, $numDigits) - 1;
    return rand($min, $max);
}

echo generateRandomNumber();