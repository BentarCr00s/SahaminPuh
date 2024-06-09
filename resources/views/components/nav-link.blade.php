@props(['active'])

@php
$classes = ($active ?? false)
            ? 'nav-link active'
            : 'nav-link';
$styles = ($active ?? false)
            ? 'border-bottom: 2px solid green;'
            : '';
@endphp

<li {{ $attributes->merge(['style' => $styles]) }}>
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
