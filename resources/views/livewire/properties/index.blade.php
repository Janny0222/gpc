<div >
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 bg-white border-gray-200">
                    <div class="flex justify-between items-center px-6 py-4 border-b font-bold">
                        <div class="flex justify-start gap-4">
                            <div class="relative">
                                <x-input id="search" class="block mt-1 w-full" type="text" :name="__('search')" placeholder="Search" wire:model="search"/>
                            </div>
                        </div>
                        <div class="flex justify-end items-center gap-4">
                            <x-button>
                                Add Property
                            </x-button>
                        </div>
                    </div>
                    <div class="p-6 bg-white border-gray-200">
                        <x-table>
                            <x-slot name="head">
                                <x-table-heading>
                                    Name
                                </x-table-heading>
                                <x-table-heading>
                                    LABEL 1
                                </x-table-heading>
                                <x-table-heading>
                                    LABEL 2
                                </x-table-heading>
                                <x-table-heading>
                                    ACTION
                                </x-table-heading>
                            </x-slot>
                            <x-slot name="body">
                                {{-- @forelse($pos as $po) --}}
                                <x-table-row>
                                    <x-table-cell>
                                        <div class="cursor-pointer">
                                            <div class="font-medium text-gray-900">
                                                {{-- {{ $po->po_no }} --}}
                                            </div>
                                        </div>
                                    </x-table-cell>
                                    <x-table-cell>
                                        <div class="cursor-pointer">
                                            <div class="font-medium text-gray-900">
                                                {{-- {{ $po->customer->name }} --}}
                                            </div>
                                        </div>
                                    </x-table-cell>
                                    <x-table-cell>
                                        <div class="cursor-pointer">
                                            <div class="font-medium text-gray-900">
                                                {{-- {{ $po->plant->name }} --}}
                                            </div>
                                        </div>
                                    </x-table-cell>
                                    <x-table-cell>
                                        <a href="#" 
                                            class="h-5 w-5 text-gray-600 hover:text-gray-500 font-bold cursor-pointer">
                                            Edit
                                        </a>
                                    </x-table-cell>
                                </x-table-row>
                                {{-- @empty
                                <x-table-row>
                                    <x-table-cell class="text-center" colspan="12">
                                        <div class="cursor-pointer">
                                            <div class="font-medium text-gray-900">
                                                No Record Found.
                                            </div>
                                        </div>
                                    </x-table-cell>
                                </x-table-row>
                                @endforelse --}}
                            </x-slot>
                        </x-table>
                        <div class="pt-3">
                            {{-- {{ $pos->withQueryString()->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
