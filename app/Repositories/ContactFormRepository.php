<?php

namespace App\Repositories;

use App\DataTransferObjects\ContactDTO;
use App\Enums\InquiryEnum;
use App\Interfaces\ContactFormInterface;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ContactFormRepository implements ContactFormInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function store(ContactDTO $dto) : Contact
    {
         return Contact::create($dto->toArray());
    }

    public function getTotalContactCount(): int
    {
        return Contact::count();
    }

    public function getContacts(Request $request)
    {
        return $this->apply(Contact::query(), $request)->latest()->paginate(6)->withQueryString();
    }

         public function apply(Builder $query, Request $request): Builder
    {
        $search = $request->input('search');
        $inquiry = $request->input('status');

        return $query->when($request->filled('search'), fn($q) => $this->search($q, $search))
            ->when($request->filled('status'), fn($q) => $this->status($q, $inquiry));
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

    private function status(Builder $query, string $inquiry): Builder
    {
        if (in_array($inquiry, InquiryEnum::values(), true)) {
            $query->where('inquiry_type', $inquiry);
        }


        return $query;
    }
}
