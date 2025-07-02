
@extends('layouts.admin')
@section('title')
    View :: Request
@endsection
@section('content')
    <div class="p-4 sm:p-6 lg:p-10">

        <x-page-header backRoute='properties.index' title="View Booking Details">
            <x-button variant="danger" target='delete-booking-modal'>
                Delete
            </x-button>
            <x-button variant="success" target='approve-booking-modal'  >
                Confirm Booking
            </x-button>

        </x-page-header>

        <x-alert-modal variant='delete' id="delete-booking-modal" title="booking"/>
        <x-alert-modal variant='approve' id="approve-booking-modal" title="booking"/>

 
        <div class="mt-5 lg:mt-10">
            <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] gap-5 items-start">
                <div class="bg-white px-10 py-14 rounded-lg">
                    <div class="flex items-center md:items-start justify-between border-b pb-4 flex-wrap">
                        <div>
                            <h1 class="font-bold text-lg">Booking Information</h1>
                            <p class="text-custom-blue-gray">ID: #PRPID1001</p>

                        </div>
                      <x-badge variant='pending'/>
                    
                    </div>
                    <div class="border-b py-4">
                        <div>
                            <h1 class="font-medium text-2xl">Sarah Johnson	</h1>
                            <p class="text-custom-blue-gray">Booking Date: <span class="font-medium text-darkest">2024/01/20 - 2:00 PM</span></p>

                        </div>
                    </div>
                    <div class="border-b py-7">
                        <h1 class="font-bold text-lg pb-2">Contact Information</h1>
                        <div class="flex gap-2 items-center">
                            <img class="w-5" src="{{ asset('assets/icons/sms.png') }}" alt="sms-image"> <span>john.doe@email.com</span>
                        </div>
                        <div class="flex gap-2 items-center">
                            <img src="{{ asset('assets/icons/call.png') }}" alt="call-image"> <span>(234) 801-234-5678</span>
                        </div>
                    </div>
                    <div class="border-b py-7">

                        <h1 class="font-bold text-lg">Description</h1>
                        <p class="text-custom-blue-gray">Discover your own piece of paradise with the Seaside Serenity Villa. T
                            With an open floor plan, breathtaking ocean views from every room, and direct access to a
                            pristine sandy beach, this property is the epitome of coastal living.</p>


                    </div>
                </div>


                <div class="bg-white p-7 rounded-lg">
                     <div class="flex items-center md:items-start justify-between border-b pb-4 flex-wrap">
                        <div>
                            <h1 class="font-bold text-lg">Property Information</h1>
                            <p class="text-custom-blue-gray">ID: #PRPID1001</p>

                        </div>
                          <x-badge variant='available'/>


                    </div>
                    <div class="flex items-center justify-between border-b py-4 flex-wrap">
                        <div>
                            <h1 class="font-bold text-lg">Modern Downtown Condo</h1>
                            <p class="text-custom-blue-gray">Downtown, NYC</p>

                        </div>
                        <span class="font-bold">$450,000</span>
                    </div>
                     <div class="border-b py-7">

                        <h1 class="font-bold text-lg">Description</h1>
                        <p class="text-custom-blue-gray">Discover your own piece of paradise with the Seaside Serenity Villa. T
                            With an open floor plan, breathtaking ocean views from every room, and direct access to a
                            pristine sandy beach, this property is the epitome of coastal living.</p>


                    </div>

                    <h1 class="font-bold py-5">Thumbnail</h1>
                     <x-image-preview  />
                </div>
            </div>



        </div>

    </div>

   

    </div>
@endsection
