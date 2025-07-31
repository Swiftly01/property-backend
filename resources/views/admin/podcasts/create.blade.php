{{-- @extends('layouts.admin')
@section('title')
    Add :: Podcast
@endsection
@section('content')
    <div class="p-4 sm:p-6 lg:p-10">
        <x-page-header backRoute='podcasts.index' title="Add New Podcast">
            <x-button variant="outline" href="{{ route('podcasts.index') }}">
                Cancel
            </x-button>
            <x-button type="submit">
                Add Podcast
            </x-button>

        </x-page-header>

        <div class="mt-5 lg:mt-14">
            <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] gap-5">
                <div class="bg-white p-7 rounded-lg">
                    <h1 class="font-bold text-lg">Podcast Information</h1>
                    <p class="text-custom-blue-gray">Fill in the information below to add a new podcast</p>

                    <form class="mt-5">
                        <div class="flex justify-between gap-3 flex-wrap">
                            <div class="mb-5 flex-1"> 
                                <x-forms.input-label for="title" label="Property Title"/>
                                <x-forms.input  name="title"   placeholder="Enter Property Title"/>
                            </div>
                            <div class="mb-5 flex-1">
                                <x-forms.input-label for="location" label="Location" />
                                <x-forms.input-select name="location" placeholder="-- Select a location --" :options="[]" />
                            
                            </div>

                        </div>
                        <div class="">
                            <div class="mb-5 flex-1">
                                 <x-forms.input-label for="video_link" label="Video Link" />
                                 <x-forms.input  name="video_link" type="text" placeholder="URL:Enter Link" />
                            </div>
                            

                        </div>
                        <div>
                            <x-forms.input-label for="message" label="Description" />
                        
                            <textarea id="message" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 placeholder:text-custom-blue-gray"
                                placeholder="Enter Property Description..."></textarea>

                        </div>


                    </form>

                </div>

                <div class="bg-white p-7 rounded-lg">
                    <h1 class="font-bold pb-5">Thumbnail</h1>
                    <div class="text-center p-5 bg-gray-50 rounded-lg">
                        <p class="pt-5 text-custom-blue-gray">Drag and drop your file here. <br> - or -</p>
                        <x-drag-and-drop />
                    </div>
                </div>



            </div>

        </div>

        

    </div>
@endsection --}}



@extends('layouts.admin')
@section('title')
    Add :: podcasts
@endsection
@section('content')
    <div class="p-4 sm:p-6 lg:p-10">
        <form action="{{ route('podcasts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-page-header backRoute='podcasts.index' title="Add New podcasts">
                <x-button variant="outline" href="{{ route('podcasts.index') }}">
                    Cancel
                </x-button>
                <x-button type="submit">
                    Add podcasts
                </x-button>

            </x-page-header>


            <div class="mt-5 lg:mt-14">
                <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] gap-5">
                    <div class="bg-white rounded-lg p-7">
                        <h1 class="text-lg font-bold">Podcast Information</h1>
                        <p class="text-custom-blue-gray">Fill in the information below to add a new podcast</p>

                        <div class="mt-5">
                            <div class="flex flex-wrap justify-between gap-3">
                                <div class="flex-1 mb-5">
                                    <x-forms.input-label for="title" label="podcast Title" />
                                    <x-forms.input name="title" placeholder="Enter podcast Title" />
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
                                    <x-forms.input-label for="property_id" label="Link to Property" />
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

           
        </form>

    </div>
@endsection

