@extends('layouts.admin')
@section('title')
Edit :: Photograph
@endsection
@section('content')

<div class="p-4 sm:p-6 lg:p-10">

  <x-page-header backRoute='properties.index' title="Edit Photograph Details">
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
        <h1 class="font-bold text-lg">Photography Information</h1>
        <p class="text-custom-blue-gray">Fill in the information below to add a new photograph</p>

        <form class="mt-5">
          <div class="flex justify-between gap-3 flex-wrap">
            <div class="mb-5 flex-1">
              <x-forms.input-label for="title" label="Property Title" />
              <x-forms.input name="title" placeholder="Enter Property Title" value="test" />
            </div>
            <div class="mb-5 flex-1">
              <x-forms.input-label for="location" label="Location" />
              <x-forms.input-select name="location" placeholder="-- Select a location --" :options="[]" />


            </div>

          </div>
            <div class="mb-5 flex-1">
              <x-forms.input-label for="video_link" label="Video Link" />
              <x-forms.input name="video_link" type="text" placeholder="URL:Enter Link" value="test" />
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