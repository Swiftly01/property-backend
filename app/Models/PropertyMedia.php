<?php

namespace App\Models;

use App\Traits\HasCustomMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;

class PropertyMedia extends Model implements HasMedia
{
    use HasCustomMedia;

    protected $guarded = [];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
