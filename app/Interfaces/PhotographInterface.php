<?php

namespace App\Interfaces;

use App\DataTransferObjects\PhotographDTO;
use App\Models\Photograph;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface PhotographInterface
{
    public function getPhotographs(Request $request): LengthAwarePaginator;

    public function store(PhotographDTO $dto): Photograph;

    public function update(PhotographDTO $dto, Photograph $photograph): Photograph;

    
}
