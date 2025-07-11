<?php

namespace App\Filters;

use App\Enums\PropertyStatusEnum;
use App\Enums\PropertyTypeEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PropertyFilter
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public  function apply(Builder $query, Request $request): Builder
    {
        $search = $request->input('search');
        $status = $request->input('status');
        $type = $request->input('property_type');
        $location = $request->input('location');

       // dd($status);

        return $query->when($request->filled('search'), fn($q) => $this->search($q, $search))
            ->when($request->filled('status'), fn($q) => $this->status($q, $status))
            ->when($request->filled('property_type'), fn($q) => $this->propertyType($q, $type))
            ->when($request->filled('location'), fn($q) =>  $q->where('location', $location));
    }


    private  function search(Builder $query, string $term): Builder
    {
        return   $query->where(function ($q) use ($term) {
            $q->where('title', 'like', "%{$term}%")
                ->orWhere('location', 'like', "%{$term}%")
                ->orWhere('price', 'like', "%{$term}%")
                ->orWhere('description', 'like', "%{$term}%");
        });
    }

    private function status(Builder $query, string $status): Builder
    {       
        if (in_array($status, PropertyStatusEnum::values(), true)) {
            $query->where('status', $status);
        }

        return $query;
    }

    private  function propertyType(Builder $query, string $type): Builder
    {

        if (in_array($type, PropertyTypeEnum::values(), true)) {
            $query->where('type', $type);
        }


        return $query;
    }
}
