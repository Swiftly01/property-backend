@props([
'required' => true,
'type' => 'text',
'name',
'placeholder' => '',
'id' => null,
'value' => null,
])

@php
    $id = $id ?? $name;
    $value = $value ?? old($name)
@endphp

<input type="{{ $type }}" id="{{ $id }}" placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ $value }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder:text-custom-blue-gray" @if($required) required @endif  />