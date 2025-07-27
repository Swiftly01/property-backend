<?php

namespace App\Exceptions;

use Exception;

class MediaProcessingException extends Exception
{
    public function __construct(string $message = "Media upload failed", int $code = 0)
    {
        parent::__construct($message, $code);
    }
}
