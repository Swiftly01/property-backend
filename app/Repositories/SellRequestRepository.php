<?php

namespace App\Repositories;

use App\DataTransferObjects\SellRequestDTO;
use App\Interfaces\SellRequestInterface;
use App\Models\SellRequest;

class SellRequestRepository implements SellRequestInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        
    }


    public function create(SellRequestDTO $dto)
    {
        return SellRequest::create($dto->toArray());
    }
}
