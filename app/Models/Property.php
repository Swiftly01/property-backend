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

    public function getFeaturesAttribute($value)
{
    // If it's already an array, implode
    if (is_array($value)) {
        return implode("\n", $value);
    }

    // If it's a JSON string, decode then implode
    if (is_string($value) && str_starts_with($value, '[')) {
        $decoded = json_decode($value, true);
        if (is_array($decoded)) {
            return implode("\n", $decoded);
        }
    }

    return $value; // fallback
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
