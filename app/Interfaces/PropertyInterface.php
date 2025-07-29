<?php

namespace App\Interfaces;

use App\DataTransferObjects\PropertyDTO;
use App\Models\Property;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface PropertyInterface
{   
    public function getAllProperties(): Collection;

    public function getTotalProperties(): int;

    public function store(PropertyDTO $dto);

    public function getSellRequestData(Property $property): Property;

    public function update(PropertyDTO $dto, Property $property);

    public function getProperties(Request $request): LengthAwarePaginator;
    
    public function destroy(Property $property): bool;
}
