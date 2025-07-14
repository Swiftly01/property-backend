<?php

namespace App\Repositories;

use App\DataTransferObjects\SellRequestDTO;
use App\Enums\SellRequestStatusEnum;
use App\Interfaces\SellRequestInterface;
use App\Models\SellRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class SellRequestRepository implements SellRequestInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct() {}

    public function getTotalPendingSellRequests(): int
    {
        return SellRequest::where('status', SellRequestStatusEnum::PENDING->value)->count();
    }

    public function getRecentSellRequests()
    {
        return SellRequest::with('property')->latest()->take(5)->get()->map(fn($item) => $item->forceFill(['type' => 'sell']));
    }

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


    public function getSellRequests(Request $request)
    {
        return $this->apply(SellRequest::query(), $request)->paginate(6)->withQueryString();
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
        return $query->where(function ($q) use ($terms) {
            $q->where('name', 'like', "%{$terms}%")
                ->orWhere('email', 'like', "%{$terms}%")
                ->orWhere('phone_number', 'like', "%{$terms}%")
                ->orWhere('location', 'like', "%{$terms}%")
                ->orWhere('address', 'like', "%{$terms}%")
                ->orWhere('description', 'like', "%{$terms}%");
        });
    }

    private function status(Builder $query, string $status): Builder
    {
        if (in_array($status, SellRequestStatusEnum::values(), true)) {
            $query->where('status', $status);
        }

        return $query;
    }




    public function getPendingSellRequests(): Collection
    {
        return SellRequest::where('status', SellRequestStatusEnum::PENDING->value)
            ->whereDoesntHave('property')
            ->get()
            ->map(function ($sellRequest) {
                return [
                    'value' => $sellRequest->id,
                    'label' => "{$sellRequest->name} ({$sellRequest->email})"
                ];
            });
    }
}
