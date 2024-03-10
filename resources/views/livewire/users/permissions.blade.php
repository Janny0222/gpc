<div>
    <div class="py-6 mx-auto sm:px-6">
        <div class="overflow-hidden bg-white shadow-sm">
            <div class="flex items-center justify-between p-6 font-bold border-b">
                <div class="flex justify-start">
                    <div class="text-gray-500">{{ $name }}</div>
                </div>
            </div>
            
            <div class="p-1 bg-white border-b border-gray-200">
            {{-- <input type="checkbox" id="select-all-checkbox" wire:model="selectAll" /> --}}

            <label for="select-all-checkbox">Select All</label>
                <form wire:submit.prevent="store">
                    <div class="columns-1 md:columns-2 2xl:columns-4 gap-8 [column-fill:_balance] box-border mx-auto before:box-inherit after:box-inherit">
                        <div class="mb-6 rounded-lg break-inside-avoid">
                        
                            <legend class="sr-only">Dashboard</legend>
                            <div class="text-base font-bold text-gray-900" aria-hidden="true">Dashboard</div>
                            
                            <div class="p-3 mt-4 space-y-4 border-2 rounded">
                                @foreach($dashboards as $dashboard)
                                @php $index++ @endphp
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input name="selected_permissions[{{ $index }}]" id="selected_permissions[{{ $index }}]" type="checkbox" value="{{ $dashboard->id }}" class="w-4 h-4 text-green-800 border-gray-300 rounded focus:ring-green-700"
                                                wire:model="selected_permissions"
                                                wire:loading.attr="disabled" 
                                                wire:target="store"
                                        />
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="selected_permissions[{{ $index }}]" class="font-medium text-gray-700 hover:cursor-pointer">{{ $dashboard->name }}</label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mb-6 rounded-lg break-inside-avoid">
                            <legend class="sr-only">Users</legend>
                            <div class="text-base font-bold text-gray-900" aria-hidden="true">Users</div>
                            <div class="p-3 mt-4 space-y-4 border-2 rounded">
                                @foreach($users as $user)
                                @php $index++ @endphp
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input name="selected_permissions[{{ $index }}]" id="selected_permissions[{{ $index }}]" type="checkbox" value="{{ $user->id }}" class="w-4 h-4 text-green-800 border-gray-300 rounded focus:ring-green-700"
                                                wire:model="selected_permissions"
                                                wire:loading.attr="disabled" 
                                                wire:target="store"
                                        />
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="selected_permissions[{{ $index }}]" class="font-medium text-gray-700 hover:cursor-pointer">{{ $user->name }}</label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        {{-- <div class="mb-6 rounded-lg break-inside-avoid">
                            <legend class="sr-only">Material Types</legend>
                            <div class="text-base font-bold text-gray-900" aria-hidden="true">Material Types</div>
                            <div class="p-3 mt-4 space-y-4 border-2 rounded">
                                @foreach($material_types as $material_type)
                                @php $index++ @endphp
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input name="selected_permissions[{{ $index }}]" id="selected_permissions[{{ $index }}]" type="checkbox" value="{{ $material_type->id }}" class="w-4 h-4 text-green-800 border-gray-300 rounded focus:ring-green-700"
                                                wire:model="selected_permissions"
                                                wire:loading.attr="disabled" 
                                                wire:target="store"
                                        />
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="selected_permissions[{{ $index }}]" class="font-medium text-gray-700 hover:cursor-pointer">{{ $material_type->name }}</label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div> --}}
                        {{-- <div class="mb-6 rounded-lg break-inside-avoid">
                            <legend class="sr-only">Locations</legend>
                            <div class="text-base font-bold text-gray-900" aria-hidden="true">Locations</div>
                            <div class="p-3 mt-4 space-y-4 border-2 rounded">
                                @foreach($locations as $location)
                                @php $index++ @endphp
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input name="selected_permissions[{{ $index }}]" id="selected_permissions[{{ $index }}]" type="checkbox" value="{{ $location->id }}" class="w-4 h-4 text-green-800 border-gray-300 rounded focus:ring-green-700"
                                                wire:model="selected_permissions"
                                                wire:loading.attr="disabled" 
                                                wire:target="store"
                                        />
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="selected_permissions[{{ $index }}]" class="font-medium text-gray-700 hover:cursor-pointer">{{ $location->name }}</label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div> --}}
                        {{-- <div class="mb-6 rounded-lg break-inside-avoid">
                            <legend class="sr-only">Volunteers</legend>
                            <div class="text-base font-bold text-gray-900" aria-hidden="true">Volunteers</div>
                            <div class="p-3 mt-4 space-y-4 border-2 rounded">
                                @foreach($volunteers as $volunteer)
                                @php $index++ @endphp
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input name="selected_permissions[{{ $index }}]" id="selected_permissions[{{ $index }}]" type="checkbox" value="{{ $volunteer->id }}" class="w-4 h-4 text-green-800 border-gray-300 rounded focus:ring-green-700"
                                                wire:model="selected_permissions"
                                                wire:loading.attr="disabled" 
                                                wire:target="store"
                                        />
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="selected_permissions[{{ $index }}]" class="font-medium text-gray-700 hover:cursor-pointer">{{ $volunteer->name }}</label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div> --}}
                        {{-- <div class="mb-6 rounded-lg break-inside-avoid">
                            <legend class="sr-only">Database</legend>
                            <div class="text-base font-bold text-gray-900" aria-hidden="true">Database</div>
                            <div class="p-3 mt-4 space-y-4 border-2 rounded">
                                @foreach($database_histories as $database_history)
                                @php $index++ @endphp
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input name="selected_permissions[{{ $index }}]" id="selected_permissions[{{ $index }}]" type="checkbox" value="{{ $database_history->id }}" class="w-4 h-4 text-green-800 border-gray-300 rounded focus:ring-green-700"
                                                wire:model="selected_permissions"
                                                wire:loading.attr="disabled" 
                                                wire:target="store"
                                        />
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="selected_permissions[{{ $index }}]" class="font-medium text-gray-700 hover:cursor-pointer">{{ $database_history->name }}</label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div> --}}
                    </div>
                    <div class="flex justify-end pt-8">
                        <x-button class="my-1" wire:loading.attr="disabled" wire:target="store">
                            <div wire:loading wire:target="store">
                                <x-icons.loading class="w-4 mr-2"/>
                            </div>
                            <x-icons.solid.save wire:loading.remove wire:target="store" class="w-4 h-4 mr-2"/>
                            {{ __('Save') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- @push('scripts')
<script>
    document.getElementById('select-all-checkbox').addEventListener('change', function () {
        var checkboxes = document.querySelectorAll('input[name^="selected_permissions"]');
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = event.target.checked;
        });
        // Trigger Livewire change event manually
        checkboxes.forEach(function (checkbox) {
            checkbox.dispatchEvent(new Event('change'));
        });
    });
</script>
@endpush --}}