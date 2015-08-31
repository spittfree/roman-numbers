<?php

include 'bootstrap.php';

$convertToDecimal = $argv[1];
$converter = new RomanNumbers\RomanNumbersConverter();
$result = $converter->parse($convertToDecimal);

echo "Roman number: $convertToDecimal is ".$result;


exit;