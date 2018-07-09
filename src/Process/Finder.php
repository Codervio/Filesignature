<?php

namespace Codervio\Filesignature\Process;

use Exception;

class Finder
{
    private $result = null;

    public function __construct()
    {

    }

    public function find($value, $order, array $lookups)
    {
        $hex = $this->findHex($value);

        if ($hex) {
            foreach ($lookups as $lookup) {
                if (strtolower($lookup) === $hex) {
                    $this->result[] = $order;
                    //break;
                }
            }
        }
    }

    public function getResult()
    {
        if (isset($this->result[0])) {
            return $this->result[0];
        }
    }

    private function findHex($value)
    {
        preg_match("/^[\d]{1}\s+([a-f0-9]{1,})/is", $value, $output_array);

        if (isset($output_array[1])) {
            return strtolower($output_array[1]);
        }

        return null;
    }
}