<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Http\Component\File;

use GrizzIt\Http\Common\File\FileInterface;

class File implements FileInterface
{
    /**
     * Contains the name of the file.
     *
     * @var string
     */
    private string $name;

    /**
     * Contains the path to the tmp file.
     *
     * @var string
     */
    private string $tmpName;

    /**
     * Cotains the error code of the file.
     *
     * @var int
     */
    private int $error;

    /**
     * Contains the size of the file in bytes.
     *
     * @var int
     */
    private int $size;

    /**
     * Contains the type sent by the browser.
     *
     * @var string
     */
    private string $type;

    /**
     * Contains the actual file type.
     *
     * @var string
     */
    private ?string $actualType = null;

    /**
     * Constructor.
     *
     * @param string $name
     * @param string $tmpName
     * @param string $type
     * @param int $error
     * @param int $size
     */
    public function __construct(
        string $name,
        string $tmpName,
        string $type,
        int $error,
        int $size
    ) {
        $this->name = $name;
        $this->tmpName = $tmpName;
        $this->type = $type;
        $this->error = $error;
        $this->size = $size;
    }

    /**
     * Retrieves the name of the file.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Retrieves the type of the file.
     *
     * @return string
     */
    public function getType(): string
    {
        // Determine the file type instead of trusting what the user sent.
        if ($this->actualType === null) {
            $this->actualType = mime_content_type($this->getTmpName());
        }

        return $this->actualType;
    }

    /**
     * Retrieves the temporary location of the file.
     *
     * @return string
     */
    public function getTmpName(): string
    {
        return $this->tmpName;
    }

    /**
     * Retrieves the error code of a file.
     *
     * @return int
     */
    public function getError(): int
    {
        return $this->error;
    }

    /**
     * Retrieves the size of the file in bytes.
     *
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * Determine whether the type was tained.
     *
     * @return bool
     */
    public function hasTaintedType(): bool
    {
        return strpos($this->getType(), $this->type) === false;
    }

    /**
     * Determine whether the type sent by the "browser" differs from the file.
     *
     * @return bool
     */
    public function hasMalformedType(): bool
    {
        return $this->getType() !== $this->type;
    }
}
