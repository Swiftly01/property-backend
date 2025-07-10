@extends('layouts.admin')
@section('title')
    Property
@endsection
@section('content')
    <div class="p-4 sm:p-6 lg:p-10">
        <div class="mt-16 md:mt-0 flex flex-wrap justify-between items-center">
            <h1 class=" md:text-2xl font-bold text-gray-900 ">Property Management</h1>

            <a class="flex    bg-[#022A66] text-white px-2 py-1  md:px-4 md:py-2 rounded hover:bg-primary hover:scale-[1.02] transition-duration-200 active:scale-100"
                href="{{ route('properties.create') }}">
                <img src="{{ asset('assets/icons/plus-icon.png') }}" alt="">
                <span class="sm:font-normal md:font-medium">Add Property</span>
            </a>

        </div>

        <div class="mt-5 lg:mt-14 bg-white rounded">
            <div class="flex flex-wrap justify-between items-center py-5 px-8">
                <h3 class="font-bold">All Property</h3>

                <form id="searchForm" action="{{ route('properties.index') }}" method="GET">
                    <div class="flex flex-wrap items-center gap-2 md:gap-4">

                        <!-- Search Input -->
                        <div class="relative">
                            <x-input-search id="searchInput" />


                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor"
                                class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </div>

                        <x-filter :options="\App\Enums\PropertyStatusEnum::cases()" name="status"  />



                    </div>
                </form>

            </div>

            <div class="relative overflow-x-auto py-5 px-8">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mb-5">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Property ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Property Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Location
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($properties as $property)
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    #PRPID{{ $loop->iteration }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ Str::ucfirst($property->title) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $property->location }}
                                </td>
                                <td class="px-6 py-4">
                                    &#8358;{{ number_format($property->price) }}
                                </td>
                                <td class="px-6 py-4">
                                    <x-badge :variant="$property->status" />

                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        $dropdownId = 'dropdown-' . $property->id;
                                    @endphp

                                    <button id="toggle-{{ $property->id }}" data-dropdown-toggle="{{ $dropdownId }}"
                                        class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                        type="button">
                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 4 15">
                                            <path
                                                d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                        </svg>
                                    </button>

                                    <!-- Dropdown menu -->
                                    <div id="{{ $dropdownId }}"
                                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="dropdownMenuIconButton">
                                            <li>
                                                <a href="{{ route('properties.show', ['property' => $property->id]) }}"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('properties.edit', ['property' => $property->id]) }}"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                            </li>
                                            <li>
                                                <x-button variant="link" target="delete-property-{{ $property->id }}">
                                                    <a href="#">Delete</a>
                                                </x-button>


                                            </li>
                                        </ul>

                                    </div>

                                </td>
                            </tr>
                            <x-alert-modal variant='delete' id="delete-property-{{ $property->id }}" title="property"
                                :action="route('properties.destroy', ['property' => $property->id])" method="DELETE" />
                        @endforeach


                    </tbody>
                </table>

                {{ $properties->links() }}


            </div>

        </div>

    </div>
@endsection
