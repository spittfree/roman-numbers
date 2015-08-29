<?php

namespace RomanNumbers;

use RomanNumbers\Logic\Roman;


class RomanNumbersConverter implements RomanNumeralGenerator {

    /**
     * Convert from integer to roman
     * @param int $value
     * @return string
     */
    public function generate($value)
    {
        $romanLogic = new Roman\Logic();
        return $romanLogic->convert($value);
    }

    /**
     * @param string $value
     * @return int
     */
    public function parse($value)
    {

    }
}
