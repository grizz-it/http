<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Http\Tests\Component\Request;

use PHPUnit\Framework\TestCase;
use GrizzIt\Http\Component\Request\Response;

/**
 * @coversDefaultClass \GrizzIt\Http\Component\Request\Response
 */
class ResponseTest extends TestCase
{
    /**
     * @return void
     *
     * @covers ::__construct
     * @covers ::getBody
     * @covers ::getStatusCode
     * @covers ::getReasonPhrase
     * @covers ::getHeaders
     * @covers ::getHeader
     * @covers ::hasHeader
     */
    public function testResponse(): void
    {
        $subject = new Response(
            '{"foo": "bar"}',
            ['Content-Type' => 'application/json'],
            200,
            'OK'
        );

        $this->assertEquals('{"foo": "bar"}', $subject->getBody());
        $this->assertEquals(200, $subject->getStatusCode());
        $this->assertEquals('OK', $subject->getReasonPhrase());
        $this->assertEquals(['Content-Type' => 'application/json'], $subject->getHeaders());
        $this->assertEquals('application/json', $subject->getHeader('Content-Type'));
        $this->assertEquals(true, $subject->hasHeader('Content-Type'));
    }
}
