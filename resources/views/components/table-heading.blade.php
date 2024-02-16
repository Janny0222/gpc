@props(['sortable' => false, 'direction' => 'asc'])

<th x-data="{ show: false }" @mouseenter="show = true" @mouseleave="show = false" scope="col" {{ $attributes->merge(['class' => 'px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:underline']) }}>

    <div class="inline-flex items-center font-bold">
        {{ $slot }}

        <div class="relative flex items-center">
            <div class="absolute"
                x-show="show"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90"
                x-cloak
            >
                @if($sortable)
                    @if($direction == 'asc')
                        <x-icons.solid.chevron-up class="h-4 w-4 text-boston-gray-500"/>
                    @else
                        <x-icons.solid.chevron-down class="h-4 w-4 text-boston-gray-500"/>
                    @endif
                @endif
            </div>
        </div>
    </div>  
    
</th>