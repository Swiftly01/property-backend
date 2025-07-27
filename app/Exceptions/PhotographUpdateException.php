<?php

namespace App\Exceptions;

use Exception;

class PhotographUpdateException extends Exception
{
    public function __construct(string $message = "Unable to update photograph", int $code = 0,)
    {
        parent::__construct($message, $code);
    }
}
