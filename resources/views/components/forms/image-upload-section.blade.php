@props([
    'title' => 'Thumbnail',
    'name',
    'image' => null,
    'id',
    

])
  
  
<div class="bg-white px-7 py-2 rounded-lg">
    <h1 class="font-bold py-2">{{ $title }}</h1>

    <x-image-preview :src="$image" />
    <div class="flex justify-between items-start flex-wrap">

    <x-forms.file-upload name="thumbnail" />
    <x-button variant="image" target="delete-property-{{ $id }}" >
        <img class="cursor-pointer"  src="{{ asset('assets/icons/delete-icon.png') }}" alt="">
    </x-button>
    
    </div>
    <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
   

</div>
