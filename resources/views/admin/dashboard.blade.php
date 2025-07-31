@extends('layouts.admin')
@section('title')
Dashboard
@endsection
@section('content')
<div class="p-4 sm:p-6 lg:p-10">
    <div class="mt-12 md:mt-0">
        <h1 class=" md:text-2xl font-bold text-gray-900">Dashboard Overview</h1>
    </div>

    <div class="grid  md:grid-cols-2 lg:grid-cols-4 gap-5 lg:gap-10 my-2  md:my-5 lg:my-6">
        <div class="bg-white p-4  rounded-md shadow-sm hover:shadow-md transition cursor-pointer">

            <img src="{{ asset('assets/icons/home-icon.png') }}" alt="">
            <div class="pt-8">
                <h6 class="text-[#B5B5C3]">Total properties</h6>
                <h1 class="text-2xl font-bold">{{ str_pad($propertyCount, 2, '0', STR_PAD_LEFT) }}</h1>
            </div>

        </div>
        <div class="bg-white p-4 rounded-md shadow-sm hover:shadow-md transition cursor-pointer">
            <img src="{{ asset('assets/icons/user.png') }}" alt="">
            <div class="pt-8">
                <h6 class="text-[#B5B5C3]">Total Contacts</h6>
                <h1 class="text-2xl font-bold">{{ str_pad($contactCount, 2, '0', STR_PAD_LEFT) }}</h1>
            </div>

        </div>
        <div class="bg-white p-4 rounded-md shadow-sm hover:shadow-md transition cursor-pointer">
            <img src="{{ asset('assets/icons/folder-open-1.png') }}" alt="">
            <div class="pt-8">
                <h6 class="text-[#B5B5C3]">Pending sell request</h6>
                <h1 class="text-2xl font-bold">{{ str_pad($pendingSellRequestsCount, 2, '0', STR_PAD_LEFT) }}</h1>
            </div>

        </div>
        <div class="bg-white p-4 rounded-md shadow-sm hover:shadow-md transition cursor-pointer">
            <img src="{{ asset('assets/icons/folder-open.png') }}" alt="">
            <div class="pt-8">
                <h6 class="text-[#B5B5C3]">Pending booking request</h6>
                <h1 class="text-2xl font-bold">{{ str_pad($pendingBuyRequestsCount, 2, '0', STR_PAD_LEFT) }}</h1>
            </div>

        </div>


    </div>


    <div class="grid  grid-cols-1 lg:grid-cols-[2fr_1fr] mt-4  md:mt-0 gap-10 items-start">
        <div class="bg-white p-4 rounded-lg">
            <div class=" flex justify-between border-b pb-4">
                <h4 class="font-bold">Recent Request</h4>
                <a href="" class="flex items-center">View All <img src="{{ asset('assets/icons/arrow-right.png') }}"
                        alt="arrow-pointing to the right"></a>
            </div>

            <div class="mt-5">
                @forelse ($recentRequests as $request)
                <div class="sm:flex sm:justify-between items-center my-3 bg-secondary py-2 px-3 rounded-md">
                    <div class="flex gap-3">
                        @php
                        $image = match ($request->type) {
                        'sell' => $request?->property?->imageUrl() ?? 'assets/images/sell-request-default.png',
                        'buy' => $request?->property?->imageUrl() ?? 'assets/images/buy-request-default.png',
                        default => 'assets/images/buy-request-default.png',
                        }
                        @endphp
                        <img class="h-20 w-52 rounded-lg" src="{{ asset($image) }}" alt="image-property">
                        <div>
                            <p class="font-bold truncate">{{ $request->property->title ?? 'Untitled' }}</p>
                            <div class="flex items-center">
                                <img src="{{ asset('assets/icons/map-point.png') }}" alt="">
                                <p class="text-sm"> {{ $request->property->location ?? 'N/A' }}, Nigeria</p>
                            </div>



                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        @php
                        $type = match ($request->type) {
                        'sell' => 'sell_request',
                        'buy' => 'buy_request',
                        default => '',
                        };

                        $variant = match ($request->type) {
                        'sell' => 'bg-green-100',
                        'buy' => 'bg-blue-100',
                        };
                        @endphp
                        <span
                            class="text-xs px-2 py-1 rounded {{$variant}} text-{{ $request->type === 'sell' ? 'green' : 'white' }}-800">
                            {{ ucfirst($request->type) }} Request
                        </span>



                        <a href="{{ route($request->type === 'sell' ? 'sell-requests.show' : 'buy-requests.show', [$type => $request->id]) }}"
                            class="text-sm block mt-2 sm:mt-0 bg-primary text-white  px-1 py-1 text-center sm:py-2 sm:px-3 rounded-md hover:bg-primary-hover hover:shadow-md hover:scale-[1.02] transition-duration-200 active:scale-95">View
                            Details</a>



                    </div>

                </div>

                @empty
                <p>No Recent Requets yet!!</p>
                @endforelse
            </div>
        </div>

        <div>
            <div class="bg-white p-5 rounded-lg">
                <h1 class="font-bold border-b border-secondary pb-4">Quick Actions</h1>
                <div class="grid grid-cols-2 gap-5  mt-5">
                    <a href="{{ route('properties.create') }}"
                        class="bg-[#CDE4FF] rounded-lg text-center py-8  hover:shadow-md hover:scale-[1.02] transition duration-200">
                        <img class="block mx-auto" src="{{ asset('assets/icons/plus.png') }}" alt="">
                        <p>Add property</p>
                    </a>
                    <a href="{{ route('stagings.create') }}"
                        class="bg-[#EEDCFF] rounded-lg text-center  py-8  hover:shadow-md hover:scale-[1.02] transition duration-200">
                        <img class="block mx-auto" src="{{ asset('assets/icons/staging-icon.png') }}" alt="">
                        <p>Add Staging</p>
                    </a>
                    <a href="{{ route('photographs.create') }}"
                        class="bg-[#E1FFE8] rounded-lg text-center  py-8  hover:shadow-md hover:scale-[1.02] transition duration-200">
                        <img class="block mx-auto" src="{{ asset('assets/icons/photo-icon.png') }}" alt="">
                        <p>Add Photography</p>
                    </a>
                    <a href="{{ route('buy-requests.index') }}"
                        class="bg-[#FFE4D1] rounded-lg text-center  py-8  hover:shadow-md hover:scale-[1.02] transition duration-200">
                        <img class="block mx-auto" src="{{ asset('assets/icons/request-icon.png') }}" alt="">
                        <p>Buy request</p>
                    </a>
                </div>
            </div>
            <div class="bg-white p-5 rounded-lg my-5">
                <h1 class="font-bold border-b border-secondary pb-4">Recent Activity</h1>

                @forelse ($activityLogs as $activity)

                <div class="flex justify-between items-center py-4 border-b border-secondary">

                    @php
                    $route = match ($activity->type) {
                    'sell_request' => route('sell-requests.index'),
                    'buy_request' => route('buy-requests.index'),
                    'property' => route('properties.index'),
                    default => '#',
                    }
                    @endphp

                    <div class="flex items-start gap-2">
                        <img src="{{ asset('assets/icons/Home-add.png') }}" alt="">
                        <div>
                            <p class="font-semibold">{{ $activity->action }}</p>
                            <p class="text-gray-400">{{ $activity->created_at->diffForHumans()}}</p>
                        </div>

                    </div>
                    <a href="{{ $route }}"><img src="{{ asset('assets/icons/frame-arrow.png') }}" alt=""></a>
                </div>

                @empty
                <p>No Activity Yet!!</p>

                @endforelse

                {{-- <div class="flex justify-between items-center py-4 border-b border-secondary">

                    <div class="flex items-start gap-2">
                        <img src="{{ asset('assets/icons/Home-add.png') }}" alt="">
                        <div>
                            <p class="font-semibold">New property listed by Sub Admin</p>
                            <p class="text-gray-400">5 mins ago</p>
                        </div>

                    </div>
                    <a href=""><img src="{{ asset('assets/icons/frame-arrow.png') }}" alt=""></a>
                </div> --}}



            </div>
        </div>
    </div>

</div>
@endsection