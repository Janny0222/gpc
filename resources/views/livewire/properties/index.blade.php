<div class="bg-gray-200">
    <div class="py-8">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-2 bg-white border-gray-200">
                    <div class="flex items-center justify-between px-6 py-4 font-bold border-b">
                        <div class="flex justify-start gap-4">
                            <div class="relative">
                                <x-input id="search" class="block w-full pl-8 pr-1 mt-1" type="text" :name="__('search')" placeholder="Search " wire:model="search"/>
                                <div class="absolute left-3 top-1/2 h-[18px] w-[18px] -translate-y-1/2 text-gray-500 peer-focus:text-gray-900">
                                    <x-icons.solid.magnifying-glass class="w-5 h-5 text-gray-400" />
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-end gap-4">
                            <x-button-link href="{{route('properties.add')}}" class="bg-green-700">
                            <x-icons.solid.plus-circle class="w-4 h-4 mr-2"/>
                                Add Property
                            </x-button-link>
                        </div>
                    </div>
                    <div class=" bg-white border-gray-200">
                        <div class="flex items-center justify-between px-6 py-4 font-bold border-b">
                            <div class="justify-start hidden">
                                <div class="relative hidden">
                                    <x-input id="search" class="block w-full mt-1 pl-8 pr-1" type="text" :name="__('search')" placeholder="Search" wire:model="search"/>
                                    <div class="absolute left-3 top-1/2 h-[18px] w-[18px] -translate-y-1/2 text-gray-500 peer-focus:text-gray-900">
                                        <x-icons.solid.magnifying-glass class="w-5 h-5 text-gray-400" />
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex items-center ml-auto">
                                <x-button-link href="{{route ('properties.archive')}}" class="w-full dark:bg-gray-800 xl:w-auto">
                                    <x-icons.solid.archive-box class="w-4 h-4 mr-2"/>
                                    Show Archive
                                </x-button-link>
                            </div>
                        </div>
                        <x-table>
                            <x-slot name="head">
                                <x-table-heading>
                                    CV No.
                                </x-table-heading>
                                <x-table-heading>
                                    Address
                                </x-table-heading>
                                <x-table-heading>
                                    Area
                                </x-table-heading>
                                <x-table-heading>
                                    Warehouse
                                </x-table-heading>
                                <x-table-heading>
                                    Project
                                </x-table-heading>
                                <x-table-heading>
                                    Active
                                </x-table-heading>
                                <x-table-heading>
                                    Action
                                </x-table-heading>
                            </x-slot>
                            <x-slot name="body">
                                @forelse($properties as $property)
                                <x-table-row id='property-row-{{$property->id}}' class="{{$property->id === $updatedRowId ? 'highlight' : '' }}">
                                    <x-table-cell>
                                        <div class="cursor-pointer">
                                            <div class="font-medium text-gray-900">
                                                {{-- {{ $po->po_no }} --}}
                                                {{$property->cvno}}
                                            </div>
                                        </div>
                                    </x-table-cell>
                                    <x-table-cell>
                                        <div class="cursor-pointer">
                                            <div class="font-medium text-gray-900">
                                                {{-- {{ $po->customer->name }} --}}
                                                {{$property->address}}
                                            </div>
                                        </div>
                                    </x-table-cell>
                                    <x-table-cell>
                                        <div class="cursor-pointer">
                                            <div class="font-medium text-gray-900">
                                                {{-- {{ $po->plant->name }} --}}
                                                <a href="https://www.google.com/">{{$property->lot->area}}</a>
                                                
                                            </div>
                                        </div>
                                    </x-table-cell>
                                    <x-table-cell>
                                        <div class="cursor-pointer">
                                            <div class="font-medium text-gray-900">
                                                {{-- {{ $po->plant->name }} --}}
                                                {{$property->warehouse}}
                                            </div>
                                        </div>
                                    </x-table-cell>
                                    <x-table-cell>
                                        <div class="cursor-pointer">
                                            <div class="font-medium text-gray-900">
                                                {{-- {{ $po->plant->name }} --}}
                                                {{$property->project}}
                                            </div>
                                        </div>
                                    </x-table-cell>
                                    <x-table-cell>
                                        <div class="text-center">
                                            <div class="font-medium flex justify-center rounded-none">
                                                {{-- {{ $po->plant->name }} --}}
                                                <x-icons.solid.check-circle class="w-5 h-5 mr-2  text-green-800 bg-white"/>
                                            </div>
                                        </div>
                                    </x-table-cell>
                                    <x-table-cell>
                                        <div class="flex items-center justify-center gap-3 cursor-pointer">
                                            <a wire:click="$emitTo('properties.edit-property', 'open-edit-modal' , {{$property->id}} )" 
                                                class="font-bold text-gray-600 cursor-pointer hover:text-green-500">
                                                Edit
                                            </a>
                                            |
                                            <a wire:click="archive({{$property->id}})" 
                                                class="font-bold text-gray-600 cursor-pointer hover:text-green-500">
                                                Archive
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
                            {{ $properties->withQueryString()->links()}}
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('styles')
    <style>
        .highlight {
            background-color: #9AE6B4;
            transition: background-color .5s ease-in;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('highlight-property', function (data) {
                document.getElementById('property-row-' + data.id).classList.add('highlight');
            });
            Livewire.on('reset-highlighted-property', function (data) {
                setTimeout( function () {
                    document.querySelectorAll('.highlight').forEach(function (element) {
                        element.classList.remove('highlight')
                    });
                }, data.delay);
            })
        })
    </script>
@endpush