<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Http\Factory;

use GrizzIt\Http\Component\Request\Uri;
use GrizzIt\Http\Common\Request\UriInterface;

class UriFactory
{
    /**
     * Creates a URI object from a string.
     *
     * @param string $uri
     *
     * @return UriInterface
     */
    public function createFromString(
        string $uri
    ): UriInterface {
        $components = parse_url($uri);
        parse_str($components['query'] ?? '', $queryParameters);

        return $this->create(
            $components['scheme'] ?? '',
            $components['user'] ?? '',
            $components['pass'] ?? '',
            $components['host'] ?? '',
            $components['port'] ?? -1,
            $components['path'] ?? '',
            $queryParameters,
            $components['fragment'] ?? ''
        );
    }

    /**
     * Creates a URI object.
     *
     * @param string $scheme
     * @param string $user
     * @param string $pass
     * @param string $host
     * @param integer $port
     * @param string $path
     * @param array $queryParameters
     * @param string $fragment
     *
     * @return UriInterface
     */
    public function create(
        string $scheme = '',
        string $user = '',
        string $pass = '',
        string $host = '',
        int $port = -1,
        string $path = '',
        array $queryParameters = [],
        string $fragment = ''
    ): UriInterface {
        return new Uri(
            $scheme,
            $user,
            $pass,
            $host,
            $port,
            $path,
            $queryParameters,
            $fragment
        );
    }
}
