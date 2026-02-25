@props([
    'variant' => 'primary',
    'href' => null,
])

@php
$base = "inline-flex items-center justify-center font-medium rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 px-6 py-3 text-lg";

$variants = [
    'primary' => "bg-primary text-primary-foreground shadow-sm hover:shadow-md hover:opacity-90",
    'outline' => "border-2 border-primary text-primary bg-transparent hover:bg-primary hover:text-primary-foreground",
];

$classes = $base . ' ' . $variants[$variant];
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif