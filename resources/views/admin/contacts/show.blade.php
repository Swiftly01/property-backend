@extends('layouts.admin')
@section('title')
    View :: Contact
@endsection
@section('content')
    <div class="p-4 sm:p-6 lg:p-10">

        <x-page-header backRoute='contacts.index' title="View Contact Details">

        </x-page-header>

        <div class="mt-5 lg:mt-10">
            <div class="bg-white px-10 py-10 rounded-lg">
                <div class="flex items-center md:items-start justify-between border-b pb-4 flex-wrap">
                    <div>
                        <h1 class="font-bold text-lg">Contact Information</h1>
                        <p class="text-custom-blue-gray">ID: #PRPID{{ $contact->id }}</p>

                    </div>
                    <p class="font-medium">{{ $contact->created_at->format('Y/m/d - H:i:s A') }}</p>

                </div>
                <div class="border-b py-4">
                    <div>
                        <h1 class="font-medium text-2xl">{{ Str::ucfirst($contact->firstname) }} {{ Str::ucfirst($contact->lastname) }} </h1>
                        <p class="text-custom-blue-gray">Contact Date: <span class="font-medium text-darkest">{{ $contact->created_at->format('Y/m/d - H:i:s A') }}</span></p>

                    </div>
                </div>
                <div class="border-b py-7">
                    <h1 class="font-bold text-lg pb-2">Contact Information</h1>
                    <div class="flex gap-2 items-center">
                        <img class="w-5" src="{{ asset('assets/icons/sms.png') }}" alt="sms-image">
                        <span>{{ Str::ucfirst($contact->email) }}</span>
                    </div>
                    <div class="flex gap-2 items-center">
                        <img src="{{ asset('assets/icons/call.png') }}" alt="call-image"> <span>(234) {{ $contact->phone }}</span>
                    </div>
                </div>
                <div class="border-b py-7">

                    <h1 class="font-bold text-lg">Description</h1>
                    <p class="text-custom-blue-gray">{{ $contact->message }}</p>


                </div>
            </div>
        </div>

    </div>



    </div>
@endsection
