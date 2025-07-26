<?php

namespace App\Models;

use App\Traits\HasCustomMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;


class Property extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\PropertyFactory> */
    use HasFactory, HasCustomMedia;

    protected $guarded = [];


    public function buyRequests()
    {
        return $this->hasMany(BuyRequest::class);
    }

    public function sellRequest()
    {
        return $this->belongsTo(SellRequest::class);
    }
}
