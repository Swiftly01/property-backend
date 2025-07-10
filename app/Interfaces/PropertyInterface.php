<?php

namespace App\Interfaces;

use App\DataTransferObjects\PropertyDTO;
use App\Models\Property;
use Illuminate\Pagination\LengthAwarePaginator;

interface PropertyInterface
{
    public function store(PropertyDTO $dto);

    public function update(PropertyDTO $dto, Property $property);

    public function getAllProperties(): LengthAwarePaginator;

    public function destroyThumbnail(Property $property): bool;
}
