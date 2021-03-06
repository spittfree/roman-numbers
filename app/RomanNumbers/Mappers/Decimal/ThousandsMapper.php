<?php

namespace RomanNumbers\Mappers\Decimal;

use \RomanNumbers\Mappers\Exception\InvalidValueException;

class ThousandsMapper
{

    const VALUE_FOR_0 = '';
    const VALUE_FOR_1 = 'M';
    const VALUE_FOR_2 = 'MM';
    const VALUE_FOR_3 = 'MMM';

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
            case 0: return self::VALUE_FOR_0;
            case 1: return self::VALUE_FOR_1;
            case 2: return self::VALUE_FOR_2;
            case 3: return self::VALUE_FOR_3;
            default: throw new InvalidValueException(
                sprintf(
                    'Value %s is not valid or its above the allowed threshold',
                    $value
                )
            );
        }
    }
}
