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
        $symbols = $this->prepareArrayOfSymbols($input);
        return $this->processSymbols($symbols);
    }

    /**
     * This functions decides if the Symbol should be added or subtracted
     *
     * @param int $lastSymbolValue
     * @param string $symbol
     * @return bool
     * @throws InvalidValueException
     */
    private function shouldBeAdded($lastSymbolValue, $symbol)
    {
        return $lastSymbolValue <= $this->symbolsMapper->convert($symbol);
    }

    /**
     * @param string $input
     * @return array
     */
    private function prepareArrayOfSymbols($input)
    {
        $symbols = str_split($input);
        $symbols = array_reverse($symbols);
        return $symbols;
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
            if ($this->shouldBeAdded($lastSymbolValue, $symbol)) {
                $result += $this->symbolsMapper->convert($symbol);
            } else {
                $result -= $this->symbolsMapper->convert($symbol);
            }
            $lastSymbolValue = $this->symbolsMapper->convert($symbol);
        }
        return $result;
    }
}
