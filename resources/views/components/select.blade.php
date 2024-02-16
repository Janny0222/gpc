@props(['disabled' => false, 'name', 'errors'])

@php
$classes = ($errors->first($name))
            ? 'rounded-md shadow-sm text-sm border-red-500 focus:border-red-300 focus:ring-1 focus:ring-red-200'
            : 'rounded-md shadow-sm text-sm border-gray-300 focus:border-gray-800 focus:ring-1 focus:ring-gray-800 disabled:bg-gray-100';
@endphp

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $classes, 'name' => $name]) !!}>
    {{ $slot }}
</select>