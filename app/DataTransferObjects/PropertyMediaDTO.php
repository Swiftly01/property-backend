<?php

namespace App\DataTransferObjects;

readonly class PropertyMediaDTO
{
    /**
     * Create a new class instance.
     */
     public function __construct(
        public string $title,
        public ?int $propertyId,
        public string $type,
        public string $location,
        public ?string $videoUrl,
        public string $description
    ) {
        //
    }


    public static function fromRequest(array $validatedData): self
    {
        return new self(
            title: $validatedData['title'],
            propertyId: $validatedData['property_id'] ?? null,
            type: $validatedData['type'],
            location: $validatedData['location'],
            videoUrl: $validatedData['video_url'] ?? null,
            description: $validatedData['description']
        );
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'property_id' => $this->propertyId,
            'type' => $this->type,
            'location' => $this->location,
            'video_url' => $this->videoUrl,
            'description' => $this->description
        ];
        
    }

}
