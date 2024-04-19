<div class="bg-gray-200">
    <div class="py-8">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-2 bg-white border-gray-200">
                    <div class="flex items-center justify-between px-6 py-4 font-bold border-b">
                        <div class="flex justify-start gap-4">
                            <div class="relative">
                                <x-input id="search" class="block w-full mt-1" type="text" :name="__('search')" placeholder="Search" wire:model="search"/>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-4 ml-auto">
                            <x-button wire:click="$emitTo('properties.add-lot-modal', 'open-add-modal')" class="w-full bg-green-700 xl:w-auto">
                                <x-icons.solid.user-plus class="w-4 h-4 mr-2"/>
                                Add Lot
                            </x-button>
                        </div>
                    </div>
                    <div class="p-6 bg-white border-gray-400">
                    
                        <x-table>
                            <x-slot name="head">
                                <x-table-heading>
                                    AREA
                                </x-table-heading>
                                <x-table-heading>
                                    TCT
                                </x-table-heading>
                                <x-table-heading>
                                    Actions
                                </x-table-heading>
                            </x-slot>
                            <x-slot name="body" class="">
                                 {{-- @forelse($users as $user)  --}}
                                 @forelse ($lot as $lots)
                                <x-table-row wire:click="">
                                    <x-table-cell>
                                        <div class="cursor-pointer">
                                            <div class="font-medium text-gray-900">
                                                 {{-- {{ $user->name }} --}}
                                                 {{ $lots->area }}

                                            </div>
                                        </div>
                                    </x-table-cell>
                                    <x-table-cell>
                                        <div class="cursor-pointer">
                                            <div class="font-medium text-gray-900">
                                               {{-- {{ $user->email }}  --}}
                                                {{ $lots->tct }}
                                            </div>
                                        </div>
                                    </x-table-cell>
            
                                    {{-- <x-table-cell>
                                        <div class="cursor-pointer">
                                            <div class="font-medium text-white rounded">
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
                                    </x-table-cell> --}}
                                    <x-table-cell>
                                        <div class="flex items-center justify-center gap-3 cursor-pointer">
                                            <a wire:click="$emitTo('properties.add-lot-modal', 'open-edit-modal', {{$lots->id}})" 
                                                class="font-bold text-gray-600 cursor-pointer hover:text-green-500">
                                                Edit
                                            </a>
                                            
                                        </div>
                                    </x-table-cell>
                                     {{-- @endforeach --}}
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
                             {{ $lot->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
