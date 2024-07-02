@props(['active' => false, 'href', 'slugBrand' => false])

@php
    $classes = 'nav-link select-filter' . ($active ? ' change' : '');
    if ($slugBrand) {
        $classes .= ' border-color-orange';
    }
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
