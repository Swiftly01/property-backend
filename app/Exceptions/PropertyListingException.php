<?php

namespace App\Exceptions;

use Exception;

class PropertyListingException extends Exception
{
    public function __construct(string $message = "Property Listing failed", int $code = 0)
    {
        parent::__construct($message, $code);
    }
}
