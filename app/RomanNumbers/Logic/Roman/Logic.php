<?php

namespace RomanNumbers\Logic\Roman;

use RomanNumbers\Mappers\Roman\SymbolsMapper;
use RomanNumbers\Mappers\Exception\InvalidValueException;

class Logic
{
    /**
     * @var SymbolsMapper
     */
    private $symbolsMapper;

    /**
     * This constructor uses home-made dependency injection for testing purposes.
     * I am trying to avoid any external libraries to manage this.
     *
     * @param SymbolsMapper $symbolsMapper
     */
    public function __construct(
        SymbolsMapper $symbolsMapper = null
    ){
        $this->symbolsMapper = $symbolsMapper ? : new SymbolsMapper();
    }

    /**
     * @param string $input
     * @return int
     * @throws InvalidValueException
     */
    public function convert($input)
    {
        $this->validate($input);
        $symbols = $this->prepareArrayOfSymbols($input);
        return $this->processSymbols($symbols);
    }

    /**
     * @param string $input
     */
    private function validate($input)
    {
        //TODO: Check if its valid or throw specific Exception
    }

    /**
     * This functions decides if the Symbol should be added or subtracted
     *
     * @param int $lastSymbolValue
     * @param int $symbolValue
     * @return bool
     * @throws InvalidValueException
     */
    private function shouldBeAdded($lastSymbolValue, $symbolValue)
    {
        return $lastSymbolValue <= $symbolValue;
    }

    /**
     * @param string $input
     * @return array
     */
    private function prepareArrayOfSymbols($input)
    {
        return array_reverse(
            str_split($input)
        );
    }

    /**
     * @param array $symbols
     * @return int
     * @throws InvalidValueException
     */
    private function processSymbols($symbols)
    {
        $result = 0;
        $lastSymbolValue = 0;

        foreach ($symbols as $symbol) {
            $symbolValue = $this->symbolsMapper->convert($symbol);
            $result = $this->processSymbolValue($lastSymbolValue, $symbolValue, $result);
            $lastSymbolValue = $symbolValue;
        }
        return $result;
    }

    /**
     * @param int $lastSymbolValue
     * @param int $symbolValue
     * @param int $result
     * @return int
     */
    private function processSymbolValue($lastSymbolValue, $symbolValue, $result)
    {
        if ($this->shouldBeAdded($lastSymbolValue, $symbolValue)) {
            $result += $symbolValue;
        } else {
            $result -= $symbolValue;
        }
        return $result;
    }
}
