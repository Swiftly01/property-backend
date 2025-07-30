<?php

namespace App\DataTransferObjects;

readonly class ContactDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public string $firstname,
        public string $lastname,
        public string $email,
        public string $phoneNumber,
        public string $inquiryType,
        public string $message,
        public bool $terms
    ) {}

    public static function fromRequest(array $validatedData): self
    {
        return new self(
            firstname: $validatedData['firstname'],
            lastname: $validatedData['lastname'],
            email: $validatedData['email'],
            phoneNumber: $validatedData['phone_number'],
            inquiryType: $validatedData['inquiry_type'],
            message: $validatedData['message'],
            terms: $validatedData['terms']

        );
    }


    public function toArray(): array
    {
        return [
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone_number' => $this->phoneNumber,
            'inquiry_type' => $this->inquiryType,
            'message' => $this->message,
            'terms' => $this->terms,

        ];
    }
}
