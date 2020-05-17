<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Http\Tests\Component\Request;

use PHPUnit\Framework\TestCase;
use GrizzIt\Http\Component\Request\Request;
use GrizzIt\Http\Common\Request\UriInterface;
use GrizzIt\Http\Common\Cookie\CookieManagerInterface;
use GrizzIt\Http\Common\File\UploadedFileManagerInterface;

/**
 * @coversDefaultClass \GrizzIt\Http\Component\Request\Request
 */
class RequestTest extends TestCase
{
    /**
     * @return void
     *
     * @covers ::__construct
     * @covers ::getProtocol
     * @covers ::getMethod
     * @covers ::getPayload
     * @covers ::getHeaders
     * @covers ::hasHeader
     * @covers ::getHeader
     * @covers ::getUri
     * @covers ::getCookieManager
     * @covers ::getUploadedFileManager
     * @covers ::getServerVariables
     * @covers ::hasServerVariable
     * @covers ::getServerVariable
     */
    public function testRequest(): void
    {
        $uri = $this->createMock(UriInterface::class);
        $cookies = $this->createMock(CookieManagerInterface::class);
        $uploadedFiles = $this->createMock(UploadedFileManagerInterface::class);
        $subject = new Request(
            $uri,
            $cookies,
            $uploadedFiles,
            ['foo' => 'bar'],
            'HTTP/2',
            'GET',
            ['Content-Type' => 'application/x-www-form-urlencoded'],
            ['script_name' => 'index.php']
        );

        $this->assertEquals('HTTP/2', $subject->getProtocol());
        $this->assertEquals('GET', $subject->getMethod());
        $this->assertEquals(['foo' => 'bar'], $subject->getPayload());
        $this->assertEquals(
            ['Content-Type' => 'application/x-www-form-urlencoded'],
            $subject->getHeaders()
        );
        $this->assertEquals(true, $subject->hasHeader('Content-Type'));
        $this->assertEquals(
            'application/x-www-form-urlencoded',
            $subject->getHeader('Content-Type')
        );
        $this->assertSame($uri, $subject->getUri());
        $this->assertSame($cookies, $subject->getCookieManager());
        $this->assertSame($uploadedFiles, $subject->getUploadedFileManager());
        $this->assertEquals(['script_name' => 'index.php'], $subject->getServerVariables());
        $this->assertEquals(true, $subject->hasServerVariable('script_name'));
        $this->assertEquals('index.php', $subject->getServerVariable('script_name'));
    }
}
