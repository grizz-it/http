<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Http\Tests\Component\File;

use PHPUnit\Framework\TestCase;
use GrizzIt\Http\Component\File\File;

/**
 * @coversDefaultClass \GrizzIt\Http\Component\File\File
 */
class FileTest extends TestCase
{
    /**
     * @return void
     *
     * @covers ::__construct
     * @covers ::getName
     * @covers ::getType
     * @covers ::getTmpName
     * @covers ::getError
     * @covers ::getSize
     * @covers ::hasMalformedType
     * @covers ::hasTaintedType
     */
    public function testFile(): void
    {
        $file = __DIR__ . '/../../assets/1x1.png';
        $subject = new File(
            '1x1.png',
            $file,
            'png',
            0,
            filesize($file)
        );

        $this->assertEquals('1x1.png', $subject->getName());
        $this->assertEquals('image/png', $subject->getType());
        $this->assertEquals($file, $subject->getTmpName());
        $this->assertEquals(0, $subject->getError());
        $this->assertEquals(filesize($file), $subject->getSize());
        $this->assertEquals(true, $subject->hasMalformedType());
        $this->assertEquals(false, $subject->hasTaintedType());
    }
}
