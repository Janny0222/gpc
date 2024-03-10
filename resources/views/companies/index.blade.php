<x-app-layout>
    <x-slot name="header">
        {{-- Breadcrumbs --}}
        <div class="flex items-center justify-start font-bold text-gray-500">
            <a href="{{ route('dashboard') }}"><x-icons.solid.home class="w-6 h-6"></x-icons.solid.home></a>
            <x-icons.outline.chevron-right class="w-5 h-5"></x-icons.outline.chevron-right>
            <a href="#" class="mx-2">Maintenance</a>
            <x-icons.outline.chevron-right class="w-5 h-5"></x-icons.outline.chevron-right>
            <a href="#" class="mx-2 font-extrabold text-black">Add Company</a>
        </div>
    </x-slot>

    {{-- @livewire('notification') --}}
    {{-- @livewire('properties.create') --}}
    @livewire('notification')
    @livewire('companies.index')
    @livewire('companies.create')

</x-app-layout>