<?php

namespace RomanNumbers;


interface RomanNumeralGenerator {

    /**
     * Convert from Integer to Decimal
     * @param int $value
     * @return string
     */
    public function generate($value);

    /**
     * Convert from Decimal to Integer
     * @param string $value
     * @return int
     */
    public function parse($value);

}