@props(['active'])

@php
$classes = ($active ?? false)
            ? 'btn btn-outline-light text-dark rounded-start rounded-end btn-category active'
            : 'btn btn-outline-light text-dark rounded-start rounded-end btn-category';
@endphp

<button {{ $attributes->merge(['class' => $classes]) }} style="margin-right: 10px; margin-bottom: 10px; padding: 5px 10px; border-color: white;" onmouseover="this.style.backgroundColor='#f0f3fa'" onmouseout="this.style.backgroundColor=''">
    {{ $slot }}
</button>
