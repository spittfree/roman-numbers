<?php

namespace RomanNumbers;


interface RomanNumeralGenerator {

    /**
     * Convert from Integer to Roman
     * @param int $value
     * @return string
     */
    public function generate($value);

    /**
     * Convert from Roman to Integer
     * @param string $value
     * @return int
     */
    public function parse($value);

}