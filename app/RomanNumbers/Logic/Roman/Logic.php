<?php

namespace RomanNumbers\Logic\Roman;

use RomanNumbers\Mappers\Roman\UnitsMapper;
use RomanNumbers\Mappers\Roman\TensMapper;
use RomanNumbers\Mappers\Roman\HundredsMapper;
use RomanNumbers\Mappers\Roman\ThousandsMapper;
use RomanNumbers\Mappers\Exception\InvalidValueException;

class Logic {

    /**
     * @var UnitsMapper
     */
    private $unitsMapper;
    /**
     * @var TensMapper
     */
    private $tensMapper;
    /**
     * @var HundredsMapper
     */
    private $hundredsMapper;
    /**
     * @var ThousandsMapper
     */
    private $thousandsMapper;

    public function __construct()
    {
        $this->unitsMapper = new UnitsMapper();
        $this->tensMapper = new TensMapper();
        $this->hundredsMapper = new HundredsMapper();
        $this->thousandsMapper = new ThousandsMapper();
    }

    /**
     * Logic to convert is pretty simple, just slice the decimal and map its values
     * It is important to reverse the order to keep the roman number order
     * @param int $input
     * @return string
     */
    public function convert($input)
    {
        $numbers = $this->prepareArrayOfNumbers($input);
        return $this->applyMappers($numbers);
    }

    /**
     * @param int $input
     * @return array
     */
    private function prepareArrayOfNumbers($input)
    {
        $numbers = array_map('intval', str_split($input));
        $numbers = array_reverse($numbers);
        return $numbers;
    }

    /**
     * @param array $numbers
     * @return string
     * @throws InvalidValueException
     */
    private function applyMappers($numbers)
    {
        $result = '';
        if (isset($numbers[3])) {
            $result = $result . $this->thousandsMapper->convert($numbers[3]);
        }
        if (isset($numbers[2])) {
            $result = $result . $this->hundredsMapper->convert($numbers[2]);
        }
        if (isset($numbers[1])) {
            $result = $result . $this->tensMapper->convert($numbers[1]);
        }
        if (isset($numbers[0])) {
            $result = $result . $this->unitsMapper->convert($numbers[0]);
            return $result;
        }
        return $result;
    }
}