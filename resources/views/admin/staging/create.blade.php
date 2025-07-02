@extends('layouts.admin')
@section('title')
    Add :: Staging
@endsection
@section('content')
    <div class="p-4 sm:p-6 lg:p-10">
        <x-page-header backRoute='properties.index' title="Add New Staging">
            <x-button variant="outline" href="{{ route('staging.index') }}">
                Cancel
            </x-button>
            <x-button type="submit">
                Add Staging
            </x-button>

        </x-page-header>

        <div class="mt-5 lg:mt-14">
            <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] gap-5">
                <div class="bg-white p-7 rounded-lg">
                    <h1 class="font-bold text-lg">Staging Information</h1>
                    <p class="text-custom-blue-gray">Fill in the information below to add a new staging</p>

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

        <div class="mt-5 bg-white p-7 rounded-lg">
            <h1 class="font-bold">Property Images</h1>
            <p class="text-custom-blue-gray">Upload other property image maximum of 10 and minimum of 5</p>

            <div class="text-center p-5 bg-gray-50 rounded-lg mt-5">
                <p class="pt-5 text-custom-blue-gray">Drag and drop your file here. <br> - or -</p>


                <x-drag-and-drop />


            </div>


        </div>

    </div>
@endsection
