<?php

use Exception;

class DecreasorValueExceptionValue extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct('A value for decreasor should be string only.');
    }
}