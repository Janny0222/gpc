<x-app-layout>
    <x-slot name="header">
        {{-- Breadcrumbs --}}
        <div class="flex justify-start items-center text-gray-500 font-bold text-lg">
            <div class="text-gray-800 mx-2">Test</div>
        </div>
    </x-slot>

    {{-- @livewire('notification') --}}
    {{-- @livewire('users.create') --}}
    @livewire('users.test')

</x-app-layout>
