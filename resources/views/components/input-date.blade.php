@props(['options' => "{dateFormat:'Y-m-d', altFormat:'F j, Y', altInput:true, }", 'disabled' => false, 'name', 'errors'])

@php
$classes = ($errors->first($name))
            ? 'rounded-md shadow-sm text-sm border-red-500 focus:border-red-300 focus:ring-1 focus:ring-red-300'
            : 'rounded-md shadow-sm text-sm border-gray-300 focus:border-gray-800 focus:ring-1 focus:ring-gray-800 disabled:bg-gray-100';
@endphp

<div wire:ignore>
    <input
        x-data
        x-init="flatpickr($refs.input, {{ $options }});"
        x-ref="input"
        type="text"
        data-input
        wire:loading.class="disabled:opacity-70"
        {{ $attributes->merge(['class' => $classes, 'name' => $name]) }}
        {{ $disabled ? 'disabled' : '' }}
    />
</div>