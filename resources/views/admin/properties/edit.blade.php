@extends('layouts.admin')
@section('title')
    Edit :: Property
@endsection
@section('content')
    <div class="p-4 sm:p-6 lg:p-10">

        <form action="{{ route('properties.update', ['property' => $property->id]) }}" method="POST"
            enctype="multipart/form-data">

            @csrf

            @method('PATCH')

            <x-page-header backRoute='properties.index' title="Edit Property Details">
                <x-button href="{{ route('properties.index') }}" variant="outline">
                    Discard
                </x-button>
                <x-button type="submit">
                    Save Changes
                </x-button>

            </x-page-header>


            <div class="mt-5 lg:mt-14">
                <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] gap-5">
                    <div class="bg-white rounded-lg p-7">
                        <h1 class="text-lg font-bold">Property Information</h1>
                        <p class="text-custom-blue-gray">Fill in the information below to add a new property</p>

                        <div class="mt-5">
                            <div class="flex flex-wrap justify-between gap-3">
                                <div class="flex-1 mb-5">
                                    <x-forms.input-label for="title" label="Property Title" />
                                    <x-forms.input name="title" placeholder="Enter Property Title" :value="$property->title" />
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>
                                <div class="flex-1 mb-5">
                                    <x-forms.input-label for="status" label="Status" />
                                    <x-forms.input-select :selected="$property->status" name="status"
                                        placeholder="-- Select a status --" :options="\App\Enums\PropertyStatusEnum::cases()" />
                                    <x-input-error :messages="$errors->get('status')" class="mt-2" />


                                </div>

                            </div>
                            <div class="flex flex-wrap justify-between gap-3">
                                <div class="flex-1 mb-5">
                                    <x-forms.input-label for="price" label="Price" />
                                    <x-forms.input :value="$property->price" name="price" type="number" placeholder="$ 0" />
                                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                </div>
                                <div class="flex-1 mb-5">
                                    <x-forms.input-label for="location" label="location" />
                                    <x-forms.input-select :selected="$property->location" name="location" :options="\App\Enums\LocationEnum::cases()"
                                        placeholder="-- Select a location --" />
                                    <x-input-error :messages="$errors->get('location')" class="mt-2" />

                                </div>

                            </div>
                            <div class="flex flex-wrap justify-between gap-3">
                                 <div class="flex-1 mb-5">
                                    <x-forms.input-label for="type" label="Property type" />
                                    <x-forms.input-select :selected="$property->type" name="type" placeholder="-- Select a property type --"
                                        :options="\App\Enums\PropertyTypeEnum::cases()" />
                                    <x-input-error :messages="$errors->get('type')" class="mt-2" />
                                </div>
                                 <div class="flex-1 mb-5">
                                    <x-forms.input-label for="sell_request_id" label="Link to Sell Request (optional)" />
                                    <x-forms.input-select name="sell_request_id" placeholder="-- Select a sell request to attach --"
                                        :options="$pendingSellRequests" :selected="$property->sell_request_id" />
                                    <x-input-error :messages="$errors->get('sell_request_id')" class="mt-2" />

                                </div>
                            </div>
                            <div>
                                <x-forms.input-label for="description" label="Description" />
                                <x-forms.input-textarea :value="$property->description" name="description"
                                    placeholder="Enter Property Description..." />
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />

                            </div>


                        </div>

                    </div>

                    <x-forms.image-upload-section name='thumbnail' :id="$property->id" :image="$property->imageUrl()" target="delete-property" />
                </div>
                <div class="mt-5 bg-white rounded-lg p-7">
                    <h1 class="font-bold">Property Images</h1>
                    <p class="text-custom-blue-gray">Upload other property image maximum of 4 and minimum of 2</p>
                    <div class="p-5 mt-5 text-center rounded-lg bg-gray-50">
                        <p class="pt-5 text-custom-blue-gray">Drag and drop your file here. <br> - or -</p>

                        <x-drag-and-drop name="other_images[]" :multiple="true" />
                        <x-input-error :messages="$errors->get('other_images')" class="mt-2" />
                    </div>
                </div>

        </form>




    </div>



    <div class="mt-5">
        <div class="bg-white rounded-lg p-7">
            <h1 class="font-bold">Other property Images</h1>
            <p class="text-custom-blue-gray">Delete other property images </p>
            <div class="grid gap-4 rounded-lg md:grid-cols-2 lg:grid-cols-4">
                @forelse ($property->getImages('other_images') as $media)
                    
                    <x-image-preview  :mediaId="$media->id" :src="$media->getUrl()"  :name="$property->name" title="Property image" />
                @empty
                    <p class="text-danger">No property image available yet!!</p>
                @endforelse
            </div>

        </div>



    </div>



    <x-alert-modal :action="route('thumbnail.delete', [ 'model' => 'Property', 'id' => $property->id])" variant="delete" id="delete-property-{{ $property->id }}" title="property thumbnail"
        method="DELETE" />


    </div>
@endsection
