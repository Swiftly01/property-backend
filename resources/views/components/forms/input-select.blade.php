@props(['name', 'id' => null, 'options' => [], 'required' => false, 'selected' => '', 'placeholder' => null])

@php
    $id = $id ?? $name;
    $selected = old($name, $selected);
@endphp

<select id="{{ $id }}"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
    name="{{ $name }}" @if ($required) required @endif>

    @if($placeholder)
    <option value="" disabled {{ $selected == '' ? 'selected' : '' }}> {{ $placeholder }}</option>   
    @endif

    @foreach ($options as $key => $label)
        <option value="{{ $key }}" {{ $selected == $key ? 'selected' : '' }}>{{ $label }}</option>
    @endforeach

</select>
