<?php

include 'bootstrap.php';

$convertToRoman = 2539;
$converter = new RomanNumbers\RomanNumbersConverter();
$result = $converter->generate($convertToRoman);

echo "Decimal number: $convertToRoman is ".$result;

exit;