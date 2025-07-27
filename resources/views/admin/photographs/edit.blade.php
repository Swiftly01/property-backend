{{-- @extends('layouts.admin')
@section('title')
Edit :: Photograph
@endsection
@section('content')

<div class="p-4 sm:p-6 lg:p-10">

  <x-page-header backRoute='photograph.index' title="Edit Photograph Details">
    <x-button href="{{ route('photograph.index') }}" variant="outline">
      Discard
    </x-button>
    <x-button type="submit">
      Save Changes
    </x-button>

  </x-page-header>

  <div class="mt-5 lg:mt-14">
    <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] gap-5">
      <div class="bg-white rounded-lg p-7">
        <h1 class="text-lg font-bold">Photography Information</h1>
        <p class="text-custom-blue-gray">Fill in the information below to add a new photograph</p>

        <form class="mt-5">
          <div class="flex flex-wrap justify-between gap-3">
            <div class="flex-1 mb-5">
              <x-forms.input-label for="title" label="Property Title" />
              <x-forms.input name="title" placeholder="Enter Property Title" value="test" />
            </div>
            <div class="flex-1 mb-5">
              <x-forms.input-label for="location" label="Location" />
              <x-forms.input-select name="location" placeholder="-- Select a location --" :options="[]" />


            </div>

          </div>
          <div class="flex-1 mb-5">
            <x-forms.input-label for="video_link" label="Video Link" />
            <x-forms.input name="video_link" type="text" placeholder="URL:Enter Link" value="test" />
          </div>

          <div>
            <x-forms.input-label for="message" label="Description" />
            <x-forms.input-textarea name="message" placeholder="Enter Property Description..." value="test" />


          </div>


        </form>

      </div>

      <x-forms.image-upload-section name='image' />



    </div>

  </div>

  <div class="mt-5 bg-white rounded-lg p-7">
    <h1 class="font-bold">Property Images</h1>
    <p class="text-custom-blue-gray">Upload other photograph image maximum of 10 and minimum of 5</p>

    <div class="p-5 mt-5 text-center rounded-lg bg-gray-50">
      <p class="pt-5 text-custom-blue-gray">Drag and drop your file here. <br> - or -</p>


      <x-drag-and-drop />


    </div>


  </div>





</div>

@endsection --}}

@extends('layouts.admin')
@section('title')
    Edit :: Photograph
@endsection
@section('content')
    <div class="p-4 sm:p-6 lg:p-10">

        <form action="{{ route('photographs.update', ['photograph' => $photograph->id]) }}" method="POST"
            enctype="multipart/form-data">

            @csrf

            @method('PATCH')

            <x-page-header backRoute='photographs.index' title="Edit Photograph Details">
                <x-button href="{{ route('photographs.index') }}" variant="outline">
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
                        <p class="text-custom-blue-gray">Fill in the information below to add a new photograph</p>

                        <div class="mt-5">
                            <div class="flex flex-wrap justify-between gap-3">
                                <div class="flex-1 mb-5">
                                    <x-forms.input-label for="title" label="Photograph Title" />
                                    <x-forms.input name="title" :value="$photograph->title" placeholder="Enter Photograph Title" />
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />

                                </div>
                                <div class="flex-1 mb-5">
                                    <x-forms.input-label for="location" label="location" />
                                    <x-forms.input-select name="location" :selected="$photograph->location" :options="\App\Enums\LocationEnum::cases()"
                                        placeholder="-- Select a location --" />
                                    <x-input-error :messages="$errors->get('location')" class="mt-2" />

                                </div>

                            </div>

                            <div class="flex-1 mb-5">
                                <x-forms.input-label for="video_url" label="Video Link" />
                                <x-forms.input name="video_url" :value="$photograph->video_url" type="text" placeholder="URL: Enter Link" :required="false" />
                                <x-input-error :messages="$errors->get('video_url')" class="mt-2" />
                            </div>


                            <div>
                                <x-forms.input-label for="description" label="Description" />
                                <x-forms.input-textarea name="description" :value="$photograph->description" placeholder="Enter Property Description..." />
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />

                            </div>



                        </div>

                    </div>

                    <x-forms.image-upload-section name='thumbnail' :id="$photograph->id" :image="$photograph->imageUrl()" target="delete-photograph" />
                      
                </div>
                <div class="mt-5 bg-white rounded-lg p-7">
                    <h1 class="font-bold">Property Images</h1>
                    <p class="text-custom-blue-gray">Upload other photograph image maximum of 4 and minimum of 2</p>
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
            <h1 class="font-bold">Other photograph Images</h1>
            <p class="text-custom-blue-gray">Delete other photograph images </p>
            <div class="grid gap-4 rounded-lg md:grid-cols-2 lg:grid-cols-4">
                @forelse ($photograph->getImages('other_images') as $media)
                     <x-image-preview  :mediaId="$media->id" :src="$media->getUrl()"  :name="$photograph->title" title="Photograph" /> 
                @empty
                    <p class="text-danger">No photograph image available yet!!</p>
                @endforelse
            </div>

        </div>



    </div>



    <x-alert-modal :action="route('thumbnail.delete', [ 'model' => 'Photograph','id' => $photograph->id])" variant="delete" id="delete-photograph-{{ $photograph->id }}" title="photograph thumbnail"
        method="DELETE" />


    </div>
@endsection
