<?php

namespace App\Interfaces;

use App\DataTransferObjects\PropertyDTO;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface PropertyInterface
{
    public function store(PropertyDTO $dto);

    public function update(PropertyDTO $dto, Property $property);

    public function getProperties(Request $request): LengthAwarePaginator;

    public function destroyThumbnail(Property $property): bool;
    
    public function destroy(Property $property): bool;
}
