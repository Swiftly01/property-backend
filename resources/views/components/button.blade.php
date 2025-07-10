@props([
    'href' => null,
    'type' => 'button',
    'variant' => 'primary',
    'target' => '',
])


@php
    $base =
        'px-2 py-1 md:px-6 md:py-2 rounded font-medium transition transition-duration-200 active:scale-100 text-sm ';
    $variants = [
        'primary' => 'bg-[#022A66]  text-white  hover:bg-primary hover:scale-[1.02] ',
        'outline' => 'border border-[#022A66]  text-[#022A66] hover:bg-primary hover:text-white',
        'danger' => 'border text-danger border-[#022A66]  hover:bg-red-600 hover:text-white hover:border-white',
        'success' => 'bg-[#2DA347] text-white hover:bg-green-800 hover:scale-[1.02]',
        'image' => '',
        
    ];

    $classes = $variant === 'image' ? ($variants['image']) : $base . ' ' . ($variants[$variant] ?? $variants['primary']);

@endphp

@if ($href)
    <a href="{{ $href }}"
        @if ($target) data-modal-target="{{ $target }}" data-modal-toggle="{{ $target }}" @endif
        {{ $attributes->merge(['class' => $classes]) }}> {{ $slot }}</a>
@else
    <button type="{{ $type }}"
        @if ($target) data-modal-target="{{ $target }}" data-modal-toggle="{{ $target }}" @endif
        {{ $attributes->merge(['class' => $classes]) }}> {{ $slot }}</button>
@endif
