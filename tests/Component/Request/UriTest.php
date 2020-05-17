<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Http\Tests\Component\Request;

use PHPUnit\Framework\TestCase;
use GrizzIt\Http\Component\Request\Uri;

/**
 * @coversDefaultClass \GrizzIt\Http\Component\Request\Uri
 */
class UriTest extends TestCase
{
    /**
     * @return void
     *
     * @covers ::__construct
     * @covers ::getScheme
     * @covers ::getUserInfo
     * @covers ::getHost
     * @covers ::getPort
     * @covers ::getPath
     * @covers ::getQuery
     * @covers ::getFragment
     */
    public function testUri(): void
    {
        $subject = new Uri(
            'https',
            'user',
            'pass',
            'foo.test',
            443,
            '/index.php',
            ['foo' => 'bar'],
            'fragment'
        );

        $this->assertEquals('https', $subject->getScheme());
        $this->assertEquals(['user' => 'user', 'pass' => 'pass'], $subject->getUserInfo());
        $this->assertEquals('foo.test', $subject->getHost());
        $this->assertEquals(443, $subject->getPort());
        $this->assertEquals('/index.php', $subject->getPath());
        $this->assertEquals(['foo' => 'bar'], $subject->getQuery());
        $this->assertEquals('fragment', $subject->getFragment());
    }
}
