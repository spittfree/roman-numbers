<?php

namespace RomanNumbers\Decimal;

use Mappers\Exception\InvalidValueException;

class ThousandsMapper extends Mapper{

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
