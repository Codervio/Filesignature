<?php

namespace Codervio\Filesignature\Reader;

use Exception;

class SignatureReader
{
    private static $blocks = 1024*1024;
    private static $delimiter = PHP_EOL;

    private $result;

    public function __construct()
    {

    }

    public function read($signatureFile)
    {
        $left = '';

        $this->validate($signatureFile);

        $file = $this->readFile($signatureFile);

        while (!feof($file)) {
            $temp = fread($file, SignatureReader::$blocks);

            $this->result = explode(SignatureReader::$delimiter, $temp);
            $this->result[0] = $left . $this->result[0];

            if (!feof($file)) {
                $left = array_pop($lines);
            }
        }
    }

    private function validate($file)
    {
        if (!is_readable($file)) {
            throw new Exception(sprintf('File is not readable: "%s"', $file));
        }

        if (is_dir($file)) {
            throw new Exception(sprintf('A signature can read only from file. Make sure is file.'));
        }

        if (!is_file($file)) {
            throw new Exception(sprintf('Invalid file type: "%s"', $file));
        }
    }

    private function readFile($file)
    {
        $fp = fopen($file, "r");

        if (!$fp) {
            throw new Exception(sprintf('File can not read in binary mode: "%s"', $file));
        }

        return $fp;
    }

    public function getResult()
    {
        return $this->result;
    }
}