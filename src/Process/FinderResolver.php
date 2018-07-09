<?php

namespace Codervio\Filesignature\Process;

use Exception;
use Codervio\Filesignature\Reader\ResolverReader;
use Codervio\Filesignature\Reader\Matchers\MimeMatcher;
use Codervio\Filesignature\Reader\Matchers\ExtensionMatcher;

class FinderResolver
{
    protected $resolverType;

    private $value;

    protected $reader;

    private $result = [];

    const MIME = 1;
    const VENDOR = 2;
    const EXTENSION = 3;

    public function __construct($mimeDatFile)
    {
        $this->reader = new ResolverReader($mimeDatFile);
    }

    public function findByMime($mime)
    {
        $this->resolverType = self::MIME;
        $this->value = $mime;
    }

    public function findByExtension($extension)
    {
        $this->resolverType = self::EXTENSION;
        $this->value = $extension;
    }

    public function resolve()
    {
        $fileContent = $this->reader->readContent($this->value);

        if ($this->resolverType === self::MIME) {
            $matcher = new MimeMatcher($fileContent);
        }

        if ($this->resolverType === self::EXTENSION) {
            $matcher = new ExtensionMatcher($fileContent);
        }

        $matcher->resolveType($this->value);
        $this->result = $matcher->getResult();
    }

    public function getVendor($single = true)
    {
        foreach ($this->result as $value) {

            if ($single) {
                return $value['name'];
            }

            $result[] = $value['name'];
        }

        if ($result) {
            return join(', ', array_unique($result));
        }
    }

    public function getExtension($single = true)
    {
        foreach ($this->result as $value) {

            if ($single) {
                return $value['extension'];
            }

            $result[] = $value['extension'];
        }

        if ($result) {
            return join(', ', array_unique($result));
        }
    }

    public function getSignature($single = true)
    {
        foreach ($this->result as $value) {

            if ($single) {
                return $value['signature'];
            }

            $result[] = $value['signature'];
        }

        if ($result) {
            return join(', ', array_unique($result));
        }
    }

    public function getMime($single = true)
    {
        foreach ($this->result as $value) {

            if ($single) {
                return $value['mime'];
            }

            $result[] = $value['name'];
        }

        if ($result) {
            return join(', ', array_unique($result));
        }
    }
}