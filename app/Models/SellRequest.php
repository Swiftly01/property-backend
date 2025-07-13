<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SellRequest extends Model
{
    /** @use HasFactory<\Database\Factories\SellRequestFactory> */
    use HasFactory, Notifiable;

    protected  $guarded = [];

    public function property()
    {
        return $this->hasOne(Property::class);
    }
}
