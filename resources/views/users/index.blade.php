<x-app-layout>
    <x-slot name="header">
        {{-- Breadcrumbs --}}
        <div class="flex items-center justify-start font-bold text-gray-500">
            <a href="{{ route('dashboard') }}"><x-icons.solid.home class="w-6 h-6"></x-icons.solid.home></a>
            <x-icons.outline.chevron-right class="w-5 h-5"></x-icons.outline.chevron-right>
            <a href="#" class="mx-2">Maintenance</a>
            <x-icons.outline.chevron-right class="w-5 h-5"></x-icons.outline.chevron-right>
            <a href="{{ route('users.index') }}" class="mx-2 font-extrabold text-black">Users</a>
        </div>
    </x-slot>

    @livewire('notification')
    @livewire('users.change-password')  
    @livewire('users.create')
    @livewire('users.index')

</x-app-layout>
