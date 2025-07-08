<?php

namespace App\Repositories;

use App\DataTransferObjects\PropertyDTO;
use App\Interfaces\PropertyInterface;
use App\Models\Property;

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
}
