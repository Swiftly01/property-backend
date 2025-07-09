<?php

namespace App\Repositories;

use App\DataTransferObjects\PropertyDTO;
use App\Interfaces\PropertyInterface;
use App\Models\Property;
use Illuminate\Pagination\LengthAwarePaginator;

class PropertyRepository implements PropertyInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function store(PropertyDTO $dto) : Property
    {
        return Property::create($dto->toArray());
    }


    public function getAllProperties(): LengthAwarePaginator
    {
        return Property::paginate(3);
    }
}
