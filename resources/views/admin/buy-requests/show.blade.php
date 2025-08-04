@extends('layouts.admin')
@section('title')
View :: Request
@endsection
@section('content')
<div class="p-4 sm:p-6 lg:p-10">

    <x-page-header backRoute='properties.index' title="View Booking Details">

        <x-button variant="danger" target='decline-buy-request-{{ $buyRequest->id }}'>
            Decline
        </x-button>
        @if ($buyRequest->status === \App\Enums\BuyRequestEnum::DECLINED->value || $buyRequest->status ===
        \App\Enums\BuyRequestEnum::PENDING->value )
        <x-button variant="success" target='approve-buy-request-{{ $buyRequest->id }}'>
            Confirm Booking
        </x-button>
        @endif

    </x-page-header>

    <x-alert-modal variant='decline' id="decline-buy-request-{{ $buyRequest->id }}" title="booking" :action="route('buy-requests.update-status', [
            'buy_request' => $buyRequest->id,
            'action' => \App\Enums\BuyRequestEnum::DECLINED->value,
        ])" method="PATCH" />

    <x-alert-modal variant='approve' id="approve-buy-request-{{ $buyRequest->id }}" title="booking" :action="route('buy-requests.update-status', [
            'buy_request' => $buyRequest->id,
            'action' => \App\Enums\BuyRequestEnum::CONFIRMED->value,
        ])" method="PATCH" />


    <div class="mt-5 lg:mt-10">
        <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] gap-5 items-start">
            <div class="bg-white px-10 py-14 rounded-lg">
                <div class="flex items-center md:items-start justify-between border-b pb-4 flex-wrap">
                    <div>
                        <h1 class="font-bold text-lg">Booking Information</h1>
                        <p class="text-custom-blue-gray">ID: #BKGID{{ $buyRequest->id }}</p>

                    </div>
                    <x-badge :variant="$buyRequest->status" />

                </div>
                <div class="border-b py-4">
                    <div>
                        <h1 class="font-medium text-2xl">{{ Str::ucfirst($buyRequest->firstname) }}
                            {{ Str::ucfirst($buyRequest->lastname) }}</h1>
                        <p class="text-custom-blue-gray">Booking Date: <span class="font-medium text-darkest">
                                {{ $buyRequest->created_at->format('Y/m/d - H:i:s:A') }}</span></p>

                    </div>
                </div>
                <div class="border-b py-7">
                    <h1 class="font-bold text-lg pb-2">Contact Information</h1>
                    <div class="flex gap-2 items-center">
                        <img class="w-5" src="{{ asset('assets/icons/sms.png') }}" alt="sms-image">
                        <span>{{ Str::ucfirst($buyRequest->email) }}</span>
                    </div>
                    <div class="flex gap-2 items-center">
                        <img src="{{ asset('assets/icons/call.png') }}" alt="call-image"> <span>(234)
                            {{ $buyRequest->phone_number }}</span>
                    </div>
                </div>
                <div class="border-b py-7">

                    <h1 class="font-bold text-lg">Description</h1>
                    <p class="text-custom-blue-gray">{{ $buyRequest->message ?? $buyRequest->property?->description ??
                        'No description available' }}
                    </p>


                </div>
            </div>


            <div class="bg-white p-7 rounded-lg">
                <div class="flex items-center md:items-start justify-between border-b pb-4 flex-wrap">
                    <div>
                        <h1 class="font-bold text-lg">Property Information</h1>
                        <p class="text-custom-blue-gray">ID: #PRPID{{ $buyRequest->property?->id ?? 'N/A' }}</p>

                    </div>
                    @php
                    $status = optional($buyRequest->property)->status;
                    @endphp
                    @if($status)
                    <x-badge :variant="$status" />
                    @endif



                </div>
                @if($status)
                <div class="flex items-center justify-between border-b py-4 flex-wrap">
                    <div>
                        <h1 class="font-bold text-lg">Location</h1>
                        <p class="text-custom-blue-gray">{{ $buyRequest->property->location }}, Nigeria</p>

                    </div>
                    <span class="font-bold"> &#8358;{{ number_format($buyRequest->property->price) }}</span>
                </div>
                <div class="border-b py-7">

                    <h1 class="font-bold text-lg">Description</h1>
                    <p class="text-custom-blue-gray">{{ $buyRequest->property->description }}</p>


                </div>

                <h1 class="font-bold py-5">Thumbnail</h1>
                <x-image-preview :src="$buyRequest->property->imageUrl()" :name="$buyRequest->property->name" />
                @endif
            </div>
        </div>



    </div>

</div>



</div>
@endsection