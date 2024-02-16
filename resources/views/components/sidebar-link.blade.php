@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center block px-5 py-4 text-sm text-white bg-gray-800 hover:text-white focus:text-white hover:bg-gray-800 focus:bg-gray-800 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out'
            : 'flex items-center block px-5 py-4 text-sm text-gray-200 hover:text-white focus:text-white hover:bg-gray-800 focus:bg-gray-800 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>