<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Http\Tests\Component\File;

use PHPUnit\Framework\TestCase;
use GrizzIt\Http\Common\File\FileInterface;
use GrizzIt\Http\Exception\FileNotFoundException;
use GrizzIt\Http\Component\File\UploadedFileManager;

/**
 * @coversDefaultClass \GrizzIt\Http\Component\File\UploadedFileManager
 * @covers \GrizzIt\Http\Exception\FileNotFoundException
 */
class UploadedFileManagerTest extends TestCase
{
    /**
     * @return void
     *
     * @covers ::__construct
     * @covers ::parseFiles
     * @covers ::convertNestedFile
     * @covers ::parseArrayFile
     * @covers ::getKeys
     * @covers ::getFile
     * @covers ::hasFile
     */
    public function testUploadedFileManager(): void
    {
        $subject = new UploadedFileManager(
            [
                'foo' => [
                    'name' => '1x1.png',
                    'type' => 'image/png',
                    'tmp_name' => __DIR__ . '/../../assets/1x1.png',
                    'error' => 0,
                    'size' => filesize(__DIR__ . '/../../assets/1x1.png')
                ],
                'bar' => [
                    'name' => [['1x1.png']],
                    'type' => [['image/png']],
                    'tmp_name' => [[__DIR__ . '/../../assets/1x1.png']],
                    'error' => [[0]],
                    'size' => [[filesize(__DIR__ . '/../../assets/1x1.png')]]
                ]
            ]
        );

        $this->assertEquals(['foo', 'bar'], $subject->getKeys());
        $this->assertEquals(true, $subject->hasFile('bar'));
        $this->assertEquals(false, $subject->hasFile('baz'));
        $this->assertInstanceOf(FileInterface::class, $subject->getFile('foo'));
        $this->assertEquals([[$subject->getFile('foo')]], $subject->getFile('bar'));
        $this->assertNotSame([[$subject->getFile('foo')]], $subject->getFile('bar'));
        $this->expectException(FileNotFoundException::class);
        $subject->getFile('qux');
    }
}
