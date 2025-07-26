<?php

namespace App\Services;

use App\DataTransferObjects\PhotographDTO;
use App\Helpers\AppHelper;
use App\Http\Requests\StorePhotographsRequest;
use App\Interfaces\PhotographInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PhotographService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public PhotographInterface $photographInterface,
        public AppHelper $appHelper
    ) {
        //
    }

    public function getPhotographs(Request $request) : LengthAwarePaginator
    {
        return $this->photographInterface->getPhotographs(request: $request);
    }

    public function handlePhotographUploads(StorePhotographsRequest $request) : void
    {
        $dto = $this->mapRequestDataToDto(validatedData: $request->validated());

        $photographData = $this->photographInterface->store(dto: $dto);

        if (!$photographData) {
            throw new Exception(message: "Photograph data could not be saved");
        }

        $this->appHelper->processFileUploads(request: $request, model: $photographData);

        $this->processActivityEvent();
    }

    public function mapRequestDataToDto(array $validatedData): PhotographDTO
    {
        return PhotographDTO::fromRequest(validatedData: $validatedData);
    }

    public function processActivityEvent() : void
    {
        $this->appHelper->dispatchActivityEvent(
            type: 'Photograph listing',
            actionMessage: __('activity.photograph_listed'),

        );
    }
}
