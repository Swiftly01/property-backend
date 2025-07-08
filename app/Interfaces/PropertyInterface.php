<?php

namespace App\Interfaces;

use App\DataTransferObjects\PropertyDTO;

interface PropertyInterface
{
    public function store(PropertyDTO $dto);
}
