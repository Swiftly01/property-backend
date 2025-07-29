
@extends('layouts.admin')
@section('title')
    Staging
@endsection
@section('content')

    @php
        $stagings = $type === \App\Enums\PropertyMediaTypeEnum::STAGING->value  ? $data : [];

    @endphp
    <div class="p-4 sm:p-6 lg:p-10">

        <div class="flex flex-wrap items-center justify-between mt-16 md:mt-0">
            <h1 class="font-bold text-gray-900 md:text-2xl">All Staging</h1>

            <a class="flex    bg-[#022A66] text-white px-2 py-1  md:px-4 md:py-2 rounded hover:bg-primary hover:scale-[1.02] transition-duration-200 active:scale-100"
                href="{{ route('stagings.create') }}">
                <img src="{{ asset('assets/icons/plus-icon.png') }}" alt="">
                <span class="sm:font-normal md:font-medium">Add Staging</span>
            </a>

        </div>

        <div class="mt-5 bg-white rounded lg:mt-14">
            <div class="flex flex-wrap items-center justify-between px-8 py-5">
                <h3 class="font-bold">All Staging</h3>

                <form id="searchForm" action="{{ route('stagings.index') }}" method="GET">
                    <div class="flex flex-wrap items-center gap-2 md:gap-4">

                        <!-- Search Input -->
                        <div class="relative">
                            <x-input-search id="searchInput" />

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor"
                                class="absolute w-5 h-5 text-gray-400 transform -translate-y-1/2 pointer-events-none left-3 top-1/2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </div>

                        <x-filter :options="[]" name="status" />

                    </div>
                </form>

            </div>

            <div class="relative px-8 py-5 overflow-x-auto">
                <table class="w-full mb-5 text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Staging ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Property Title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Location
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Date Created
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stagings as $staging)
                            <tr
                                class="border-b border-gray-200 odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    #STGID{{ $loop->iteration }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ Str::of(optional($staging?->property)->title ?? 'No property linked')->ucfirst() }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $staging->location }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $staging->created_at->format('Y/m/d - H:i:s:A') }}
                                </td>

                                <td class="px-6 py-4">
                                    @php
                                        $dropdownId = 'dropdown-' . $staging->id;
                                    @endphp

                                    <button id="toggle-{{ $staging->id }}" data-dropdown-toggle="{{ $dropdownId }}"
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
                                                <a href="{{ route('stagings.show', ['staging' => $staging->id]) }}"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('stagings.edit', ['staging' => $staging->id]) }}"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                            </li>
                                            <li>
                                                <x-button variant="link" target="delete-staging-{{ $staging->id }}">
                                                    <a href="#">Delete</a>
                                                </x-button>


                                            </li>
                                        </ul>

                                    </div>

                                </td>
                            </tr>
                            <x-alert-modal variant='delete' id="delete-staging-{{ $staging->id }}" title="Photograph"
                                :action="route('stagings.destroy', ['staging' => $staging->id])" method="DELETE" />
                        @endforeach


                    </tbody>
                </table>

                {{ $stagings->links() }}
            </div>

        </div>

    </div>
@endsection
