<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Http\Common\Request;

use GrizzIt\Http\Common\Cookie\CookieManagerInterface;
use GrizzIt\Http\Common\File\UploadedFileManagerInterface;

interface RequestInterface
{
    /**
     * Retrieves the protocol.
     *
     * @return string
     */
    public function getProtocol(): string;

    /**
     * Retrieves the method.
     *
     * @return string
     */
    public function getMethod(): string;

    /**
     * Retrieves the payload.
     *
     * @return mixed
     */
    public function getPayload(): mixed;

    /**
     * Retrieves the request headers.
     *
     * @return string[]
     */
    public function getHeaders(): array;

    /**
     * Determines whether a header is set.
     *
     * @return bool
     */
    public function hasHeader(string $name): bool;

    /**
     * Retrieves a header by its' name.
     *
     * @param  string $name
     *
     * @return string
     */
    public function getHeader(string $name): string;

    /**
     * Retieves the URI.
     *
     * @return UriInterface
     */
    public function getUri(): UriInterface;

    /**
     * Retrieves the cookie manager.
     *
     * @return CookieManagerInterface
     */
    public function getCookieManager(): CookieManagerInterface;

    /**
     * Retrieves the uploaded file manager.
     *
     * @return UploadedFileManagerInterface
     */
    public function getUploadedFileManager(): UploadedFileManagerInterface;

    /**
     * Retrieves the server variables.
     *
     * @return mixed[]
     */
    public function getServerVariables(): array;

    /**
     * Determines whether a server variable is available.
     *
     * @param string $key
     *
     * @return bool
     */
    public function hasServerVariable(string $key): bool;

    /**
     * Retrieves a server variable by its' key.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function getServerVariable(string $key): mixed;
}
