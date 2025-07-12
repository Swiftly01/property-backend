<?php

namespace App\Repositories;

use App\DataTransferObjects\BuyRequestDTO;
use App\Enums\BuyRequestEnum;
use App\Interfaces\BuyRequestInterface;
use App\Models\BuyRequest;
use Illuminate\Pagination\LengthAwarePaginator;
use InvalidArgumentException;

class BuyRequestRepository implements BuyRequestInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function store(BuyRequestDTO $dto) :BuyRequest
    {
        return BuyRequest::create($dto->toArray());
    }


    public function getAllRequests(): LengthAwarePaginator
    {
        $query = BuyRequest::with('property');
         return $query->paginate(3);

    }

    public function update(BuyRequest $buyRequest, string $action): BuyRequest
    {    
         $statusEnum = BuyRequestEnum::tryFrom($action);

         if(!$statusEnum) {
            throw new InvalidArgumentException("Invalid status action: {$action}");
         }

         $buyRequest->status = BuyRequestEnum::tryFrom($action);
         $buyRequest->save();

         $buyRequest->load('property');

         return $buyRequest->refresh();
    }
}
