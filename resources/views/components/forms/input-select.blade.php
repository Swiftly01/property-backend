@props(['name', 'id' => null, 'options' => [], 'required' => false, 'selected' => '', 'placeholder' => null, 'type' => 'default'])

@php
    $id = $id ?? $name;
    $selected = old($name, $selected);

    $variant = match ($type) {
       'default'  => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5',
       'custom'  => 'w-full bg-[#F5F5F5]  text-black p-2 pl-8 rounded outline-none shadow-none  appearance-none border-gray-300',
    };

    $style = $variant === 'custom'
        ? '-webkit-appearance: none; -moz-appearance: none; appearance: none; background-image: none !important;'
        : '';

        

@endphp


<select style="{{ $style  }}" id="{{ $id }}"
    class="{{ $variant }}"
    name="{{ $name }}" @if ($required) required @endif>



    @if ($placeholder)
        <option value="" disabled {{ $selected == '' ? 'selected' : '' }}> {{ $placeholder }}</option>
    @endif


    @forelse($options as  $case)
        @php
            if (is_object($case)) {
                $value = $case->value ?? null;
                $label = method_exists($case, 'label') ? $case->label() : $value;
            } elseif (is_array($case)) {
                $value = $case['value'];
                $label = $case['label'];
            } else {
                $value = $case;
                $label = ucfirst(str_replace('_', ' ', $case));
            }
        @endphp

        <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>{{ $label }}</option>

    @empty

        <option value="" disabled>No options available</option>
    @endforelse






</select>
