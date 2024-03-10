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
                            <x-button wire:click="$emitTo('companies.create', 'open-create-modal')" class="w-full bg-green-700 xl:w-auto">
                                <x-icons.solid.user-plus class="w-4 h-4 mr-2"/>
                                Add Company
                            </x-button>
                        </div>
                        {{-- <div class="relative">
                        <x-select id="codes" class="block w-full mt-1" :name="__('codes')" :value="old('codes')"
                            wire:model.defer="codes"
                            wire:loading.attr="disabled"
                            wire:target='store'
                            required
                            autofocus
                        >
                            <option value="">Select Code</option>
                            @if(isset($codes))
                                @foreach ($codes as $code)
                                    <option value="{{$code->code}}">{{$code->name}}</option>
                                @endforeach
                            @endif
                        </x-select>
                        </div> --}}
                    </div>
                    <div class="p-6 bg-white border-gray-400">
                    
                        <x-table>
                            <x-slot name="head">
                                <x-table-heading>
                                    Code
                                </x-table-heading>
                                <x-table-heading>
                                    Company Name
                                </x-table-heading>
                                <x-table-heading>
                                    Owner's Name
                                </x-table-heading>
                                <x-table-heading>
                                    TIN
                                </x-table-heading>
                                <x-table-heading>
                                    Registered Address
                                </x-table-heading>
                                <x-table-heading>
                                    Action
                                </x-table-heading>
                            </x-slot>
                            <x-slot name="body">
                                 
                                 @forelse ($company as $comp)
                                <x-table-row>
                                    <x-table-cell>
                                        <div class="cursor-pointer">
                                            <div class="font-medium text-gray-900">
                                                {{ $comp->codes }} 
                                            </div>
                                        </div>
                                    </x-table-cell>
                                    <x-table-cell>
                                        <div class="cursor-pointer">
                                            <div class="font-medium text-gray-900">
                                                {{ $comp->company_name }}
                                            </div>
                                        </div>
                                    </x-table-cell>
            
                                    <x-table-cell>
                                        <div class="cursor-pointer">
                                            <div class="font-medium text-gray-900 rounded">                                                
                                                 {{ $comp->owners_name }}
                                            </div>
                                        </div>
                                    </x-table-cell>
                                    <x-table-cell>
                                        <div class="cursor-pointer">
                                            <div class="font-medium text-gray-900">
                                                 {{ $comp->tin }}
                                            </div>
                                        </div>
                                    </x-table-cell>
                                    <x-table-cell>
                                        <div class="cursor-pointer">
                                            <div class="font-medium text-gray-900">
                                                 {{ $comp->address }}
                                            </div>
                                        </div>
                                    </x-table-cell>
                                    <x-table-cell>
                                        <div class="flex items-center justify-center gap-3 cursor-pointer">
                                            <a wire:click="$emitTo('companies.create', 'open-edit-modal', {{$comp->id}})" 
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
                             {{ $company->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
