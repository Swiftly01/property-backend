@extends('layouts.admin')
@section('title')
    Edit :: Property
@endsection
@section('content')
    <div class="p-4 sm:p-6 lg:p-10">

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
                <div class="bg-white p-7 rounded-lg">
                    <h1 class="font-bold text-lg">Property Information</h1>
                    <p class="text-custom-blue-gray">Fill in the information below to add a new property</p>

                    <form class="mt-5">
                        <div class="flex justify-between gap-3 flex-wrap">
                            <div class="mb-5 flex-1">
                                <x-forms.input-label for="title" label="Property Title" />
                                <x-forms.input name="title" value="test" />
                            </div>
                            <div class="mb-5 flex-1">
                                <x-forms.input-label for="status" label="Status" />
                                <x-forms.input-select name="status" placeholder="-- Select a status --"
                                    :options="[]" />

                            </div>

                        </div>
                        <div class="flex justify-between gap-3 flex-wrap">
                            <div class="mb-5 flex-1">
                                <x-forms.input-label for="price" label="Price" />
                                <x-forms.input name="price" type="number" value="1" />
                            </div>
                            <div class="mb-5 flex-1">
                                <x-forms.input-label for="location" label="location" />
                                <x-forms.input-select name="location" placeholder="-- Select a location --" />

                            </div>

                        </div>
                        <div>
                            <x-forms.input-label for="message" label="Description" />
                            <x-forms.input-textarea name="message" placeholder="Enter Property Description..." value="test"/>
              

                        </div>


                    </form>

                </div>

              

                <x-forms.image-upload-section name='image' />



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
