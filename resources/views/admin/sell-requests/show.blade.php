@extends('layouts.admin')
@section('title')
    View :: Request
@endsection
@section('content')
    <div class="p-4 sm:p-6 lg:p-10">

        <x-page-header backRoute='properties.index' title="View Request Details">
            <x-button variant="danger" target='delete-request-modal'>
                Delete
            </x-button>
            <x-button variant="success" target='listing-request-modal'>
                List Property
            </x-button>

        </x-page-header>

        <x-alert-modal variant='delete' id="delete-request-modal" title="booking" />
        <x-alert-modal variant='approve' id="listing-request-modal" title="booking" />


        <div class="mt-5 lg:mt-10">
            <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] gap-5 items-start">
                <div class="bg-white px-10 py-7 rounded-lg">
                    <div class="border-b pb-5">
                        <h1 class="font-bold text-lg">Property Information</h1>
                    </div>
                    <div class="border-b py-7">
                        <h1 class="font-medium text-2xl">{{ Str::ucfirst($sellRequest->property_type) }}</h1>
                        <div class="flex justify-between flex-wrap">
                            <p>{{ $sellRequest->address }}, Nigeria</p>
                            {{-- <div class="flex gap-2"> <img src="{{ asset('assets/icons/building.svg') }}"
                alt="building-icon"><span>4-Bedroom</span></div>
            <div class="flex gap-2"> <img src="{{ asset('assets/icons/bathroom.svg') }}"
                alt="building-icon"><span>4-Bedroom</span></div> --}}
                        </div>
                    </div>
                    <div class="border-b py-7">
                        <h1 class="font-bold text-lg">Description</h1>
                        <p class="text-custom-blue-gray">{{ $sellRequest->description }}</p>

                    </div>

                    {{-- <div class="py-4">
          <h1 class="font-bold text-lg pb-5">Images</h1>
          <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            <div>
              <img src="{{ asset('assets/images/image-mini.png') }}"
                class="w-24 sm:w-32 md:w-40 lg:w-48 xl:w-56 h-auto rounded-md" alt="Property Image" alt="">
            </div>
            <div>
              <img src="{{ asset('assets/images/image-mini.png') }}"
                class="w-24 sm:w-32 md:w-40 lg:w-48 xl:w-56 h-auto rounded-md" alt="Property Image" alt="">
            </div>
            <div>
              <img src="{{ asset('assets/images/image-mini.png') }}"
                class="w-24 sm:w-32 md:w-40 lg:w-48 xl:w-56 h-auto rounded-md" alt="Property Image" alt="">
            </div>
            <div>
              <img src="{{ asset('assets/images/image-mini.png') }}"
                class="w-24 sm:w-32 md:w-40 lg:w-48 xl:w-56 h-auto rounded-md" alt="Property Image" alt="">
            </div>


          </div>


        </div> --}}
                </div>


                <div class="bg-white p-7 rounded-lg">
                    <div class=" border-b pb-4 ">
                        <div class="flex items-center md:items-start justify-between flex-wrap">
                            <h1 class="font-bold text-lg">Client Information</h1>
                            <x-badge :variant="\App\Enums\SellRequestStatusEnum::tryfrom($sellRequest->status)?->label()" />
                        </div>
                        <div class="flex justify-between">
                            <p class="text-custom-blue-gray">ID: #SRSID1001</p>
                            <p class="font-medium"> {{ $sellRequest->created_at->format('Y/m/d - H:i:s:A') }}</p>
                        </div>
                    </div>
                    <div class="border-b py-7">
                        <h1 class="font-bold text-lg">{{ Str::ucfirst($sellRequest->name) }}</h1>
                    </div>
                    <div class="border-b py-7">
                        <h1 class="font-bold text-lg pb-2">Contact Information</h1>
                        <div class="flex gap-2 items-center">
                            <img class="w-5" src="{{ asset('assets/icons/sms.png') }}" alt="sms-image">
                            <span>{{ Str::ucfirst($sellRequest->email) }}</span>
                        </div>
                        <div class="flex gap-2 items-center">
                            <img src="{{ asset('assets/icons/call.png') }}" alt="call-image"> <span>(234)
                                {{ $sellRequest->phone_number }}</span>
                        </div>
                    </div>

                </div>
            </div>



        </div>

    </div>



    </div>
@endsection
