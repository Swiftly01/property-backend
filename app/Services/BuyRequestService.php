<?php

namespace App\Services;

use App\DataTransferObjects\BuyRequestDTO;
use App\Events\BuyRequestStatusUpdated;
use App\Events\BuyRequestSubmitted;
use App\Helpers\AppHelper;
use App\Interfaces\BuyRequestInterface;
use App\Models\BuyRequest;
use Exception;
use Illuminate\Http\Request;

class BuyRequestService
{
    /**
     * Create a new class instance.
     */
    public function __construct(public BuyRequestInterface $buyRequestInterface, public AppHelper $appHelper)
    {
        //
    }

    public function handleStoreRequest(array $validatedData)
    {
        $dto = $this->mapRequestDataToDto(validatedData: $validatedData);

        $buyRequestData = $this->buyRequestInterface->store(dto: $dto);

        if (!$buyRequestData) {
            throw new Exception('Buy request data could not be saved');
        }

        $this->appHelper->dispatchActivityEvent(
            type: 'Buy request',
            actionMessage: __('activity.buy_request', ['name' => $buyRequestData->firstname])
        );

          $this->dispatchEvent(buyRequestData: $buyRequestData);

       
    }

    public function mapRequestDataToDto(array $validatedData): BuyRequestDTO
    {
        return BuyRequestDTO::fromRequest($validatedData);
    }

    public  function dispatchEvent(BuyRequest $buyRequestData)
    {
       event(new BuyRequestSubmitted($buyRequestData));
    }

    public function getAllRequests(Request $request)
    {
        return $this->buyRequestInterface->getAllRequests(request: $request);
    }

    public function handleStatusUpdate(BuyRequest $buyRequest, string $action)
    {
        $buyRequestData = $this->buyRequestInterface->update(buyRequest: $buyRequest, action: $action);

        if(!$buyRequestData){
             throw new Exception('Buy request status could not be updated');

        }

        $this->dispatchStatusNotification(buyRequestData: $buyRequestData);
    }


    public function dispatchStatusNotification(BuyRequest $buyRequestData)
    {
        event(new BuyRequestStatusUpdated($buyRequestData));
    }

}
