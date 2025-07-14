<?php

namespace App\Interfaces;

use App\DataTransferObjects\SellRequestDTO;
use App\Models\SellRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface SellRequestInterface
{  
     public function create(SellRequestDTO $dto);

     public function updateSellRequestStatus(object $request);

     public function getSellRequests(Request $request);

     public function getPendingSellRequests() : Collection;

     public function getTotalPendingSellRequests(): int;

     public function getRecentSellRequests();
}
