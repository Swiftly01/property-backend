<?php

namespace App\Exceptions;

use Exception;

class PropertyMediaCreateException extends Exception
{
    public function __construct(string $message = "PropertyMedia creation failed", int $code = 0)
    {
        parent::__construct($message, $code);
        
    }
}
