<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class BuyRequest extends Model
{
    /** @use HasFactory<\Database\Factories\BuyRequestFactory> */
    use HasFactory, Notifiable;

    protected $guarded = [];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
