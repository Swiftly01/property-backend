<?php

namespace App\Interfaces;

use App\DataTransferObjects\SellRequestDTO;

interface SellRequestInterface
{
     public function create(SellRequestDTO $dto);
}
