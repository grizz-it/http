<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Http\Tests\Component\Cookie;

use PHPUnit\Framework\TestCase;
use GrizzIt\Http\Component\Cookie\CookieManager;

/**
 * @coversDefaultClass \GrizzIt\Http\Component\Cookie\CookieManager
 */
class CookieManagerTest extends TestCase
{
    /**
     * @return void
     *
     * @covers ::__construct
     * @covers ::getNames
     * @covers ::hasCookie
     * @covers ::getCookie
     * @covers ::setCookie
     *
     * @runInSeparateProcess
     */
    public function testCookies(): void
    {
        $subject = new CookieManager(['foo' => 'bar']);

        $this->assertEquals(['foo'], $subject->getNames());
        $this->assertEquals(false, $subject->hasCookie('baz'));
        $subject->setCookie('bar', 'baz');
        $this->assertEquals(true, $subject->hasCookie('bar'));
        $this->assertEquals('baz', $subject->getCookie('bar'));
        $this->assertEquals(['foo', 'bar'], $subject->getNames());

        $subject->setCookie(
            'baz',
            'qux',
            100,
            'foo',
            'bar.test',
            true,
            true,
            'Lax'
        );

        $this->assertEquals(true, $subject->hasCookie('baz'));
        $this->assertEquals('qux', $subject->getCookie('baz'));
        $this->assertEquals(['foo', 'bar', 'baz'], $subject->getNames());
    }
}
