<?php

namespace App\DataTransferObjects;

use App\Enums\SellRequestStatusEnum;

readonly class SellRequestDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct
    (public readonly string $name,
     public readonly string $email,
     public readonly string $phone_number,
     public readonly ?string $location,
     public readonly string $address,
     public readonly string $description,
     public readonly string $property_type,
     public readonly ?string $status,
    )
    {
        
    }


    public static function fromRequest(array $validatedData): self{

        return new self(
            name: $validatedData['name'],
            email: $validatedData['email'],
            phone_number: $validatedData['phone_number'],
            location: $validatedData['location'] ?? null,
            address: $validatedData['address'],
            description: $validatedData['description'],
            property_type: $validatedData['property_type'],
            status: $validatedData['status'] ?? null,

        );
    }

    public function toArray(): array
    {
       return [
        'name' => $this->name,
        'email' => $this->email,
        'phone_number' => $this->phone_number,
        'location' => $this->location,
        'address' => $this->address,
        'description' => $this->description,
        'property_type' => $this->property_type,
        'status' => SellRequestStatusEnum::PENDING->value,
       ];
    }
}
