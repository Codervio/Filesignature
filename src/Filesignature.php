<?php

namespace Codervio\Filesignature;

use Codervio\Filesignature\FilesignatureInterface;
use Codervio\Filesignature\Traits\FilesignatureTrait;
use Codervio\Filesignature\Reader\Reader;
use Codervio\Filesignature\Process\Decreaser;
use Codervio\Filesignature\Reader\SignatureReader;
use Codervio\Filesignature\Process\Finder;
use Codervio\Filesignature\Process\Fetcher;
use Codervio\Filesignature\Process\FinderResolver;

/**
 * Class Filesignature
 * @package Codervio\Filesignature
 */
class Filesignature implements FilesignatureInterface
{
    protected $file;

    private $reader;
    private $decreaser;
    private $signature;
    private $finder;
    private $fetcher;
    private $finderResolver;

    private $resolverMime = false;

    private $result;
    private $resolver;

    /**
     * Filesignature constructor.
     */
    public function __construct()
    {
        $this->reader = new Reader();
        $this->decreaser = new Decreaser();
        $this->signature = new SignatureReader();
        $this->finder = new Finder();
        $this->fetcher = new Fetcher;
        $this->finderResolver = new FinderResolver(FilesignatureInterface::DEF_MIME_DAT);
    }

    /**
     * @param $file
     * @return mixed|void
     */
    public function setFile($file)
    {
        $this->file = $file;

        $this->reader->read($this->file);

        $this->decreaser->decrease($this->reader->getResult());

        $this->signature->read(FilesignatureInterface::DEF_MIME_DAT);
    }

    /**
     * @param string $mime
     * @return string
     */
    public function recognizeByMime($mime)
    {
        $this->resolverMime = true;

        $this->finderResolver->findByMime($mime);

        $this->resolver = $this->finderResolver->resolve();
    }

    /**
     * @param string $extension
     * @return string
     */
    public function recognizeByExtension($extension)
    {
        $this->resolverMime = true;

        $this->finderResolver->findByExtension($extension);

        $this->resolver = $this->finderResolver->resolve();
    }

    /**
     * @return array|mixed
     * @throws \Exception
     */
    public function getArrayResult()
    {
        return $this->parse();
    }

    /**
     * @return string
     */
    public function getVendor($single = true)
    {
        $result = $this->parse();

        if ($this->resolverMime) {
            return $this->finderResolver->getVendor($single);
        }

        return $result['name'];
    }

    public function getMime($single = true)
    {
        $result = $this->parse();

        if ($this->resolverMime) {
            return $this->finderResolver->getMime($single);
        }

        return $result['mime'];
    }

    public function getSignature($single = true)
    {
        $result = $this->parse();

        if ($this->resolverMime) {
            return $this->finderResolver->getSignature($single);
        }

        return $result['signature'];
    }

    public function getExtension($single = true)
    {
        $result = $this->parse();

        if ($this->resolverMime) {
            return $this->finderResolver->getExtension($single);
        }

        return $result['ext'];
    }

    /**
     * @return array
     */
    private function parse()
    {
        if ($this->resolverMime) {
            return $this->resolver;
        }

        foreach ($this->signature->getResult() as $k => $line) {
            $this->finder->find($line, $k, $this->decreaser->getResult());
            $result = $this->finder->getResult();

            if ($result) {
                $this->result = $this->fetcher->getResult($this->signature->getResult(), $result);
                return $this->result;
            }
        }
    }
}