<?php

namespace App\Interfaces;

use App\DataTransferObjects\PropertyMediaDTO;
use App\Models\PropertyMedia;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

interface PropertyMediaInterface
{
    public function getMediaData(Request $request, string $type): LengthAwarePaginator;

    public function store(PropertyMediaDTO $dto): PropertyMedia;

    public function update(PropertyMediaDTO $dto, PropertyMedia $propertyMedia): PropertyMedia;
}
