<?php

namespace Codervio\Filesignature\Reader;

use Exception;
use Codervio\Filesignature\Reader\Matchers\MimeMatcher;

class ResolverReader
{
    private static $blocks = 1024*1024;
    private static $delimiter = PHP_EOL;

    private $signatureFile;
    private $fileContent;

    protected $result;

    public function __construct($mimeDatFile)
    {
        $this->validate($mimeDatFile);

        $this->signatureFile = $this->readFile($mimeDatFile);

        $this->fileContent = $this->readFileContent($this->signatureFile);
    }

    public function readContent($content)
    {
        return $this->fileContent;
    }

    private function readFileContent($file)
    {
        $data = [];

        $buffersLine = 0;

        while (!feof($file)) {
            $buffer = fgets($file);

            $data[$buffersLine] = trim($buffer);

            $buffersLine++;
        }

        fclose($file);

        return $data;
    }

    private function readFile($file)
    {
        $fp = fopen($file, "r");

        if (!$fp) {
            throw new Exception(sprintf('File can not read in binary mode: "%s"', $file));
        }

        return $fp;
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
}