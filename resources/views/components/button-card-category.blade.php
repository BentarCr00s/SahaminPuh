@props(['active'])

@php
$classes = ($active ?? false)
            ? 'btn btn-outline-light text-dark rounded-start rounded-end btn-category active'
            : 'btn btn-outline-light text-dark rounded-start rounded-end btn-category';
$styles = ($active ?? false)
            ? 'margin-right: 10px; margin-bottom: 10px; padding: 5px 10px; border-color: white; background-color: #f0f3fa;'
            : 'margin-right: 10px; margin-bottom: 10px; padding: 5px 10px; border-color: white;';
@endphp

<button {{ $attributes->merge(['class' => $classes])->merge(['style' => $styles]) }} onmouseover="this.style.backgroundColor='#f0f3fa'" onmouseout="this.style.backgroundColor=''">
    {{ $slot }}
</button>
