<?php

namespace App\Services;

use App\DataTransferObjects\SellRequestDTO;
use App\Events\ActivityLogged;
use App\Helpers\AppHelper;
use App\Interfaces\SellRequestInterface;
use App\Models\SellRequest;
use Exception;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class SellRequestService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public SellRequestInterface $sellRequestInterface,
        public AppHelper $appHelper
    ) {}


    public function processSellRequest(array $validatedData)
    {
        $dto = $this->mapRequestDataToDto(validatedData: $validatedData);

        $sellRequestData = $this->sellRequestInterface->create(dto: $dto);

        if (!$sellRequestData) {
            throw new Exception('Sell request data could not be saved');
        }

        $this->appHelper->dispatchActivityEvent(
            type: 'sell_request',
            actionMessage: __('activity.sell_request_submitted', ['name' => $sellRequestData->name])
        );
    }

    public function mapRequestDataToDto(array $validatedData): SellRequestDTO
    {
        return SellRequestDTO::fromRequest($validatedData);
    }

    public function getSellRequests(Request $request)
    {  
        return $this->sellRequestInterface->getSellRequests(request: $request);

    }

   
}
