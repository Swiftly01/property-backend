@props([
    'name',
    'id' => null,
    'accept' => '.png,.jpg,.jpeg',
    'text' => 'Max file size is 5MB PNG, JPG or JPEG file',
    'required' => false
])

@php
$id = $id ?? $name;

    
@endphp

<div>
    <input class="block w-full text-xs mt-2 border border-gray-300 rounded-lg cursor-pointer bg-[#022A66] text-white"
        id="{{ $id }}" type="file" accept="{{ $accept }}" name="{{ $name }}">
    <p class="text-center pt-1 text-sm text-[#8E95A9]">{{ $text }}</p>
</div>
