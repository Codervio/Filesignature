<?php

namespace Codervio\Filesignature;

/**
 * Interface FilesignatureInterface
 * @package Codervio\Filesignature
 */
interface FilesignatureInterface
{
    const VERSION = 'release';
    const DEF_MIME_DAT = 'db' . DIRECTORY_SEPARATOR . 'mimes_' . self::VERSION . '.dat';

    /**
     * FilesignatureInterface constructor.
     */
    public function __construct();

    /**
     * @param $file
     * @return mixed
     */
    public function setFile($file);

    /**
     * @return array
     */
    public function getArrayResult();

    /**
     * @return string
     */
    public function getVendor();

    /**
     * @return string
     */
    public function getMime();

    /**
     * @return string
     */
    public function getSignature();

    /**
     * @param string $mime
     * @return string
     */
    public function recognizeByMime($mime);
}