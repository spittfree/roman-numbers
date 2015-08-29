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
        $symbols = str_split($input);
        $symbols = array_reverse($symbols);

        $result = 0;
        $lastSymbolValue = 0;

        foreach ($symbols as $symbol) {
            if ($lastSymbolValue <= $this->symbolsMapper->convert($symbol)) {
                $result = $result + $this->symbolsMapper->convert($symbol);
            } else {
                $result = $result - $this->symbolsMapper->convert($symbol);
            }
            $lastSymbolValue = $this->symbolsMapper->convert($symbol);
        }

        return $result;
    }
}
