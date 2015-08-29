<?php

namespace RomanNumbers\Mappers\Roman;

use RomanNumbers\Mappers\Exception\InvalidValueException;

class TensMapper extends Mapper {

    const VALUE_FOR_0 = '';
    const VALUE_FOR_1 = 'X';
    const VALUE_FOR_2 = 'XX';
    const VALUE_FOR_3 = 'XXX';
    const VALUE_FOR_4 = 'XL';
    const VALUE_FOR_5 = 'L';
    const VALUE_FOR_6 = 'LX';
    const VALUE_FOR_7 = 'LXX';
    const VALUE_FOR_8 = 'LXXX';
    const VALUE_FOR_9 = 'XC';

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
