<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Http\Common\File;

interface FileInterface
{
    /**
     * Retrieves the name of the file.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Retrieves the type of the file.
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Retrieves the temporary location of the file.
     *
     * @return string
     */
    public function getTmpName(): string;

    /**
     * Retrieves the error code of a file.
     *
     * @return int
     */
    public function getError(): int;

    /**
     * Retrieves the size of the file in bytes.
     *
     * @return int
     */
    public function getSize(): int;

    /**
     * Determine whether the type was tained.
     *
     * @return bool
     */
    public function hasTaintedType(): bool;

    /**
     * Determine whether the type sent by the "browser" differs from the file.
     *
     * @return bool
     */
    public function hasMalformedType(): bool;
}
