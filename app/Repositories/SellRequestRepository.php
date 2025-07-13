<?php

namespace App\Repositories;

use App\DataTransferObjects\SellRequestDTO;
use App\Enums\SellRequestStatusEnum;
use App\Interfaces\SellRequestInterface;
use App\Models\SellRequest;
use Illuminate\Support\Collection;

class SellRequestRepository implements SellRequestInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct() {}


    public function create(SellRequestDTO $dto)
    {
        return SellRequest::create($dto->toArray());
    }

     public function updateSellRequestStatus(object $request): ?bool
    {
       return SellRequest::where('id', $request->input('sell_request_id'))->update([
            'status' => SellRequestStatusEnum::APPROVED->value,
        ]);

    }


    public function getSellRequests()
    {
        return SellRequest::paginate(6);
    }

    public function getPendingSellRequests(): Collection
    {
        return SellRequest::where('status', SellRequestStatusEnum::PENDING->value)
            ->whereDoesntHave('property')
            ->get()
            ->map(function($sellRequest){
                return [
                    'value' => $sellRequest->id,
                    'label' => "{$sellRequest->name} ({$sellRequest->email})"
                ];

            });
    }
}
