<?php

namespace App\DataTransferObjects;

readonly class PhotographDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public string $title,
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
            location: $validatedData['location'],
            videoUrl: $validatedData['video_url'] ?? null,
            description: $validatedData['description']
        );
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'location' => $this->location,
            'video_url' => $this->videoUrl,
            'description' => $this->description
        ];
        
    }
}
