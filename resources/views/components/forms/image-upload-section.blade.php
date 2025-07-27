@props([
    'title' => 'Thumbnail',
    'name',
    'image' => null,
    'id',
    'target' => ''
    

])
  
  
<div class="py-2 bg-white rounded-lg px-7">
    <h1 class="py-2 font-bold">{{ $title }}</h1>

    <x-image-preview :src="$image" />
    <div class="flex flex-wrap items-start justify-between">

    <x-forms.file-upload name="thumbnail" />
    <x-button variant="image" target="{{ $target }}-{{ $id }}" >
        <img class="cursor-pointer"  src="{{ asset('assets/icons/delete-icon.png') }}" alt="">
    </x-button>
    
    </div>
    <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
   

</div>
