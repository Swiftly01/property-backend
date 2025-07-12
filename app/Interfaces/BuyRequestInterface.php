<?php

namespace App\Interfaces;

use App\DataTransferObjects\BuyRequestDTO;
use App\Models\BuyRequest;
use Illuminate\Pagination\LengthAwarePaginator;

interface BuyRequestInterface
{
    public function store(BuyRequestDTO $dto): BuyRequest;

    public function getAllRequests(): LengthAwarePaginator;

    public function update(BuyRequest $buyRequest, string $action): BuyRequest;
}
