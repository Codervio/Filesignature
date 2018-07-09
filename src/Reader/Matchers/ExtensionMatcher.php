<?php

namespace Codervio\Filesignature\Reader\Matchers;

/**
 * Class ExtensionMatcher
 * @package Codervio\Filesignature\Reader\Matchers
 */
class ExtensionMatcher
{
    /**
     * @var array $fileContent
     */
    protected $fileContent;

    /**
     * @var array $result
     */
    private $result = [];

    /**
     * MimeMatcher constructor.
     * @param array $fileContent
     */
    public function __construct(array $fileContent)
    {
        $this->fileContent = $fileContent;
    }

    /**
     * @param string $keyword
     * @return array
     */
    public function resolveType(string $keyword)
    {
        foreach ($this->fileContent as $line => $value) {
            if (strpos($value, $keyword) !== false) {
                $this->result[$line]['name'] = $this->fileContent[$line-4];
                $this->result[$line]['extension'] = $this->fileContent[$line-1];
                $this->result[$line]['mime'] = $this->fileContent[$line];
                $this->result[$line]['signature'] = $this->fileContent[$line-2];
            }
        }
    }

    public function getResult()
    {
        return $this->result;
    }
}