<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Http\Component\Cookie;

use GrizzIt\Http\Common\Cookie\CookieManagerInterface;

class CookieManager implements CookieManagerInterface
{
    /**
     * Contains the cookies for the current request.
     *
     * @var string[]
     */
    private $cookies;

    /**
     * Constructor.
     *
     * @param string[] $cookies
     */
    public function __construct(array $cookies)
    {
        $this->cookies = $cookies;
    }

    /**
     * Retrieves a list of available cookie names.
     *
     * @return string[]
     */
    public function getNames(): array
    {
        return array_keys($this->cookies);
    }

    /**
     * Checks whether a cookie exists.
     *
     * @param string $name
     *
     * @return bool
     */
    public function hasCookie(string $name): bool
    {
        return isset($this->cookies[$name]);
    }

    /**
     * Retrieve the value of a cookie by the name.
     *
     * @param string $name
     *
     * @return string
     */
    public function getCookie(string $name): string
    {
        return $this->cookies[$name];
    }

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
    ): void {
        $this->cookies[$name] = $value;
        if ($sameSite !== '') {
            setcookie(
                $name,
                $value,
                [
                    'expires' => $expires,
                    'path' => $path,
                    'domain' => $domain,
                    'secure' => $secure,
                    'httponly' => $httpOnly,
                    'samesite' => $sameSite
                ]
            );

            return;
        }

        setcookie($name, $value, $expires, $path, $domain, $secure, $httpOnly);
    }
}
