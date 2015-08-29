<?php

namespace RomanNumbers\Mappers\Decimal;

use RomanNumbers\Mappers\Exception\InvalidValueException;

class ThousandsMapper
{

    const VALUE_FOR_M = 1000;

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
            case 'M': return self::VALUE_FOR_M;
            default: throw new InvalidValueException();
        }
    }
}
