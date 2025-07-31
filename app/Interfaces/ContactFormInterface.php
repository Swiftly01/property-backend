<?php

namespace App\Interfaces;

use App\DataTransferObjects\ContactDTO;
use Illuminate\Http\Request;

interface ContactFormInterface
{
    public function store(ContactDTO $dto);

    public function getContacts(Request $request);

    public function getTotalContactCount(): int;
}
