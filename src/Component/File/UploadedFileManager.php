<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Http\Component\File;

use GrizzIt\Http\Common\File\FileInterface;
use GrizzIt\Http\Exception\FileNotFoundException;
use GrizzIt\Http\Common\File\UploadedFileManagerInterface;

class UploadedFileManager implements UploadedFileManagerInterface
{
    /**
     * Contains the files of sent by the browser.
     *
     * @var array[]|FileInterface[]
     */
    private array $files;

    /**
     * Constructor.
     *
     * @param array[]|FileInterface[] $files
     */
    public function __construct(array $files)
    {
        $this->files = $this->parseFiles($files);
    }

    /**
     * Parses the files to a logical array.
     *
     * @param array $files
     *
     * @return array
     */
    private function parseFiles(array $files): array
    {
        $returnFiles = [];
        foreach ($files as $key => $file) {
            if (
                array_keys($file) == [
                    'name',
                    'type',
                    'tmp_name',
                    'error',
                    'size'
                ]
            ) {
                if (is_array($file['name'])) {
                    $returnFiles[$key] = [];

                    foreach ($file as $field => $value) {
                        $this->parseArrayFile($value, $field, $returnFiles[$key]);
                    }

                    $returnFiles[$key] = $this->convertNestedFile($returnFiles[$key]);

                    continue;
                }

                $returnFiles[$key] = new File(
                    $file['name'],
                    $file['tmp_name'],
                    $file['type'],
                    $file['error'],
                    $file['size']
                );
            }
        }

        return $returnFiles;
    }

    /**
     * Converts the nested arrays to file objects.
     *
     * @param array $file
     *
     * @return array|FileInterface
     */
    private function convertNestedFile(array $file): array | FileInterface
    {
        if (
            array_keys($file) == [
                'name',
                'type',
                'tmp_name',
                'error',
                'size'
            ]
        ) {
            return new File(
                $file['name'],
                $file['tmp_name'],
                $file['type'],
                $file['error'],
                $file['size']
            );
        }

        foreach ($file as $index => $value) {
            $file[$index] = $this->convertNestedFile($value);
        }

        return $file;
    }

    /**
     * Parses array file fields.
     *
     * @param array $files
     * @param string $field
     * @param array $filesResult
     *
     * @return void
     */
    private function parseArrayFile(
        array $files,
        string $field,
        array &$filesResult
    ): void {
        foreach ($files as $index => $file) {
            if (is_array($file)) {
                if (!isset($filesResult[$index])) {
                    $filesResult[$index] = [];
                }

                $this->parseArrayFile($file, $field, $filesResult[$index]);

                continue;
            }

            $filesResult[$index][$field] = $file;
        }
    }

    /**
     * Retrieves a list of available keys.
     *
     * @return string[]
     */
    public function getKeys(): array
    {
        return array_keys($this->files);
    }

    /**
     * Retrieves a list of uploaded files for a key.
     *
     * @param string $key
     *
     * @return FileInterface|array
     *
     * @throws FileNotFoundException When the file is not found.
     */
    public function getFile(string $key): FileInterface | array
    {
        if ($this->hasFile($key)) {
            return $this->files[$key];
        }

        throw new FileNotFoundException($key);
    }

    /**
     * Checks whether a file was uploaded for a key.
     *
     * @param string $key
     *
     * @return bool
     */
    public function hasFile(string $key): bool
    {
        return isset($this->files[$key]);
    }
}
