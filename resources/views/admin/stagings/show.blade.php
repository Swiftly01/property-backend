
@extends('layouts.admin')
@section('title')
View :: Staging
@endsection
@section('content')
<div class="p-4 sm:p-6 lg:p-10">

    
     @php
         $staging = $type === \App\Enums\PropertyMediaTypeEnum::STAGING->value  ? $propertyMedia : ""
     @endphp
    <x-page-header backRoute='stagings.index' title="View staging Details">
            <x-button variant="danger" target="delete-staging-{{ $staging->id }}">
                Delete
            </x-button>
            <x-button 
             href="{{ route('stagings.edit', ['staging' => $staging->id]) }}" 
            >
                Edit Details
            </x-button>

    </x-page-header>

     <x-alert-modal variant='delete' id="delete-staging-{{ $staging->id }}" title="staging" 
        :action="route('stagings.destroy', ['staging' => $staging->id])" 
        
        method="DELETE" />


    <div class="mt-5 lg:mt-10">
        <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] gap-5 items-start">
            <div class="px-10 py-10 bg-white rounded-lg">
                    <div class="pb-4 border-b f md:items-start">
                        <h1 class="text-lg font-bold">staging Information</h1>
                        <p class="text-custom-blue-gray">ID: #PHYID{{ $staging->id }}</p>

                    </div>
                    
                
                <div class="flex flex-wrap items-center justify-between py-4 border-b">
                    <div>
                        <h1 class="text-lg font-bold">{{ Str::ucfirst($staging->title) }}</h1>
                        <p class="text-custom-blue-gray">{{ $staging->location }}, Nigeria</p>

                    </div>
                    <div>
                         <h1 class="text-lg font-bold">Video Link</h1>
                         <a href="{{ $staging->video_url }}">{{ $staging->video_url ?? 'N/A' }}</a>
                        
                    </div>
                   
                </div>
                <div class="border-b py-7">

                    <h1 class="text-lg font-bold">Description</h1>
                    <p class="text-custom-blue-gray">{{ $staging->description }}</p>


                </div>
                <h1 class="pt-5 font-bold">Images</h1>
                <div>
                    
                    <div class="grid grid-cols-3 gap-2 mt-5 rounded-lg lg:gap-5">
                            @forelse ($staging->getImages('other_images', 'other_images') as $url)
                                <x-image-preview :src="$url" :name="$staging->title" />

                            @empty
                                <p class="text-danger">No staging image available yet!!</p>
                            @endforelse
                    </div>

                </div>

            </div>


            <div class="bg-white rounded-lg p-7">
                <h1 class="pb-5 font-bold">Thumbnail</h1>
                  <x-image-preview :src="$staging->imageUrl('thumbnail', 'thumbnail')" :name="$staging->title" />
            </div>
        </div>



    </div>

</div>

</div>
@endsection
