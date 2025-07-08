<?php

namespace App\Services;

use App\DataTransferObjects\PropertyDTO;
use App\Helpers\AppHelper;
use App\Http\Requests\StorePropertyRequest;
use App\Interfaces\PropertyInterface;
use App\Models\Property;
use Exception;

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

    public function mapRequestDataToDto(array $validatedData)
    {
        return PropertyDTO::fromRequest($validatedData);
    }


    public function processFileUploads(StorePropertyRequest $request,  Property $property): void
    {
        if ($request->hasFile('thumbnail')) {
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
}
