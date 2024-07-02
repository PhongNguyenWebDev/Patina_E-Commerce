@props(['active' => false, 'href'])

@php
    $classes = 'nav-link fs-5' . ($active ? ' change' : '');
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
