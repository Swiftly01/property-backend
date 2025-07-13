<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Property extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\PropertyFactory> */
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = [];

    public function registerMediaConversions(?Media $media = null): void
    {
        /* $this
            ->addMediaConversion('thumbnail')
            ->sharpen(10)
            ->width(400)
            ->nonQueued();


        $this
            ->addMediaConversion('other_images')
            ->width(800)
            ->height(600)
            ->sharpen(10)
            ->nonQueued();

       */
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


    public function getImages(string $collection = 'other_images')
    {
        return $this->getMedia($collection);
    }

    public function buyRequests()
    {
        return $this->hasMany(BuyRequest::class);
    }

    public function sellRequest()
    {
        return $this->belongsTo(SellRequest::class);
    }
}
