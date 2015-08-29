<?php

namespace RomanNumbers\Decimal;

use Mappers\Exception\InvalidValueException;

class TensMapper extends Mapper{

    const VALUE_FOR_X = 10;
    const VALUE_FOR_L = 50;

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
            case 'X': return self::VALUE_FOR_X;
            case 'L': return self::VALUE_FOR_L;
            default: throw new InvalidValueException();
        }
    }
}
