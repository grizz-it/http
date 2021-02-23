<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Http\Component\Request;

use GrizzIt\Http\Common\Request\ResponseInterface;

class Response implements ResponseInterface
{
    /**
     * Contains the body.
     *
     * @var mixed
     */
    private mixed $body;

    /**
     * Contains the headers.
     *
     * @var array
     */
    private array $headers;

    /**
     * Contains the status code.
     *
     * @var int
     */
    private int $statusCode;

    /**
     * Contains the reason phrase for the status code.
     *
     * @var string
     */
    private string $reasonPhrase;

    /**
     * Constructor.
     *
     * @param mixed $body
     * @param array $headers
     * @param int $statusCode
     * @param string $reasonPhrase
     */
    public function __construct(
        mixed $body,
        array $headers = [],
        int $statusCode = 200,
        string $reasonPhrase = 'OK'
    ) {
        $this->body = $body;
        $this->headers = $headers;
        $this->statusCode = $statusCode;
        $this->reasonPhrase = $reasonPhrase;
    }

    /**
     * Retrieves the body.
     *
     * @return mixed
     */
    public function getBody(): mixed
    {
        return $this->body;
    }

    /**
     * Retrieves the status code.
     *
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * Retrieves the reason phrase for the status.
     *
     * @return string
     */
    public function getReasonPhrase(): string
    {
        return $this->reasonPhrase;
    }

    /**
     * Retrieves the response headers.
     *
     * @return string[]
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * Retrieves a header by a name.
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
     * Checks whether a header is set.
     *
     * @param string $name
     *
     * @return bool
     */
    public function hasHeader(string $name): bool
    {
        return isset($this->headers[$name]);
    }
}
