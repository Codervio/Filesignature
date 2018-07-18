<?php

namespace Codervio\Filesignature\Tests;

use PHPUnit\Framework\TestCase;
use Codervio\Filesignature\Filesignature;

/**
 * Class FilesignatureTest
 * @package Codervio\Filesignature\Tests
 */
class FilesignatureTest extends TestCase
{
    protected function setUp()
    {

    }

    private static function getExtensionPathTest($extension)
    {
        return __DIR__.DIRECTORY_SEPARATOR.'fixtures'.DIRECTORY_SEPARATOR.$extension.'.'.$extension;
    }

    public function testGuessByFilenameAvi()
    {
        $filesignature = new Filesignature();
        $filesignature->setFile(static::getExtensionPathTest('avi'));
        $result = $filesignature->getArrayResult(true);

        $this->assertEquals([
            'name' => '4X Movie video',
            'signature' => '52494646',
            'ext' => '4XM',
            'mime' => 'audio/x-adpcm'
        ], $result);
    }

    public function testGuessByFilenameJpg()
    {
        $filesignature = new Filesignature();
        $filesignature->setFile(static::getExtensionPathTest('jpg'));
        $result = $filesignature->getArrayResult(true);

        $this->assertEquals([
            'name' => 'Joint Photographic Experts Group',
            'signature' => 'ffd8ff',
            'ext' => 'JPEG',
            'mime' => 'image/jpeg'
        ], $result);
    }

    public function testGuessByMime()
    {
        $filesignature = new Filesignature();
        $filesignature->recognizeByMime('application/pdf');

        $this->assertEquals('PDF', $filesignature->getExtension());
    }

    public function testGetVendor()
    {
        $filesignature = new Filesignature();
        $filesignature->setFile(static::getExtensionPathTest('jpg'));
        $result = $filesignature->getVendor();

        $this->assertEquals('Joint Photographic Experts Group', $result);
    }

    public function testGetExtension()
    {
        $filesignature = new Filesignature();
        $filesignature->setFile(static::getExtensionPathTest('jpg'));
        $result = $filesignature->getExtension();

        $this->assertEquals('JPEG', $result);
    }

    public function testGetMime()
    {
        $filesignature = new Filesignature();
        $filesignature->setFile(static::getExtensionPathTest('jpg'));
        $result = $filesignature->getMime();

        $this->assertEquals('image/jpeg', $result);
    }

    public function testGetSignature()
    {
        $filesignature = new Filesignature();
        $filesignature->setFile(static::getExtensionPathTest('jpg'));
        $result = $filesignature->getSignature();

        $this->assertEquals('ffd8ff', $result);
    }
}
