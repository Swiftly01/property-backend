@extends('layouts.admin')
@section('title')
    View :: Property
@endsection
@section('content')
    <div class="p-4 sm:p-6 lg:p-10">

        <x-page-header backRoute='properties.index' title="View Property Details">
            <x-button variant="danger" target="delete-property-{{ $property->id }}">
                Delete
            </x-button>
            <x-button href="{{ route('properties.index') }}">
                Edit Details
            </x-button>

        </x-page-header>

        <x-alert-modal variant='delete' id="delete-property-{{ $property->id }}" title="property" :action="route('properties.destroy', ['property' => $property->id])" method="DELETE" />


        <div class="mt-5 lg:mt-10">
            <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] gap-5 items-start">
                <div class="bg-white px-10 py-14 rounded-lg">
                    <div class="flex items-center md:items-start justify-between border-b pb-4 flex-wrap">
                        <div>
                            <h1 class="font-bold text-lg">Property Information</h1>
                            <p class="text-custom-blue-gray">ID: #PRPID{{ $property->id }}</p>

                        </div>
                        <x-badge :variant="$property->status" />
                    </div>
                    <div class="flex items-center justify-between border-b py-4 flex-wrap">
                        <div>
                            <h1 class="font-bold text-lg">Location</h1>
                            <p class="text-custom-blue-gray">{{ $property->location }}</p>

                        </div>
                        <span class="font-bold">&#8358;{{ number_format($property->price) }}</span>
                    </div>
                    <div class="border-b py-7">

                        <h1 class="font-bold text-lg">Description</h1>
                        <p class="text-custom-blue-gray">{{ $property->description }}</p>


                    </div>
                    <h1 class="font-bold pt-5">Images</h1>
                    <div>
                        <div class="rounded-lg mt-5 grid grid-cols-3 gap-2 lg:gap-5">
                            @forelse ($property->getImages('other_images') as $media)
                                <x-image-preview :src="$media->getUrl()" :name="$property->name" />

                            @empty
                                <p class="text-danger">No property image available yet!!</p>
                            @endforelse
                        </div>

                    </div>

                </div>


                <div class="bg-white p-7 rounded-lg">
                    <h1 class="font-bold pb-5">Thumbnail</h1>
                    <x-image-preview :src="$property->imageUrl()" :name="$property->name" />
                </div>
            </div>



        </div>

    </div>

    </div>
@endsection
