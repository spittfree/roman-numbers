<?php

namespace RomanNumbers\Mappers\Roman;

use RomanNumbers\Mappers\Exception\InvalidValueException;

class UnitsMapper extends Mapper {

    const VALUE_FOR_0 = '';
    const VALUE_FOR_1 = 'I';
    const VALUE_FOR_2 = 'II';
    const VALUE_FOR_3 = 'III';
    const VALUE_FOR_4 = 'IV';
    const VALUE_FOR_5 = 'V';
    const VALUE_FOR_6 = 'VI';
    const VALUE_FOR_7 = 'VII';
    const VALUE_FOR_8 = 'VIII';
    const VALUE_FOR_9 = 'IX';

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
            case 4: return self::VALUE_FOR_4;
            case 5: return self::VALUE_FOR_5;
            case 6: return self::VALUE_FOR_6;
            case 7: return self::VALUE_FOR_7;
            case 8: return self::VALUE_FOR_8;
            case 9: return self::VALUE_FOR_9;
            default: throw new InvalidValueException(
                sprintf(
                    'Value %s is not valid',
                    $value
                )
            );
        }
    }
}
