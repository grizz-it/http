<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Http\Common\Request;

interface UriInterface
{
    /**
     * Retrieves the scheme.
     *
     * @return string
     */
    public function getScheme(): string;

    /**
     * Retrieves the user info.
     *
     * @return array
     */
    public function getUserInfo(): array;

    /**
     * Retrieves the host.
     *
     * @return string
     */
    public function getHost(): string;

    /**
     * Retrieves the port.
     *
     * @return int
     */
    public function getPort(): int;

    /**
     * Retrieves the path.
     *
     * @return string
     */
    public function getPath(): string;

    /**
     * Retrieves the query parameters.
     *
     * @return array
     */
    public function getQuery(): array;

    /**
     * Retrieves the fragment.
     *
     * @return string
     */
    public function getFragment(): string;
}
