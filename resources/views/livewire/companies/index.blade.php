<div class="bg-gray-200 font-rubik">
    <div class="py-8">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-2 bg-white border-gray-200">
                    <div class="flex items-center justify-between px-6 py-4 font-bold border-b">
                        <div class="flex justify-start gap-4">
                            <div class="relative">
                                <x-input id="search" class="block w-full pl-8 pr-1 mt-1" type="text" :name="__('search')" placeholder="Search" wire:model="search"/>
                                <div class="absolute left-3 top-1/2 h-[18px] w-[18px] -translate-y-1/2 text-gray-500 peer-focus:text-gray-900">
                                    <x-icons.solid.magnifying-glass class="w-5 h-5 text-gray-400" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-4 ml-auto">
                            <x-button wire:click="$emitTo('companies.create', 'open-create-modal')" class="w-full bg-green-700 xl:w-auto">
                                <x-icons.solid.home-modern class="w-4 h-4 mr-2"/>
                                Add Company
                            </x-button>
                        </div>
                    </div>
                    <div class=" bg-white border-gray-400">
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
                                <x-button-link href="{{route('companies.archive')}}" class="w-full dark:bg-gray-800 xl:w-auto">
                                    <x-icons.solid.archive-box class="w-4 h-4 mr-2"/>
                                    Show Archive
                                </x-button-link>
                            </div>
                        </div>
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
                                    Active
                                </x-table-heading>
                                <x-table-heading>
                                    Action
                                </x-table-heading>
                            </x-slot>
                            <x-slot name="body">
                                 
                                @forelse ($company as $comp)
                                    <x-table-row id="company-row-{{ $comp->id }}" class="{{ $comp->id == $updatedRowId ? 'test' : '' }}">
                                        <x-table-cell>
                                            <div class="cursor-pointer">
                                                <div class="font-medium text-gray-900" >
                                                    {{ $comp->code->code }} 
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
                                            <div class="cursor-pointer">
                                                <div class="flex justify-center font-mediumrounded">
                                                    <x-icons.solid.check-circle class="w-5 h-5   mr-2  text-green-800 bg-white"/>
                                                </div>
                                            </div>
                                        </x-table-cell>
                                        <x-table-cell>
                                            <div class="flex items-center justify-center gap-3 cursor-pointer">
                                                <a wire:click="$emitTo('companies.create', 'open-edit-modal', {{$comp->id}})" 
                                                    class="font-bold text-gray-600 cursor-pointer hover:text-green-500">
                                                    Edit
                                                </a>
                                                |
                                                {{-- <a wire:click="archive({{$comp->id}})" 
                                                    class="font-bold text-gray-600 cursor-pointer hover:text-green-500"> --}}
                                                <a x-on:click="if (confirm('Are you sure you want to archive this company?')) { $wire.archive({{$comp->id}}) }"
                                                        class="font-bold text-gray-600 cursor-pointer hover:text-green-500">
                                                    Archive
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
@push('styles')
    <style>
        /* CSS styles for the highlight effect */
        .test {
            background-color: #9AE6B4; /* Highlight color */
            transition: background-color .5s ease-in; /* Transition for fading effect */
        }
       
        
    </style>
@endpush

@push('scripts')
    <script>
       document.addEventListener('livewire:load', function () {
        Livewire.on('highlight-company', function (data) {
            // Add a class to highlight the updated row
            document.getElementById('company-row-' + data.id).classList.add('test');
            
        });
        Livewire.on('reset-highlighted-company', function (data) {
            setTimeout(function () {
                document.querySelectorAll('.test').forEach(function (element) {
                        element.classList.remove('test');
                    });
                }, data.delay);
                
            });
        });
    </script>
@endpush