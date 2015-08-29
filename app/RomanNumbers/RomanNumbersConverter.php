<?php

namespace RomanNumbers;

use RomanNumbers\Logic\Roman;
use RomanNumbers\Logic\Decimal;

/**
 * Class RomanNumbersConverter
 * @package RomanNumbers
 *
 * Exceptions here should be more business related
 */
class RomanNumbersConverter implements RomanNumeralGenerator {

    /**
     * Convert from decimal to roman
     * @param int $value
     * @return string
     */
    public function generate($value)
    {
        $romanLogic = new Decimal\Logic();
        try {
            return $romanLogic->convert($value);
        } catch (\Exception $e) {
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
        $decimalLogic = new Roman\Logic();
        try {
            return $decimalLogic->convert($value);
        } catch (\Exception $e) {
            //TODO: improve this catch
            echo $e->getMessage();
            return null;
        }
    }
}
