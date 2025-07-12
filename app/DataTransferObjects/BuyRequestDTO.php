<?php

namespace App\DataTransferObjects;

readonly class BuyRequestDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct
    (public int $propertyId,
     public string $firstname,
     public string $lastname,
     public string $email,
     public string $phoneNumber,
     public ?string $message,
     public bool $terms,


    )
    {
        
    }
 

    public static function fromRequest(array $validatedData): self
    {
       return new self(
        propertyId: $validatedData['property_id'],
        firstname: $validatedData['firstname'],
        lastname: $validatedData['lastname'],
        email: $validatedData['email'],
        phoneNumber: $validatedData['phone_number'],
        message: $validatedData['message'] ?? null,
        terms: $validatedData['terms'],


       );
    }


    public function toArray(): array
    {
        return [
            'property_id' => $this->propertyId,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone_number' => $this->phoneNumber,
            'message' => $this->message,
            'terms' => $this->terms,
        ];  
    }
}
