<?php

namespace App\Services;

use App\DataTransferObjects\PhotographDTO;
use App\Exceptions\MediaProcessingException;
use App\Exceptions\PhotographUpdateException;
use App\Helpers\AppHelper;
use App\Http\Requests\StorePhotographsRequest;
use App\Http\Requests\UpdatePhotographRequest;
use App\Interfaces\PhotographInterface;
use App\Models\Photograph;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class PhotographService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public PhotographInterface $photographInterface,
        public AppHelper $appHelper,
        private MediaService $mediaService
    ) {
        //
    }

    public function getPhotographs(?Request $request = null): LengthAwarePaginator
    {
        return $this->photographInterface->getPhotographs(request: $request);
    }

    public function handleCreatePhotograph(StorePhotographsRequest $request)
    {
        try {

            $dto = $this->mapRequestDataToDto(validatedData: $request->validated());

            return DB::transaction(function () use ($dto, $request) {

                $photographData = $this->photographInterface->store(dto: $dto);

                $this->mediaService->attachMedia(request: $request, model: $photographData);

                $this->processActivityEvent();

                return $photographData;
            });
        } catch (MediaProcessingException $e) {
            throw $e;
        } catch (PhotographUpdateException $e) {
            throw new PhotographUpdateException($e->getMessage());
        }
    }

    public function handleUpdatePhotograph(UpdatePhotographRequest $request, Photograph $photograph)
    {
        try {

            $dto = $this->mapRequestDataToDto(validatedData: $request->validated());

            return DB::transaction(function () use ($dto, $photograph, $request) {

                $photographData = $this->photographInterface->update(dto: $dto, photograph: $photograph);

                if ($request->hasFile('thumbnail') || $request->hasFile('other_images')) {
                    $this->mediaService->attachMedia(request: $request, model: $photographData);
                }

                return $photographData;
            });
        } catch (MediaProcessingException $e) {
            throw $e;
        } catch (Exception $e) {
            throw new PhotographUpdateException($e->getMessage());
        }
    }

    public function mapRequestDataToDto(array $validatedData): PhotographDTO
    {
        return PhotographDTO::fromRequest(validatedData: $validatedData);
    }

    public function processActivityEvent(): void
    {
        $this->appHelper->dispatchActivityEvent(
            type: 'Photograph listing',
            actionMessage: __('activity.photograph_listed'),

        );
    }

    public function handleDeletePhotograph(Photograph $photograph)
    {
         return $this->mediaService->destroy(model: $photograph);
    }
}
