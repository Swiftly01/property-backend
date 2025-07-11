<?php

namespace App\DataTransferObjects;

readonly class PropertyDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public readonly string $title,
        public readonly string $status,
        public readonly string $type,
        public readonly string $location,
        public readonly string $price,
        public readonly string $description

    ) {
        //
    }


    public static function fromRequest(array $validatedData): self
    {
        return new self(
            title: $validatedData['title'],
            status: $validatedData['status'],
            type: $validatedData['type'],
            location: $validatedData['location'],
            price: $validatedData['price'],
            description: $validatedData['description'],

        );
    }


    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'status' => $this->status,
            'location' => $this->location,
            'price' => $this->price,
            'description' => $this->description,
            'type' => $this->type


        ];
    }
}
