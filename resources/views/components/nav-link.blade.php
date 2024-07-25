@props(['active' => false, 'href'])

@php
    $classes = 'nav-link fw-medium mx-2' . ($active ? ' change' : '');
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
