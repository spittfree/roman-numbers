<?php

namespace RomanNumbers\Logic\Decimal;

use RomanNumbers\Mappers\Decimal\UnitsMapper;
use RomanNumbers\Mappers\Decimal\TensMapper;
use RomanNumbers\Mappers\Decimal\HundredsMapper;
use RomanNumbers\Mappers\Decimal\ThousandsMapper;
use RomanNumbers\Mappers\Exception\InvalidValueException;

class Logic
{

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

    /**
     * This constructor uses home-made dependency injection for testing purposes.
     * I am trying to avoid any external libraries to manage this.
     *
     * @param UnitsMapper $unitsMapper
     * @param TensMapper $tensMapper
     * @param HundredsMapper $hundredsMapper
     * @param ThousandsMapper $thousandsMapper
     */
    public function __construct(
        UnitsMapper $unitsMapper = null,
        TensMapper $tensMapper = null,
        HundredsMapper $hundredsMapper = null,
        ThousandsMapper $thousandsMapper = null
    ) {
        $this->unitsMapper = $unitsMapper ? : new UnitsMapper();
        $this->tensMapper = $tensMapper ? : new TensMapper();
        $this->hundredsMapper = $hundredsMapper ? : new HundredsMapper();
        $this->thousandsMapper = $thousandsMapper? : new ThousandsMapper();
    }

    /**
     * Logic to convert is pretty simple, just slice the decimal and map its values
     * It is important to reverse the order to keep the roman number order
     * @param int $input
     * @return string
     */
    public function convert($input)
    {
        $this->validate($input);
        $numbers = $this->prepareArrayOfNumbers($input);
        return $this->applyMappers($numbers);
    }

    /**
     * @param string $input
     */
    private function validate($input)
    {
        //TODO: Check if its valid or throw specific Exception
    }

    /**
     * @param int $input
     * @return array
     */
    private function prepareArrayOfNumbers($input)
    {
        return array_reverse(
            array_map('intval', str_split($input))
        );
    }

    /**
     * A bit hardcoded
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