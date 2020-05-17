<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Http\Component\Request;

use GrizzIt\Http\Common\Request\UriInterface;
use GrizzIt\Http\Common\Request\RequestInterface;
use GrizzIt\Http\Common\Cookie\CookieManagerInterface;
use GrizzIt\Http\Common\File\UploadedFileManagerInterface;

class Request implements RequestInterface
{
    /**
     * Contains the protocol.
     *
     * @var string
     */
    private $protocol;

    /**
     * Contains the method.
     *
     * @var string
     */
    private $method;

    /**
     * Contains the payload.
     *
     * @var mixed
     */
    private $payload;

    /**
     * Contains the headers.
     *
     * @var array
     */
    private $headers;

    /**
     * Contains the URI.
     *
     * @var UriInterface
     */
    private $uri;

    /**
     * Contains the cookie manager.
     *
     * @var CookieManagerInterface
     */
    private $cookieManager;

    /**
     * Contains the uploaded file manager.
     *
     * @var UploadedFileManagerInterface
     */
    private $uploadedFileManager;

    /**
     * Contains the server variables.
     *
     * @var array
     */
    private $serverVariables;

    /**
     * Constructor.
     *
     * @param UriInterface $uri
     * @param CookieManagerInterface $cookieManager
     * @param UploadedFileManagerInterface $uploadedFileManager
     * @param mixed $payload
     * @param string $protocol
     * @param string $method
     * @param array $headers
     * @param array $serverVariables
     */
    public function __construct(
        UriInterface $uri,
        CookieManagerInterface $cookieManager,
        UploadedFileManagerInterface $uploadedFileManager,
        $payload = null,
        string $protocol = '',
        string $method = '',
        array $headers = [],
        array $serverVariables = []
    ) {
        $this->protocol = $protocol;
        $this->method = $method;
        $this->payload = $payload;
        $this->headers = $headers;
        $this->uri = $uri;
        $this->cookieManager = $cookieManager;
        $this->uploadedFileManager = $uploadedFileManager;
        $this->serverVariables = $serverVariables;
    }

    /**
     * Retrieves the protocol.
     *
     * @return string
     */
    public function getProtocol(): string
    {
        return $this->protocol;
    }

    /**
     * Retrieves the method.
     *
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * Retrieves the payload.
     *
     * @return mixed
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * Retrieves the request headers.
     *
     * @return string[]
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * Determines whether a header is set.
     *
     * @param string $name
     *
     * @return bool
     */
    public function hasHeader(string $name): bool
    {
        return isset($this->headers[$name]);
    }

    /**
     * Retrieves a header by its' name.
     *
     * @param string $name
     *
     * @return string
     */
    public function getHeader(string $name): string
    {
        return $this->headers[$name];
    }

    /**
     * Retieves the URI.
     *
     * @return UriInterface
     */
    public function getUri(): UriInterface
    {
        return $this->uri;
    }

    /**
     * Retrieves the cookie manager.
     *
     * @return array
     */
    public function getCookieManager(): CookieManagerInterface
    {
        return $this->cookieManager;
    }

    /**
     * Retrieves the uploaded file manager.
     *
     * @return UploadedFileManagerInterface
     */
    public function getUploadedFileManager(): UploadedFileManagerInterface
    {
        return $this->uploadedFileManager;
    }

    /**
     * Retrieves the server variables.
     *
     * @return mixed[]
     */
    public function getServerVariables(): array
    {
        return $this->serverVariables;
    }

    /**
     * Determines whether a server variable is available.
     *
     * @param string $key
     *
     * @return bool
     */
    public function hasServerVariable(string $key): bool
    {
        return isset($this->serverVariables[$key]);
    }

    /**
     * Retrieves a server variable by its' key.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function getServerVariable(string $key)
    {
        return $this->serverVariables[$key];
    }
}
