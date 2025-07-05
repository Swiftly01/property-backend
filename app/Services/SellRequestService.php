<?php

namespace App\Services;

use App\DataTransferObjects\SellRequestDTO;
use App\Events\ActivityLogged;
use App\Interfaces\SellRequestInterface;
use App\Models\SellRequest;
use Exception;
use Illuminate\Contracts\Support\ValidatedData;

class SellRequestService
{
    /**
     * Create a new class instance.
     */
    public function __construct(public SellRequestInterface $sellRequestInterface)
    {
        
    }


    public function processSellRequest(array $validatedData)
    { 
       $dto = $this->mapRequestDataToDto(validatedData: $validatedData);

       $sellRequestData = $this->sellRequestInterface->create(dto: $dto);

       if(!$sellRequestData) {
        throw new Exception('Sell request data could not be saved');
       }

       $this->dispatchActivityEvent(sellRequestData: $sellRequestData);

    }

    public function mapRequestDataToDto(array $validatedData): SellRequestDTO
    {
        return SellRequestDTO::fromRequest($validatedData);

    }


    public function dispatchActivityEvent(SellRequest $sellRequestData)
    {
        event(new ActivityLogged(
            action: __('activity.sell_request_submitted', ['name' => $sellRequestData->name ?? 'System']),
            type: 'sell_request',
            performedBy: auth()->user()?->name ?? 'System',
        ));
    }
}
