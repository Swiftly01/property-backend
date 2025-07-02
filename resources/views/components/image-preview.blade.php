@props([
    'src' => asset('assets/images/image-placeholder.png'),
    'ratio' => 'aspect-[1060/706]'
])


 <div class="w-full {{ $ratio }} overflow-hidden rounded-md">
  <img src="{{ $src }}" class="w-full h-full object-cover" />
</div>