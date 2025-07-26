<?php

namespace App\Interfaces;

use App\DataTransferObjects\PhotographDTO;
use App\Models\Photograph;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface PhotographInterface
{
    public function store(PhotographDTO $dto): Photograph;

    public function getPhotographs(Request $request): LengthAwarePaginator;
}
