<x-app-layout>
    <x-slot name="header">
        {{-- Breadcrumbs --}}
        <div class="flex items-center justify-start font-bold text-gray-500">
            <a href="#" class="text-green-600">Dashboard</a>
        </div>
        
        <div class="flex items-center justify-end gap-4">
                        <x-button-link href="{{route('properties.index')}}">
                            View Property
                        </x-button-link>
        </div>
        
    </x-slot>

    @livewire('dashboard')
    
</x-app-layout>