@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'mt-1 text-red-600 text-xs italic']) }}>{{ $message }}</p>
@enderror