<?php

namespace App\Interfaces;

use App\DataTransferObjects\PropertyDTO;
use Illuminate\Pagination\LengthAwarePaginator;

interface PropertyInterface
{
    public function store(PropertyDTO $dto);

    public function getAllProperties(): LengthAwarePaginator;
}
