@props([
    'title' => 'Thumbnail',
    'name',
    'image' => null,

])

<div class="bg-white px-7 py-2 rounded-lg">
    <h1 class="font-bold py-2">{{ $title }}</h1>

    <x-image-preview :src="$image" />
    <x-forms.file-upload name='image' />

</div>
