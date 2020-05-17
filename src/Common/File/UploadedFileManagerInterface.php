<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Http\Common\File;

interface UploadedFileManagerInterface
{
    /**
     * Retrieves a list of available keys.
     *
     * @return string[]
     */
    public function getKeys(): array;

    /**
     * Retrieves a list of uploaded files for a key.
     *
     * @param string $key
     *
     * @return FileInterface|array
     */
    public function getFile(string $key);

    /**
     * Checks whether a file was uploaded for a key.
     *
     * @param string $key
     *
     * @return bool
     */
    public function hasFile(string $key): bool;
}
