<div>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-2 bg-white border-gray-200">
                    <div class="flex items-center justify-between px-6 py-4 font-bold border-b">
                        <div class="flex justify-start gap-4">
                            <div class="relative">
                                <x-input id="search" class="block w-full mt-1" type="text" :name="__('search')" placeholder="Search" wire:model="search"/>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-4 ml-auto">
                            <x-button wire:click="$emitTo('users.create', 'open-create-modal')" class="w-full bg-green-700 xl:w-auto">
                                <x-icons.solid.user-plus class="w-4 h-4 mr-2"/>
                                Add User
                            </x-button>
                        </div>
                    </div>
                    <div class="p-6 bg-white border-gray-400">
                    
                        <x-table>
                            <x-slot name="head">
                                <x-table-heading>
                                    Name
                                </x-table-heading>
                                <x-table-heading>
                                    Email
                                </x-table-heading>
                                <x-table-heading>
                                    Username
                                </x-table-heading>
                                <x-table-heading>
                                    Status
                                </x-table-heading>
                                <x-table-heading>
                                    Created_at
                                </x-table-heading>
                                <x-table-heading>
                                    Action
                                </x-table-heading>
                            </x-slot>
                            <x-slot name="body">
                                 @forelse($users as $user) 
                                <x-table-row>
                                    <x-table-cell>
                                        <div class="cursor-pointer">
                                            <div class="font-medium text-gray-900">
                                                 {{ $user->name }}

                                            </div>
                                        </div>
                                    </x-table-cell>
                                    <x-table-cell>
                                        <div class="cursor-pointer">
                                            <div class="font-medium text-gray-900">
                                               {{ $user->email }} 
                                            </div>
                                        </div>
                                    </x-table-cell>
                                    <x-table-cell>
                                        <div class="cursor-pointer">
                                            <div class="font-medium text-gray-900">
                                                 {{ $user->username }} 
                                            </div>
                                        </div>
                                    </x-table-cell>
                                    <x-table-cell>
                                        <div class="cursor-pointer">
                                            <div class="font-medium text-white rounded
                                            @if($user->status_id == 1) bg-green-800 @else bg-red-800 @endif">
                                                
                                                 {{ $user->status->name }} 
                                            </div>
                                        </div>
                                    </x-table-cell>
                                    <x-table-cell>
                                        <div class="cursor-pointer">
                                            <div class="font-medium text-gray-900">
                                                 {{ $user->created_at }} 
                                            </div>
                                        </div>
                                    </x-table-cell>
                                    <x-table-cell>
                                        <div class="flex items-center justify-center gap-3 cursor-pointer">
                                            <a wire:click="$emitTo('users.create', 'open-edit-modal', {{$user->id}})" 
                                                class="font-bold text-gray-600 cursor-pointer hover:text-green-500">
                                                Edit
                                            </a>
                                            <div>
                                                |
                                            </div>
                                            <a href="{{route ('users.permissions', $user->id)}}" 
                                                class="font-bold text-gray-600 cursor-pointer hover:text-green-500">
                                                Permissions
                                            </a>
                                            <div>
                                                |
                                            </div>
                                            <a wire:click="$emitTo('users.change-password', 'open-change-password-modal', {{ $user->id }})" 
                                                class="font-bold text-gray-600 cursor-pointer hover:text-green-500">
                                                Change Pass
                                            </a>
                                        </div>
                                    </x-table-cell>
                                </x-table-row>
                                 @empty
                                <x-table-row>
                                    <x-table-cell class="text-center" colspan="12">
                                        <div class="cursor-pointer">
                                            <div class="font-medium text-gray-900">
                                                No Record Found.
                                            </div>
                                        </div>
                                    </x-table-cell>
                                </x-table-row>
                                @endforelse
                            </x-slot>
                        </x-table>
                        <div class="pt-3">
                             {{ $users->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
