
@extends('layouts.admin')
@section('title')
    Edit :: Podcast
@endsection
@section('content')
    <div class="p-4 sm:p-6 lg:p-10">

        @php
            $podcast = $type === \App\Enums\PropertyMediaTypeEnum::PODCAST->value ? $propertyMedia : null;
        @endphp

        <form action="{{ route('podcasts.update', ['podcast' => $podcast->id]) }}" method="POST"
            enctype="multipart/form-data">

            @csrf

            @method('PATCH')

            <x-page-header backRoute='podcasts.index' title="Edit podcast Details">
                <x-button href="{{ route('podcasts.index') }}" variant="outline">
                    Discard
                </x-button>
                <x-button type="submit">
                    Save Changes
                </x-button>

            </x-page-header>


            <div class="mt-5 lg:mt-14">
                <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] gap-5">
                    <div class="bg-white rounded-lg p-7">
                        <h1 class="text-lg font-bold">Podcast Information</h1>
                        <p class="text-custom-blue-gray">Fill in the information below to edit a  podcast</p>

                        <div class="mt-5">
                            <div class="flex flex-wrap justify-between gap-3">
                                <div class="flex-1 mb-5">
                                    <x-forms.input-label for="title" label="podcast Title" />
                                    <x-forms.input name="title" :value="$podcast->title" placeholder="Enter podcast Title" />
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />

                                </div>
                                <div class="flex-1 mb-5">
                                    <x-forms.input-label for="location" label="location" />
                                    <x-forms.input-select name="location" :selected="$podcast->location" :options="\App\Enums\LocationEnum::cases()"
                                        placeholder="-- Select a location --" />
                                    <x-input-error :messages="$errors->get('location')" class="mt-2" />

                                </div>

                            </div>

                            <div class="flex justify-between gap-3 flex-wrap">
                                <div class="flex-1 mb-5">
                                    <x-forms.input-label for="video_url" label="Video Link" />
                                    <x-forms.input name="video_url" :value="$podcast->video_url" type="text" placeholder="URL: Enter Link"
                                        :required="false" />
                                    <x-input-error :messages="$errors->get('video_url')" class="mt-2" />
                                </div>

                                <div class="mb-5 flex-1">
                                    <x-forms.input-label for="property_id" label="Link to Property (optional)" />
                                    <x-forms.input-select name="property_id" placeholder="-- Select a property to attach --"
                                        :options="$properties" :selected="$podcast->property_id" />
                                    <x-input-error :messages="$errors->get('property_id')" class="mt-2" />

                                </div>
                                <x-forms.input name="type" type="hidden" :required="true"
                                    value="{{ $type }}" />

                            </div>


                            <div>
                                <x-forms.input-label for="description" label="Description" />
                                <x-forms.input-textarea name="description" :value="$podcast->description"
                                    placeholder="Enter Property Description..." />
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />

                            </div>



                        </div>

                    </div>

                    <x-forms.image-upload-section name='thumbnail' :id="$podcast->id" :image="$podcast->imageUrl('thumbnail', 'thumbnail')"
                        target="delete-podcast" />

                </div>
                

        </form>




    </div>



    <x-alert-modal :action="route('thumbnail.delete', ['model' => 'PropertyMedia', 'id' => $podcast->id])" variant="delete" id="delete-podcast-{{ $podcast->id }}"
        title="podcast thumbnail" method="DELETE" />


    </div>
@endsection

