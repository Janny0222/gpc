<x-app-layout>
    <x-slot name="header">
        {{-- Breadcrumbs --}}
        <div class="flex items-center justify-start font-bold text-gray-500">
            <a href="{{ route('dashboard') }}"><x-icons.solid.home class="w-6 h-6"></x-icons.solid.home></a>
            <x-icons.outline.chevron-right class="w-5 h-5"></x-icons.outline.chevron-right>
            <a href="#" class="mx-2">Maintenance</a>
            <x-icons.outline.chevron-right class="w-5 h-5"></x-icons.outline.chevron-right>
            <a href="{{ route('users.index') }}" class="mx-2">Users</a>
            <x-icons.outline.chevron-right class="w-5 h-5"></x-icons.outline.chevron-right>
            <div class="mx-2 text-green-600">Permissions</div>
        </div>
    </x-slot>

    @livewire('notification')
    @livewire('users.permissions', ['uid' => $uid])

</x-app-layout>