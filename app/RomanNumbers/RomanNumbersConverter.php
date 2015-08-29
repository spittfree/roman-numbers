<?php

namespace RomanNumbers;

use RomanNumbers\Logic\Roman;
use RomanNumbers\Mappers\Exception\InvalidValueException;


class RomanNumbersConverter implements RomanNumeralGenerator {

    /**
     * Convert from decimal to roman
     * @param int $value
     * @return string
     */
    public function generate($value)
    {
        $romanLogic = new Roman\Logic();
        try {
            return $romanLogic->convert($value);
        } catch (InvalidValueException $e) {
            //TODO: improve this catch
            echo $e->getMessage();
            return null;
        }
    }

    /**
     * Convert from roman to decimal
     * @param string $value
     * @return int
     */
    public function parse($value)
    {

    }
}
