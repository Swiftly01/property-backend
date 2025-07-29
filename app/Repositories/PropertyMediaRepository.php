<?php

namespace App\Repositories;

use App\DataTransferObjects\PropertyMediaDTO;
use App\Enums\PropertyMediaTypeEnum;
use App\Interfaces\PropertyMediaInterface;
use App\Models\PropertyMedia;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PropertyMediaRepository implements PropertyMediaInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getMediaData(Request $request, string $type): LengthAwarePaginator
    {
        $data = $this->apply(PropertyMedia::query()->where('type', $type), $request)->paginate(6)->withQueryString();

        return $data;
    }

    public function store(PropertyMediaDTO $dto): PropertyMedia
    {

        return PropertyMedia::create($dto->toArray());
    }

    public function update(PropertyMediaDTO $dto, PropertyMedia $propertyMedia): PropertyMedia
    {
        $propertyMedia->fill($dto->toArray())->save();

        return $propertyMedia->refresh();
    }




    public function apply(Builder $query, Request $request): Builder
    {
        $search = $request->input('search');

        return $query->when($request->filled('search'), fn($q) => $this->search($q, $search));
    }

    private function search(Builder $query, string $terms): Builder
    {
        return $query->where(function ($q) use ($terms) {
            $q->where('title', 'like', "%{$terms}%")
                ->orWhere('location', 'like', "%{$terms}%")
                ->orWhere('description', 'like', "%{$terms}%");
        });
    }
}
