<?php

namespace App\Traits;

use Spatie\MediaLibrary\Conversions\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait HasCustomMedia
{
    use InteractsWithMedia;

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('thumbnail')
            ->width(1060)
            ->height(706)
            ->sharpen(10)
            ->nonQueued();


        $this
            ->addMediaConversion('other_images')
            ->width(479)
            ->height(306)
            ->sharpen(10)
            ->nonQueued();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('thumbnail');
        $this->addMediaCollection('other_images');
    }


    public function imageUrl(string $collection = 'thumbnail',  string $conversion = '')
    {

        $media = $this->getFirstMedia($collection);

        if (!$media) {
            return null;
        }
        if ($conversion && $media->hasGeneratedConversion($conversion)) {
            return $media->getUrl($conversion);
        }

        return $media->getUrl();
    }


    public function getImages(string $collection = 'other_images', string $conversion = '')
    {
        $mediaItems = $this->getMedia($collection);

        if ($conversion) {

            return $mediaItems->map(function ($media) use ($conversion) {
                return $media->hasGeneratedConversion($conversion) ? $media->getUrl($conversion) : $media->getUrl();
            });
        }

        

        return $mediaItems;
    }
}
