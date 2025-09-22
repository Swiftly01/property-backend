@props([
    'id' => null,
    'name',
    'placeholder' => '',
    'value' => null,
    'required' => true,
])

@php
    $id = $id ?? $name;
    $value = $value ?? old($name);

    
@endphp


<textarea id="{{ $id }}" rows="4" name="{{ $name }}"
    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 placeholder:text-custom-blue-gray"
    placeholder="{{ $placeholder }}" @if ($required) required @endif>{!! $value !!}</textarea>
