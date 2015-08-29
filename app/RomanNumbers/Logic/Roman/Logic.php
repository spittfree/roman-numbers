<?php

namespace RomanNumbers\Logic\Roman;

use RomanNumbers\Mappers\Roman\UnitsMapper;
use RomanNumbers\Mappers\Roman\TensMapper;
use RomanNumbers\Mappers\Roman\HundredsMapper;
use RomanNumbers\Mappers\Roman\ThousandsMapper;

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
     * @param int $input
     * @return string
     */
    public function convert($input)
    {
        $result = '';

        $numbers  = array_map('intval', str_split($input));

        if (isset($numbers[0])) {
            $result = $result . $this->unitsMapper->convert($numbers[0]);
        }
        if (isset($numbers[1])) {
            $result = $result . $this->tensMapper->convert($numbers[1]);
        }
        if (isset($numbers[2])) {
            $result = $result . $this->hundredsMapper->convert($numbers[2]);
        }
        if (isset($numbers[3])) {
            $result = $result . $this->thousandsMapper->convert($numbers[3]);
        }

        return $result;
    }
}