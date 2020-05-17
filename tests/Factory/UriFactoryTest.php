<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Http\Tests\Component\Request;

use PHPUnit\Framework\TestCase;
use GrizzIt\Http\Factory\UriFactory;
use GrizzIt\Http\Common\Request\UriInterface;

/**
 * @coversDefaultClass \GrizzIt\Http\Factory\UriFactory
 */
class UriFactoryTest extends TestCase
{
    /**
     * @return void
     *
     * @covers ::create
     * @covers ::createFromString
     */
    public function testUri(): void
    {
        $subject = new UriFactory();
        $this->assertInstanceOf(
            UriInterface::class,
            $subject->createFromString('https://user:pass@example.com/foo#fragment')
        );
    }
}
