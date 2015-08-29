<?php

namespace RomanNumbers\Decimal;

use Mappers\Exception\InvalidValueException;

class HundredsMapper extends Mapper{

    const VALUE_FOR_C = 100;
    const VALUE_FOR_D = 500;

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
            case 'C': return self::VALUE_FOR_C;
            case 'D': return self::VALUE_FOR_D;
            default: throw new InvalidValueException();
        }
    }
}
