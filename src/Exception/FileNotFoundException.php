<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Http\Exception;

use Exception;

class FileNotFoundException extends Exception
{
    /**
     * Constructor.
     *
     * @param string $file
     */
    public function __construct(string $file)
    {
        parent::__construct(
            sprintf('Could not find file with key: %s', $file)
        );
    }
}
