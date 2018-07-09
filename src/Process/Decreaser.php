<?php

namespace Codervio\Filesignature\Process;

use Codervio\Filesignature\Reader\Reader;
use Exception;
use Codervio\Filesignature\Exception\DecreasorException;
use Codervio\Filesignature\Exception\DecreasorValueException;

class Decreaser
{
    private $result = [];

    public function __construct()
    {

    }

    public function decrease($value)
    {
        $length = $this->getLength($value);

        for ($l = $length; $l > 0; $l--) {
            $strvalfind =  substr($value, 0, +$l);
            $this->result[] = strtolower(strval($strvalfind));
        }

        return $this->result;
    }

    private function getLength($value)
    {
        $this->validateLength($value);

        return strlen($value);
    }

    /**
     * @param $value
     * @return bool|Exception
     */
    private function validateLength($value)
    {
        if (!is_string($value)) {
            throw new DecreasorException();
        }

        if (strlen($value) === 0) {
            throw new DecreasorValueException();
        }

        return true;
    }

    public function getResult()
    {
        return $this->result;
    }
}