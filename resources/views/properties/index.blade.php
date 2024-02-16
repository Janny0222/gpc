<x-app-layout>
    <x-slot name="header">
        {{-- Breadcrumbs --}}
        <div class="flex justify-start items-center text-gray-500 font-bold text-lg">
            <div class="text-gray-800 mx-2">Properties</div>
        </div>
    </x-slot>

    {{-- @livewire('notification') --}}
    {{-- @livewire('properties.create') --}}
    @livewire('properties.index')

</x-app-layout>
