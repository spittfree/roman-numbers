<?php

namespace RomanNumbers\Decimal;

use Mappers\Exception\InvalidValueException;

class Mapper {

    /**
     * @var UnitsMapper
     */
    private $unitsMapper;

    public function __construct()
    {
        $this->unitsMapper = new UnitsMapper();
    }

    /**
     * @param string $value
     * @return int
     * @throws InvalidValueException
     */
    public function convert($value)
    {
        $result = 0;

        return $result;
    }
}
