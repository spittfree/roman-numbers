<?php

namespace RomanNumbers\Mappers\Decimal;

use RomanNumbers\Mappers\Exception\InvalidValueException;

class SymbolsMapper {

    const I = 1;
    const V = 5;
    const X = 10;
    const L = 50;
    const C = 100;
    const D = 500;
    const M = 1000;

    /**
     * I hate to use switch but it is the simplest way to do it
     *
     * @param int $value
     * @return string
     * @throws InvalidValueException
     */
    public function convert($value)
    {
        switch ($value) {
            case 'I': return self::I;
            case 'V': return self::V;
            case 'X': return self::X;
            case 'L': return self::L;
            case 'C': return self::D;
            case 'D': return self::D;
            case 'M': return self::M;
            default: throw new InvalidValueException();
        }
    }
}