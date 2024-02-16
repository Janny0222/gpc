<x-app-layout>
    <x-slot name="header">
        {{-- Breadcrumbs --}}
        <div class="flex items-center justify-start text-lg font-bold text-gray-500">
            <div class="mx-2 text-gray-800">User</div>
        </div>
    </x-slot>

    @livewire('notification')
    @livewire('users.change-password')  
    @livewire('users.create')
    @livewire('users.index')

</x-app-layout>
