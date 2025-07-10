<?php

namespace App\Services;

use App\DataTransferObjects\PropertyDTO;
use App\Helpers\AppHelper;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Interfaces\PropertyInterface;
use App\Models\Property;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;

class PropertyService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public PropertyInterface $propertyInterface,
        public AppHelper $appHelper,
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

        $this->processFileUploads(request: $request, property: $propertyData);

        $this->appHelper->dispatchActivityEvent(
            type: 'Property listing',
            actionMessage: __('activity.property_listing'),

        );
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



    public function getAllProperties(): LengthAwarePaginator
    {
        return $this->propertyInterface->getAllProperties();
    }


    public function handleDeleteThumbnail(Property $property)
    {
        return  $this->propertyInterface->destroyThumbnail(property: $property);
    }


    public function handlePropertyDelete(Property $property)
    {
       return $this->propertyInterface->destroy(property: $property);
    }
}
