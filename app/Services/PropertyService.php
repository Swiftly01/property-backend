<?php

namespace App\Services;

use App\DataTransferObjects\PropertyDTO;
use App\Events\PropertyListed;
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

class PropertyService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public PropertyInterface $propertyInterface,
        public AppHelper $appHelper,
        public RepositoryHelper $repositoryHelper
    ) {
        //
    }

    public function handleStoreProperty(StorePropertyRequest $request)
    {
        $dto = $this->mapRequestDataToDto(validatedData: $request->validated());

        $propertyData = $this->propertyInterface->store(dto: $dto);

        if (!$propertyData) {
            throw new Exception('property data could not be saved');
        }

        $this->handleSellRequestUpdate(request: $request);

        $this->processFileUploads(request: $request, property: $propertyData);

        $this->processActivityEvent();

        $this->processEventDispatch(property:$propertyData);

        
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

    public function processEventDispatch(Property $property) : void
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
        return $this->propertyInterface->getSellRequestData(property:$property);
    }

    public function handleUpdateProperty(UpdatePropertyRequest $request, Property $property)
    {
        $dto = $this->mapRequestDataToDto(validatedData: $request->validated());

        $propertyData = $this->propertyInterface->update(dto: $dto, property: $property);

        if (!$propertyData) {
            throw new Exception('Property data could not be updated');
        }



        if ($request->hasFile('thumbnail') || $request->hasFile('other_images')) {
            
            $this->processFileUploads(request: $request, property: $propertyData);
        }
    }

    public function mapRequestDataToDto(array $validatedData)
    {
        return PropertyDTO::fromRequest($validatedData);
    }


    public function processFileUploads(object $request,  Property $property): void
    {
        if ($request->hasFile('thumbnail')) {
            $property->clearMediaCollection('thumbnail');
            $property->addMediaFromRequest('thumbnail')
                ->toMediaCollection('thumbnail');
        }

        if ($request->hasFile('other_images')) {
            $files = $request->file('other_images');
            $files = is_array($files) ? $files : [$files];


            foreach ($files as $file) {
                if ($file->isValid()) {
                    $property->addMedia($file)
                        ->toMediaCollection('other_images');
                }
            }
        }
    }



    public function getProperties(Request $request): LengthAwarePaginator
    {
        return $this->propertyInterface->getProperties(request: $request);
    }


    public function handleDeleteThumbnail(Property $property)
    {
        return  $this->propertyInterface->destroyThumbnail(property: $property);
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
