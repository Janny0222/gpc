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
                        <div class="flex items-center justify-end gap-4">
                            <x-button-link href="{{route('properties.add')}}">
                                Add Property
                            </x-button-link>
                        </div>
                    </div>
                    <div class="p-6 bg-white border-gray-200">
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
                            </x-slot>
                            <x-slot name="body">
                                @forelse($properties as $property)
                                <x-table-row>
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
                                                {{$property->area}}
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
                            {{ $properties->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
