<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Http\Component\Request;

use GrizzIt\Http\Common\Request\UriInterface;

class Uri implements UriInterface
{
    /**
     * Contains the scheme.
     *
     * @var string
     */
    private string $scheme;

    /**
     * Contains the user info.
     *
     * @var array
     */
    private array $userInfo;

    /**
     * Contains the host.
     *
     * @var string
     */
    private string $host;

    /**
     * Contains the port.
     *
     * @var int
     */
    private int $port;

    /**
     * Contains the path.
     *
     * @var string
     */
    private string $path;

    /**
     * Contains the query.
     *
     * @var array
     */
    private array $query;

    /**
     * Contains the fragment.
     *
     * @var string
     */
    private string $fragment;

    /**
     * Constructor.
     *
     * @param string $scheme
     * @param string $user
     * @param string $pass
     * @param string $host
     * @param int $port
     * @param string $path
     * @param array $queryParameters
     * @param string $fragment
     */
    public function __construct(
        string $scheme = '',
        string $user = '',
        string $pass = '',
        string $host = '',
        int $port = -1,
        string $path = '',
        array $queryParameters = [],
        string $fragment = ''
    ) {
        $this->scheme = $scheme;
        $this->userInfo['user'] = $user;
        $this->userInfo['pass'] = $pass;
        $this->host = $host;
        $this->port = $port;
        $this->path = $path;
        $this->query = $queryParameters;
        $this->fragment = $fragment;
    }

    /**
     * Retrieves the scheme.
     *
     * @return string
     */
    public function getScheme(): string
    {
        return $this->scheme;
    }

    /**
     * Retrieves the user info.
     *
     * @return array
     */
    public function getUserInfo(): array
    {
        return $this->userInfo;
    }

    /**
     * Retrieves the host.
     *
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * Retrieves the port.
     *
     * @return int
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * Retrieves the path.
     *
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Retrieves the query parameters.
     *
     * @return array
     */
    public function getQuery(): array
    {
        return $this->query;
    }

    /**
     * Retrieves the fragment.
     *
     * @return string
     */
    public function getFragment(): string
    {
        return $this->fragment;
    }
}
