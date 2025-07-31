@extends('layouts.admin')
@section('title')
    Add :: Photographs
@endsection
@section('content')
    <div class="p-4 sm:p-6 lg:p-10">
        <form action="{{ route('photographs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-page-header backRoute='photographs.index' title="Add New Photographs">
                <x-button variant="outline" href="{{ route('photographs.index') }}">
                    Cancel
                </x-button>
                <x-button type="submit">
                    Add Photographs
                </x-button>

            </x-page-header>


            <div class="mt-5 lg:mt-14">
                <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] gap-5">
                    <div class="bg-white rounded-lg p-7">
                        <h1 class="text-lg font-bold">Photography Information</h1>
                        <p class="text-custom-blue-gray">Fill in the information below to add a new photograph</p>

                        <div class="mt-5">
                            <div class="flex flex-wrap justify-between gap-3">
                                <div class="flex-1 mb-5">
                                    <x-forms.input-label for="title" label="Photograph Title" />
                                    <x-forms.input name="title" placeholder="Enter Photograph Title" />
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />

                                </div>
                                <div class="flex-1 mb-5">
                                    <x-forms.input-label for="location" label="location" />
                                    <x-forms.input-select name="location" :options="\App\Enums\LocationEnum::cases()"
                                        placeholder="-- Select a location --" />
                                    <x-input-error :messages="$errors->get('location')" class="mt-2" />

                                </div>

                            </div>


                            <div class="flex justify-between gap-3 flex-wrap">
                                <div class="flex-1 mb-5">
                                    <x-forms.input-label for="video_url" label="Video Link" />
                                    <x-forms.input name="video_url" type="text" placeholder="URL: Enter Link"
                                        :required="false" />
                                    <x-input-error :messages="$errors->get('video_url')" class="mt-2" />
                                </div>

                                <div class="mb-5 flex-1">
                                    <x-forms.input-label for="property_id" label="Link to Property (optional)" />
                                    <x-forms.input-select name="property_id" placeholder="-- Select a property to attach --"
                                        :options="$properties" />
                                    <x-input-error :messages="$errors->get('property_id')" class="mt-2" />

                                </div>
                                <x-forms.input name="type" type="hidden" :required="true" value="{{ $type }}" />

                            </div>


                            <div>
                                <x-forms.input-label for="description" label="Description" />
                                <x-forms.input-textarea name="description" placeholder="Enter Property Description..." />
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />

                            </div>


                        </div>

                    </div>

                    <div class="bg-white rounded-lg p-7">
                        <h1 class="pb-5 font-bold">Thumbnail</h1>
                        <div class="p-5 text-center rounded-lg bg-gray-50">
                            <p class="pt-5 text-custom-blue-gray">Drag and drop your file here. <br> - or -</p>

                            <x-drag-and-drop name="thumbnail" />
                            <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />

                        </div>
                    </div>

                </div>

            </div>

            <div class="mt-5 bg-white rounded-lg p-7">
                <h1 class="font-bold">Photograph Images</h1>
                <p class="text-custom-blue-gray">Upload other photography image maximum of 4 and minimum of 2</p>

                <div class="p-5 mt-5 text-center rounded-lg bg-gray-50">
                    <p class="pt-5 text-custom-blue-gray">Drag and drop your file here. <br> - or -</p>

                    <x-drag-and-drop name="other_images[]" :multiple="true" />
                    <x-input-error :messages="$errors->get('other_images')" class="mt-2" />

                </div>


            </div>
        </form>

    </div>
@endsection
