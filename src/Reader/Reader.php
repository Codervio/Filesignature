<?php

namespace Codervio\Filesignature\Reader;

use Exception;

class Reader
{
    private $fp;

    protected $binaryLength = 24;
    protected $signature = null;

    public function __construct()
    {

    }

    public function read($file)
    {
        $this->validate($file);

        $this->readFile($file);
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

    public function readFile($file)
    {
        $this->fp = fopen($file, "rb");

        if (!$this->fp) {
            throw new Exception(sprintf('File can not read in binary mode: "%s"', $file));
        }

        $fileSignatureData = fread($this->fp, $this->binaryLength);

        if (!$fileSignatureData) {
            throw new Exception(sprintf('A file can not read properly: "%s"', $this->fp));
        }

        $this->signature = $fileSignatureData;
    }

    public function getResult()
    {
        if (!$this->signature) {
            throw new Exception(sprintf('A file is not readed. Use readFile() function before.'));
        }

        return bin2hex($this->signature);
    }
}