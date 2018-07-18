<?php

namespace Codervio\Filesignature\Tests;

use PHPUnit\Framework\TestCase;
use Codervio\Filesignature\Filesignature;

/**
 * Class FilesignatureGuessTest
 * @package Codervio\Filesignature\Tests
 */
class FilesignatureGuessTest extends TestCase
{
    protected function setUp()
    {
        // No setup.
    }

    public function testRecognizeByMime()
    {
        $filesignature = new Filesignature();
        $filesignature->recognizeByMime('image/jpeg');

        $this->assertEquals($filesignature->getVendor(), 'Joint Photographic Experts Group');
        $this->assertEquals($filesignature->getSignature(), 'ffd8ff');
        $this->assertEquals($filesignature->getMime(), 'image/jpeg');
        $this->assertEquals($filesignature->getExtension(), 'JPEG');
    }

    public function testRecognizeByExtension()
    {
        $filesignature = new Filesignature();
        $filesignature->recognizeByExtension('JPG');

        $this->assertEquals($filesignature->getVendor(), 'Joint Photographic Experts Group');
        $this->assertEquals($filesignature->getSignature(), 'ffd8ffdb');
        $this->assertEquals($filesignature->getMime(), 'image/jpeg');
        $this->assertEquals($filesignature->getExtension(), 'JPG');
    }
}
