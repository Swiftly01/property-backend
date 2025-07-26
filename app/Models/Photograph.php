<?php

namespace App\Models;

use App\Traits\HasCustomMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;

class Photograph extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\PhotographyFactory> */
    use HasFactory, HasCustomMedia;

    protected $guarded = [];
}
