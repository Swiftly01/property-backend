
@extends('layouts.admin')
@section('title')
    View :: Staging
@endsection
@section('content')
    <div class="p-4 sm:p-6 lg:p-10">

        <x-page-header backRoute='staging.index' title="View Staging Details">
            <x-button variant="danger" target="delete-staging-modal">
                Delete
            </x-button>
            <x-button href="{{ route('staging.index') }}">
                Edit Details
            </x-button>

        </x-page-header>

        <x-alert-modal variant='delete' id="delete-staging-modal" title="property" />


        <div class="mt-5 lg:mt-10">
            <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] gap-5 items-start">
                <div class="bg-white px-10 py-14 rounded-lg">
                    <div class=" border-b pb-4">
                        
                            <h1 class="font-bold text-lg">Staging Information</h1>
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
                      <h1 class="font-bold pt-5">Images</h1>
                    <div>
                         <div class="rounded-lg mt-5 grid grid-cols-3 gap-2 lg:gap-5">
                        <div class="w-full aspect-[1060/706] overflow-hidden rounded-lg">
                            <img src="{{ asset('assets/images/7342b3aa7bd3146d097b1420c47d7e81803faa4c (1).jpg') }}"
                                class="w-full h-full object-cover" />
                        </div>
                        <div class="w-full aspect-[1060/706] overflow-hidden rounded-lg">
                            <img src="{{ asset('assets/images/7342b3aa7bd3146d097b1420c47d7e81803faa4c (1).jpg') }}"
                                class="w-full h-full object-cover" />
                        </div>
                        <div class="w-full aspect-[1060/706] overflow-hidden rounded-lg">
                            <img src="{{ asset('assets/images/7342b3aa7bd3146d097b1420c47d7e81803faa4c.jpg') }}"
                                class="w-full h-full object-cover" />
                        </div>
                        <div class="w-full aspect-[1060/706] overflow-hidden rounded-lg">
                            <img src="{{ asset('assets/images/7342b3aa7bd3146d097b1420c47d7e81803faa4c.jpg') }}"
                                class="w-full h-full object-cover" />
                        </div>
                        <div class="w-full aspect-[1060/706] overflow-hidden rounded-lg">
                            <img src="{{ asset('assets/images/7342b3aa7bd3146d097b1420c47d7e81803faa4c.jpg') }}"
                                class="w-full h-full object-cover" />
                        </div>
                        <div class="w-full aspect-[1060/706] overflow-hidden rounded-lg">
                            <img src="{{ asset('assets/images/7342b3aa7bd3146d097b1420c47d7e81803faa4c.jpg') }}"
                                class="w-full h-full object-cover" />
                        </div>







                    </div>

                    </div>
                   
                </div>


                <div class="bg-white p-7 rounded-lg">
                    <h1 class="font-bold pb-5">Thumbnail</h1>

                   <x-image-preview  />
                </div>
            </div>



        </div>

    </div>

    </div>
@endsection
