<?php

namespace App\Repositories;

use App\DataTransferObjects\PhotographDTO;
use App\Interfaces\PhotographInterface;
use App\Models\Photograph;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PhotographRepository implements PhotographInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function store(PhotographDTO $dto): Photograph
    {
        return Photograph::create($dto->toArray());
    }

    public function getPhotographs(Request $request): LengthAwarePaginator
    {
        return $this->apply(Photograph::query(), $request)->paginate(10)->withQueryString();
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
