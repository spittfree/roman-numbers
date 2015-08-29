<?php

namespace RomanNumbers\Mappers\Decimal;

use RomanNumbers\Mappers\Exception\InvalidValueException;

class UnitsMapper
{

    const VALUE_FOR_I = 1;
    const VALUE_FOR_V = 5;

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
            case 'I': return self::VALUE_FOR_I;
            case 'V': return self::VALUE_FOR_V;
            default: throw new InvalidValueException();
        }
    }
}
