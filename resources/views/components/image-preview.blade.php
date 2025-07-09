@props([
    'src' => asset('assets/images/image-placeholder.png'),
    'name' => 'image',
    'ratio' => 'aspect-[1060/706]'
])

 <div class="w-full {{ $ratio }} overflow-hidden rounded-md">
  <img src="{{ $src }}" alt="{{ $name }}" class="w-full h-full object-cover" />
</div>