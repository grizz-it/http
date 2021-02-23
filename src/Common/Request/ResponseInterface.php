<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Http\Common\Request;

interface ResponseInterface
{
    /**
     * Retrieves the body.
     *
     * @return mixed
     */
    public function getBody(): mixed;

    /**
     * Retrieves the status code.
     *
     * @return int
     */
    public function getStatusCode(): int;

    /**
     * Retrieves the reason phrase for the status.
     *
     * @return string
     */
    public function getReasonPhrase(): string;

    /**
     * Retrieves the response headers.
     *
     * @return string[]
     */
    public function getHeaders(): array;

    /**
     * Retrieves a header by a name.
     *
     * @param string $name
     *
     * @return string
     */
    public function getHeader(string $name): string;

    /**
     * Checks whether a header is set.
     *
     * @param string $name
     *
     * @return bool
     */
    public function hasHeader(string $name): bool;
}
