<?php

namespace App\Services;

use App\DataTransferObjects\PropertyDTO;
use App\Events\PropertyListed;
use App\Exceptions\MediaProcessingException;
use App\Exceptions\PropertyListingException;
use App\Helpers\AppHelper;
use App\Helpers\RepositoryHelper;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Interfaces\PropertyInterface;
use App\Models\Property;
use App\Models\SellRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Throwable;

class PropertyService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public PropertyInterface $propertyInterface,
        public AppHelper $appHelper,
        public RepositoryHelper $repositoryHelper,
        public MediaService $mediaService
    ) {
        //
    }

    public function handleStoreProperty(StorePropertyRequest $request)
    {

        try {

            $dto = $this->mapRequestDataToDto(validatedData: $request->validated());

            $propertyData = DB::transaction(fn() => $this->createPropertyWithMedia(dto: $dto, request: $request));

            $this->processEventDispatch(property: $propertyData);
            
        } catch (MediaProcessingException $e) {
            throw $e;
        } catch (Throwable $e) {
            throw new PropertyListingException($e->getMessage());
        }
    }

    public function createPropertyWithMedia(PropertyDTO $dto, StorePropertyRequest $request): Property
    {
        $propertyData = $this->propertyInterface->store(dto: $dto);

        $this->handleSellRequestUpdate(request: $request);

        $this->mediaService->attachMedia(request: $request, model: $propertyData);

        $this->processActivityEvent();

        return $propertyData;
    }

    public function handleSellRequestUpdate(object $request): ?bool
    {
        if ($request->filled('sell_request_id')) {
            return  $this->repositoryHelper->updateSellRequestStatus(request: $request);
        }

        return null;
    }

    public function processActivityEvent(): void
    {
        $this->appHelper->dispatchActivityEvent(
            type: 'Property listing',
            actionMessage: __('activity.property_listing'),

        );
    }

    public function processEventDispatch(Property $property): void
    {
        $propertyData = $this->getSellRequestData(property: $property);

        if ($propertyData) {

            $this->dispatchEvent(propertyData: $propertyData);
        }
    }

    public function dispatchEvent(Property $propertyData): void
    {
        event(new PropertyListed($propertyData));
    }

    public function getSellRequestData(Property $property)
    {
        return $this->propertyInterface->getSellRequestData(property: $property);
    }

    public function handleUpdateProperty(UpdatePropertyRequest $request, Property $property): Property
    {
        try {
            $dto = $this->mapRequestDataToDto(validatedData: $request->validated());

            $propertyData = DB::transaction(fn() => $this->updatePropertyWithMedia(dto: $dto, request: $request, property: $property));

            return $propertyData;
        } catch (MediaProcessingException $e) {
            throw $e;
        } catch (Throwable $e) {
            throw new PropertyListingException(message: "Property update failed");
        }
    }

    public function updatePropertyWithMedia(PropertyDTO $dto, UpdatePropertyRequest $request, Property $property): Property
    {
        $propertyData = $this->propertyInterface->update(dto: $dto, property: $property);

        if ($request->hasFile('thumbnail') || $request->hasFile('other_images')) {

            $this->mediaService->attachMedia(request: $request, model: $propertyData);
        }

        return $propertyData;
    }

    public function mapRequestDataToDto(array $validatedData)
    {
        return PropertyDTO::fromRequest($validatedData);
    }



    public function getProperties(Request $request): LengthAwarePaginator
    {
        return $this->propertyInterface->getProperties(request: $request);
    }


    public function handlePropertyDelete(Property $property)
    {
        return $this->propertyInterface->destroy(property: $property);
    }

    public function getPendingSellRequests()
    {
        return $this->repositoryHelper->getPendingSellRequests();
    }

    public function mapStateToArray()
    {
        return $this->appHelper->mapStateToArray();
    }
}
