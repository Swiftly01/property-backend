
@extends('layouts.admin')
@section('title')
    View :: Podcast
@endsection
@section('content')
    <div class="p-4 sm:p-6 lg:p-10">

        <x-page-header backRoute='podcasts.index' title="View Podcast Details">
            <x-button variant="danger" target="delete-podcast-modal">
                Delete
            </x-button>
            <x-button href="{{ route('podcasts.index') }}">
                Edit Details
            </x-button>

        </x-page-header>

        <x-alert-modal variant='delete' id="delete-podcast-modal" title="podcast" />


        <div class="mt-5 lg:mt-10">
            <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] gap-5 items-start">
                <div class="bg-white px-10 py-14 rounded-lg">
                    <div class=" border-b pb-4">
                        
                            <h1 class="font-bold text-lg">View Podcast Details</h1>
                            <p class="text-custom-blue-gray">ID: #PRPID1001</p>

                        
                    
                    </div>
                    <div class="flex items-start justify-between border-b py-4 flex-wrap">
                        <div>
                            <h1 class="font-bold text-lg">Modern Downtown Condo</h1>
                            <p class="text-custom-blue-gray">Downtown, NYC</p>

                        </div>
                        <div>
                          <span class="font-bold">Video Link</span>
                          <p>linktr.ee/jega_jnr?</p>

                        </div>
                        
                    </div>
                    <div class="border-b py-7">

                        <h1 class="font-bold text-lg">Description</h1>
                        <p class="text-custom-blue-gray">Discover your own piece of paradise with the Seaside Serenity Villa. T
                            With an open floor plan, breathtaking ocean views from every room, and direct access to a
                            pristine sandy beach, this property is the epitome of coastal living.</p>


                    </div>
                     
                   
                </div>


                <div class="bg-white px-7 py-6 rounded-lg">
                    <h1 class="font-bold pb-4">Thumbnail</h1>

                     <x-image-preview  />

                </div>
            </div>



        </div>

    </div>

    </div>
@endsection
