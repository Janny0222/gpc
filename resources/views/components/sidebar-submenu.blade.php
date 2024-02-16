@props(['active'])

{{-- @php
$classes = ($active ?? false)
            ? 'leading-7 text-left text-sm font-thin mx-auto text bg-gray-800 relative overflow-hidden transition-all max-h-0 duration-700'
            : 'leading-7 text-left text-sm font-thin mx-auto text bg-gray-800 hidden'
@endphp --}}

<div {{ $attributes->merge(['class' => 'leading-7 text-left text-sm font-thin mx-auto text bg-gray-800 relative overflow-hidden transition-all max-h-0 duration-50']) }}>
    {{ $slot }}
</div>