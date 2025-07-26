@props([
    'src' => asset('assets/images/image-placeholder.png'),
    'name' => 'image',
    'ratio' => 'aspect-[1060/706]',
    'id' => null,
])

@php
   $classes = $id ? 'relative'  : '';
@endphp

   
 <div class="w-full {{ $ratio }} overflow-hidden rounded-md {{$classes}}">
  @isset($id)
  {{ $id }}
   <x-button variant="image" target="delete-property-{{ $id }}">
       <img class="absolute right-0 z-20"  src="{{ asset('assets/icons/iconography.png') }}" alt="">
    </x-button>
   <x-alert-modal variant='delete' id="delete-property-{{ $id }}" title="property image" :action="route('media.delete', ['media' => $id])" method="DELETE"  />
  @endisset
  <img src="{{ $src }}" alt="{{ $name }}" class="object-cover w-full h-full" />
 
</div>

  
