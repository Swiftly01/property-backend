@props([
'variant' => 'confirmed',
])

@php
    $base = 'text-xs font-medium me-2  ';
    $variantColor = match ($variant) {
       'available', 'confirmed'  => 'bg-green-100 text-green-800 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300',
       'pending', 'under review', 'sold' => 'bg-[#FFF3D3] text-[#D9A106] px-4 py-1 rounded-full',
       'declined' => 'bg-danger  text-white px-4 py-1 rounded-full',
    };

    $classes = $base . ' ' . $variantColor;
@endphp


<span {{ $attributes->merge(['class' => $classes]) }} >{{  Str::ucfirst(($variant)) }}</span>
