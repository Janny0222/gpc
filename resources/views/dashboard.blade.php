<x-app-layout>
    <x-slot name="header">
        {{-- Breadcrumbs --}}
        <div class="flex items-center justify-start font-bold text-gray-500">
            <a href="#" class="text-green-600">Dashboard</a>
        </div>
    </x-slot>

    @livewire('notification')
    @livewire('dashboard')
    
</x-app-layout>