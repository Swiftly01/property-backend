<?php

namespace App\Repositories;

use App\DataTransferObjects\BuyRequestDTO;
use App\Enums\BuyRequestEnum;
use App\Interfaces\BuyRequestInterface;
use App\Models\BuyRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
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

    public function getTotalPendingBuyRequests(): int
    {
        return BuyRequest::where('status', BuyRequestEnum::PENDING->value)->count();
    }

    public function getRecentBuyRequests()
    {
        return BuyRequest::with('property')->latest()->take(5)->get()->map(fn($item) => $item->forceFill(['type' => 'buy']));
    }

    public function store(BuyRequestDTO $dto): BuyRequest
    {
        return BuyRequest::create($dto->toArray());
    }


    public function getAllRequests(Request $request): LengthAwarePaginator
    {
        return $this->apply(BuyRequest::with('property'), $request)->paginate(6)->withQueryString();
    }

    public function apply(Builder $query, Request $request): Builder
    {
        $search = $request->input('search');
        $status = $request->input('status');

        return $query->when($request->filled('search'), fn($q) => $this->search($q, $search))
            ->when($request->filled('status'), fn($q) => $this->status($q, $status));
    }

    private function search(Builder $query, string $terms): Builder
    {
        return  $query->where(function ($q) use ($terms) {
            $q->where('firstname', 'like', "%{$terms}%")
                ->orWhere('lastname', 'like', "%{$terms}%")
                ->orWhere('email', 'like', "%{$terms}%")
                ->orWhere('phone_number', 'like', "%{$terms}%")
                ->orWhere('message', 'like', "%{$terms}%");
        });
    }

    private function status(Builder $query, string $status): Builder
    {
        if (in_array($status, BuyRequestEnum::values(), true)) {
            $query->where('status', $status);
        }


        return $query;
    }

    public function update(BuyRequest $buyRequest, string $action): BuyRequest
    {
        $statusEnum = BuyRequestEnum::tryFrom($action);

        if (!$statusEnum) {
            throw new InvalidArgumentException("Invalid status action: {$action}");
        }

        $buyRequest->status = BuyRequestEnum::tryFrom($action);
        $buyRequest->save();

        $buyRequest->load('property');

        return $buyRequest->refresh();
    }
}
