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

    public function testGuessByFilename()
    {
        $filesignature = new Filesignature();
        $filesignature->setFile('fixtures/jpg.jpg');
        return $filesignature->getArrayResult();
    }
}
