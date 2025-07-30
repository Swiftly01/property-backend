<?php

namespace App\Services;

use App\DataTransferObjects\ContactDTO;
use App\Http\Requests\StoreContactRequest;
use App\Interfaces\ContactFormInterface;
use App\Interfaces\ContactInterface;
use Illuminate\Http\Request;



class ContactService
{
    /**
     * Create a new class instance.
     */
    public function __construct(public ContactFormInterface $contactFormInterface)
    {
        
    }

    public function getContacts(Request $request): mixed
    {
        return $this->contactFormInterface->getContacts(request: $request);
    }

    public function handleStoreContact(StoreContactRequest $request)
    {
        $dto = $this->mapRequestDataToDto(validatedData: $request->validated());

         $this->contactFormInterface->store(dto: $dto);
    }


    public function mapRequestDataToDto(array $validatedData)
    {   
         return ContactDTO::fromRequest(validatedData: $validatedData);
    }

   
}
