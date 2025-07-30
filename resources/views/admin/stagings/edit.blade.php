
@extends('layouts.admin')
@section('title')
    Edit :: Staging
@endsection
@section('content')
    <div class="p-4 sm:p-6 lg:p-10">

        @php
            $staging = $type === \App\Enums\PropertyMediaTypeEnum::STAGING->value ? $propertyMedia : null;
        @endphp

        <form action="{{ route('stagings.update', ['staging' => $staging->id]) }}" method="POST"
            enctype="multipart/form-data">

            @csrf

            @method('PATCH')

            <x-page-header backRoute='stagings.index' title="Edit staging Details">
                <x-button href="{{ route('stagings.index') }}" variant="outline">
                    Discard
                </x-button>
                <x-button type="submit">
                    Save Changes
                </x-button>

            </x-page-header>


            <div class="mt-5 lg:mt-14">
                <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] gap-5">
                    <div class="bg-white rounded-lg p-7">
                        <h1 class="text-lg font-bold">Staging Information</h1>
                        <p class="text-custom-blue-gray">Fill in the information below to edit a  staging</p>

                        <div class="mt-5">
                            <div class="flex flex-wrap justify-between gap-3">
                                <div class="flex-1 mb-5">
                                    <x-forms.input-label for="title" label="staging Title" />
                                    <x-forms.input name="title" :value="$staging->title" placeholder="Enter staging Title" />
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />

                                </div>
                                <div class="flex-1 mb-5">
                                    <x-forms.input-label for="location" label="location" />
                                    <x-forms.input-select name="location" :selected="$staging->location" :options="\App\Enums\LocationEnum::cases()"
                                        placeholder="-- Select a location --" />
                                    <x-input-error :messages="$errors->get('location')" class="mt-2" />

                                </div>

                            </div>

                            <div class="flex justify-between gap-3 flex-wrap">
                                <div class="flex-1 mb-5">
                                    <x-forms.input-label for="video_url" label="Video Link" />
                                    <x-forms.input name="video_url" :value="$staging->video_url" type="text" placeholder="URL: Enter Link"
                                        :required="false" />
                                    <x-input-error :messages="$errors->get('video_url')" class="mt-2" />
                                </div>

                                <div class="mb-5 flex-1">
                                    <x-forms.input-label for="property_id" label="Link to Property (optional)" />
                                    <x-forms.input-select name="property_id" placeholder="-- Select a property to attach --"
                                        :options="$properties" :selected="$staging->property_id" />
                                    <x-input-error :messages="$errors->get('property_id')" class="mt-2" />

                                </div>
                                <x-forms.input name="type" type="hidden" :required="true"
                                    value="{{ $type }}" />

                            </div>


                            <div>
                                <x-forms.input-label for="description" label="Description" />
                                <x-forms.input-textarea name="description" :value="$staging->description"
                                    placeholder="Enter Property Description..." />
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />

                            </div>



                        </div>

                    </div>

                    <x-forms.image-upload-section name='thumbnail' :id="$staging->id" :image="$staging->imageUrl('thumbnail', 'thumbnail')"
                        target="delete-staging" />

                </div>
                <div class="mt-5 bg-white rounded-lg p-7">
                    <h1 class="font-bold">Property Images</h1>
                    <p class="text-custom-blue-gray">Upload other staging image maximum of 4 and minimum of 2</p>
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
            <h1 class="font-bold">Other staging Images</h1>
            <p class="text-custom-blue-gray">Delete other staging images </p>
            <div class="grid gap-4 rounded-lg md:grid-cols-2 lg:grid-cols-4">
                @forelse ($staging->getImages('other_images') as $media)
                    <x-image-preview :mediaId="$media->id" :src="$media->getUrl()" :name="$staging->title" title="staging" />
                @empty
                    <p class="text-danger">No staging image available yet!!</p>
                @endforelse
            </div>

        </div>



    </div>



    <x-alert-modal :action="route('thumbnail.delete', ['model' => 'PropertyMedia', 'id' => $staging->id])" variant="delete" id="delete-staging-{{ $staging->id }}"
        title="staging thumbnail" method="DELETE" />


    </div>
@endsection
