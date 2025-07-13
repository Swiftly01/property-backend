<?php

namespace App\Interfaces;

use App\DataTransferObjects\SellRequestDTO;
use App\Models\SellRequest;
use Illuminate\Support\Collection;

interface SellRequestInterface
{  
     public function create(SellRequestDTO $dto);

     public function updateSellRequestStatus(object $request);

     public function getSellRequests();

     public function getPendingSellRequests() : Collection;
}
