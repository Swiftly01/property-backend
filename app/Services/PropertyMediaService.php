<?php

namespace App\Services;

use App\DataTransferObjects\PropertyMediaDTO;
use App\Enums\PropertyMediaTypeEnum;
use App\Exceptions\MediaProcessingException;
use App\Exceptions\PropertyMediaCreateException;
use App\Helpers\AppHelper;
use App\Helpers\RepositoryHelper;
use App\Http\Requests\StorePropertyMediaRequest;
use App\Http\Requests\UpdatePropertyMediaRequest;
use App\Interfaces\PropertyMediaInterface;
use App\Models\Property;
use App\Models\PropertyMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class PropertyMediaService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public PropertyMediaInterface $propertyMediaInterface,
        public AppHelper $appHelper,
        private RepositoryHelper $repositoryHelper,
        private MediaService $mediaService
    ) {
        //
    }

    public function getPropertyMediaData(Request $request, string $type)
    {
        return [
            'view' => $this->getMediaDataTypeFrontendView(type: $type),
            'data' => $this->getMediaDataType($request, $type),
            'type' => $type,

        ];
    }

    public function validatePropertyMediaType(Request $request, string $type)
    {
        return [
            'view' => $this->getMediaTypeIndexView($type),
            'data' => $this->getMediaDataType($request, $type),
            'type' => $type,

        ];
    }

    public function handleCreatePropertyMedia(StorePropertyMediaRequest $request, string $type)
    {
        try {

            $dto = $this->mapRequestDataToDto(validatedData: $request->validated());

            return DB::transaction(function () use ($dto, $request) {

                $propertyMediaData = $this->propertyMediaInterface->store(dto: $dto);

                $this->mediaService->attachMedia(request: $request, model: $propertyMediaData);

                $this->processActivityEvent(request: $request);

                return $propertyMediaData;
            });
        } catch (MediaProcessingException $e) {
            throw $e;
        } catch (PropertyMediaCreateException $e) {
            throw new PropertyMediaCreateException($e->getMessage());
        }
    }

    public function handlePropertyMediaUpdate(UpdatePropertyMediaRequest $request, PropertyMedia $propertyMedia, string $type)
    {
        try {

            $dto = $this->mapRequestDataToDto(validatedData: $request->validated());

            return DB::transaction(function () use ($dto, $propertyMedia, $request) {

                $propertyMediaData = $this->propertyMediaInterface->update(dto: $dto, propertyMedia: $propertyMedia);

                if ($request->hasFile('thumbnail') || $request->hasFile('other_images')) {
                    $this->mediaService->attachMedia(request: $request, model: $propertyMediaData);
                }

                return $propertyMediaData;
            });
        } catch (MediaProcessingException $e) {
            throw $e;
        } catch (PropertyMediaCreateException $e) {
            throw new ($e->getMessage());
        }
    }

    public function handleDeletePropertyMedia(PropertyMedia $propertyMedia)
    {
        return $this->mediaService->destroy(model: $propertyMedia);
    }



    public function mapRequestDataToDto(array $validatedData): PropertyMediaDTO
    {
        return PropertyMediaDTO::fromRequest(validatedData: $validatedData);
    }

    public function processActivityEvent(StorePropertyMediaRequest $request): void
    {
        $this->appHelper->dispatchActivityEvent(
            type: "$request->type listing",
            actionMessage: __('activity.photograph_listed'),

        );
    }


    public function getMediaTypeIndexView(string $type)
    {
        return match ($type) {
            PropertyMediaTypeEnum::PHOTOGRAPHY->value => 'admin.photographs.index',
            PropertyMediaTypeEnum::STAGING->value => 'admin.stagings.index',
            PropertyMediaTypeEnum::PODCAST->value => 'admin.podcasts.index',
            default => throw new InvalidArgumentException("Invalid property media type: {$type}"),
        };
    }

    public function getMediaTypeCreateView(string $type)
    {
        return match ($type) {
            PropertyMediaTypeEnum::PHOTOGRAPHY->value => 'admin.photographs.create',
            PropertyMediaTypeEnum::STAGING->value => 'admin.stagings.create',
            PropertyMediaTypeEnum::PODCAST->value => 'admin.podcasts.create',
            default => throw new InvalidArgumentException("Invalid property media type: {$type}"),
        };
    }

    public function  getMediaTypeShowView(string $type)
    {
        return match ($type) {
            PropertyMediaTypeEnum::PHOTOGRAPHY->value => 'admin.photographs.show',
            PropertyMediaTypeEnum::STAGING->value => 'admin.stagings.show',
            PropertyMediaTypeEnum::PODCAST->value => 'admin.podcasts.show',
            default => throw new InvalidArgumentException("Invalid property media type: {$type}"),
        };
    }

    public function getMediaTypeEditView(string $type)
    {
        return match ($type) {
            PropertyMediaTypeEnum::PHOTOGRAPHY->value => 'admin.photographs.edit',
            PropertyMediaTypeEnum::STAGING->value => 'admin.stagings.edit',
            PropertyMediaTypeEnum::PODCAST->value => 'admin.podcasts.edit',
            default => throw new InvalidArgumentException("Invalid property media type: {$type}"),
        };
    }


    public function getMediaDataTypeFrontendView(string $type)
    {
        return match ($type) {
            PropertyMediaTypeEnum::PHOTOGRAPHY->value => 'pages.photographs.index',
            PropertyMediaTypeEnum::STAGING->value => 'pages.stagings.index',
            PropertyMediaTypeEnum::PODCAST->value => 'pages.stagings.index',
            default => throw new InvalidArgumentException("Invalid property media type: {$type}"),
        };
    }

    public function getPropertyMediaDetailsView(string $type)
    {   
         return match ($type) {
            PropertyMediaTypeEnum::PHOTOGRAPHY->value => 'pages.photographs.show',
            PropertyMediaTypeEnum::STAGING->value => 'pages.stagings.index',
            PropertyMediaTypeEnum::PODCAST->value => 'pages.stagings.index',
            default => throw new InvalidArgumentException("Invalid property media type: {$type}"),
        };

    }


    public function getMediaDataType(Request $request, string $type)
    {
        return match ($type) {
            PropertyMediaTypeEnum::PHOTOGRAPHY->value => $this->propertyMediaInterface->getMediaData(request: $request, type: $type),
            PropertyMediaTypeEnum::STAGING->value => $this->propertyMediaInterface->getMediaData(request: $request, type: $type),
        };
    }

    public function getAllProperties(): Collection
    {
        $properties = $this->repositoryHelper->getAllProperties();

        return   $properties->map(function ($property) {
            return  [
                'value' => $property->id,
                'label' => $property->title
            ];
        });
    }
}
