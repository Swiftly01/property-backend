@props([
    'src' => asset('assets/images/image-placeholder.png'),
    'name' => 'image',
    'ratio' => 'aspect-[1060/706]',
    'mediaId' => null,
])

@php
   $classes = $mediaId ? 'relative'  : '';
@endphp


 <div class="w-full {{ $ratio }} overflow-hidden rounded-md {{$classes}}">
  @isset($mediaId)
   <x-button variant="image" target="delete-property-{{ $mediaId }}">
       <img class="absolute  right-0  z-20"  src="{{ asset('assets/icons/iconography.png') }}" alt="">
    </x-button>
   <x-alert-modal variant='delete' id="delete-property-{{ $mediaId }}" title="property image" :action="route('media.delete', ['media' => $mediaId])" method="DELETE"  />
  @endisset
  <img src="{{ $src }}" alt="{{ $name }}" class="w-full h-full object-cover" />
 
</div>

  
