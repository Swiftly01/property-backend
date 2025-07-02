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
                        <h1 class="font-bold text-lg">Contact InformationInformation</h1>
                        <p class="text-custom-blue-gray">ID: #PRPID1001</p>

                    </div>
                    <p class="font-medium">2024/01/20 - 2:00 PM</p>

                </div>
                <div class="border-b py-4">
                    <div>
                        <h1 class="font-medium text-2xl">Sarah Johnson </h1>
                        <p class="text-custom-blue-gray">Booking Date: <span class="font-medium text-darkest">2024/01/20 -
                                2:00 PM</span></p>

                    </div>
                </div>
                <div class="border-b py-7">
                    <h1 class="font-bold text-lg pb-2">Contact Information</h1>
                    <div class="flex gap-2 items-center">
                        <img class="w-5" src="{{ asset('assets/icons/sms.png') }}" alt="sms-image">
                        <span>john.doe@email.com</span>
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
        </div>

    </div>



    </div>
@endsection
