<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Http\Common\Cookie;

interface CookieManagerInterface
{
    /**
     * Retrieves a list of available cookie names.
     *
     * @return string[]
     */
    public function getNames(): array;

    /**
     * Checks whether a cookie exists.
     *
     * @param string $name
     *
     * @return bool
     */
    public function hasCookie(string $name): bool;

    /**
     * Retrieves a cookie by its' name.
     *
     * @param string $name
     *
     * @return string
     */
    public function getCookie(string $name): string;

    /**
     * Sets a cookie.
     *
     * @param string $name
     * @param string $value
     * @param int $expires
     * @param string $path
     * @param string $domain
     * @param bool $secure
     * @param bool $httpOnly
     * @param string $sameSite
     *
     * @return void
     */
    public function setCookie(
        string $name,
        string $value = '',
        int $expires = 0,
        string $path = '',
        string $domain = '',
        bool $secure = false,
        bool $httpOnly = false,
        string $sameSite = ''
    ): void;
}
