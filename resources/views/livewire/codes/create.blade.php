<div>
    <x-form-modal maxWidth="xl" wire:model.defer="isCreateModalOpen" submit="{{ $action }}">
        <x-slot name="title">
            {{ $form_title }} Codes
            <button type="button" wire:click="closeAddModal()" wire:loading.attr="disabled" class="absolute top-0 right-0 mt-4 mr-4 text-gray-500 hover:text-gray-700">
                <x-icons.solid.x class="w-6 h-6" />
            </button>
        </x-slot>
        <x-slot name="description"></x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-12">
                <div class="col-span-12">
                    <x-label :for="__('name')" :value="__('Name')" :errors="$errors"/>
                    <div class="relative">
                        <x-input id="name" class="block w-full mt-1" type="text" :name="__('name')" :value="old('name')" :errors="$errors" 
                                wire:model.defer="name"
                                wire:loading.attr="disabled"
                                wire:target='store, update'
                                required
                                autofocus
                        />
                        <x-input-error for="name"/>
                    </div>
                </div>
                <div class="col-span-12">
                    <x-label :for="__('code')" :value="__('Code')" :errors="$errors"/>
                    <div class="relative">
                        <x-input id="code" class="block w-full mt-1" type="text" :name="__('code')" :value="old('code')" :errors="$errors" 
                                wire:model.defer="code"
                                wire:loading.attr="disabled"
                                wire:target='store, update'
                                required
                                autofocus
                        />
                        <x-input-error for="code"/>
                    </div>
                </div>
                {{-- <div class="col-span-12">
                    <x-label :for="__('cvNo')" :value="__('CV No')" :errors="$errors"/>
                    <div class="relative">
                        <x-input id="cvNo" class="block w-full mt-1" type="text" :name="__('cvNo')" :value="old('cvNo')" :errors="$errors" 
                                wire:model.defer="cvNo"
                                wire:loading.attr="disabled"
                                wire:target='store, update'
                        />
                        <x-input-error for="cvNo"/>
                    </div>
                </div> --}}
                {{-- @if($form_title== 'Add')
                <div class="col-span-12">
                    <x-label :for="__('password')" :value="__('Password')" :errors="$errors"/>
                    <div class="relative">
                        <x-input id="password" class="block w-full mt-1" type="password" :name="__('password')" :value="old('password')" :errors="$errors" 
                                wire:model.defer="password"
                                wire:loading.attr="disabled"
                                wire:target='store'
                                required
                        />
                        <x-input-error for="password"/>
                    </div>
                </div>
                <div class="col-span-12">
                    <x-label :for="__('password_confirmation')" :value="__('Confirm Password')" :errors="$errors"/>
                    <div class="relative">
                        <x-input id="password_confirmation" class="block w-full mt-1" type="password" :name="__('password_confirmation')" :value="old('password_confirmation')" :errors="$errors" 
                                wire:model.defer="password_confirmation"
                                wire:loading.attr="disabled"
                                wire:target='store'
                                required
                        />
                        <x-input-error for="password_confirmation"/>
                    </div>
                </div>
                @endif --}}
                {{-- @if($form_title == 'Edit')
                <div class="col-span-12">
                    <x-label :for="__('status_id')" :value="__('Status')" :errors="$errors"/>
                    <div class="relative">
                        <x-select wire:model.defer="status_id" wire:loading.attr="disabled" wire:target="update" id="status_id" :name="__('status_id')" class="block w-full mt-1" :errors="$errors" required>
                            <option value="" selected>Select Status</option>
                            @foreach($statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error for="status_id"/>
                    </div>
                </div>
                @endif --}}
                {{-- <div class="col-span-12">
                    <x-label :for="__('default_location')" :value="__('Default Location')" :errors="$errors"/>
                    <div class="relative">
                        <x-select wire:model.defer="default_location" wire:loading.attr="disabled" wire:target="update" id="default_location" :name="__('default_location')" class="block w-full mt-1" :errors="$errors" required>
                            <option value="">Select Default Location</option>
                            @foreach($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error for="default_location"/>
                    </div>
                </div>
                <div class="col-span-12">
                    <fieldset>
                        <legend class="font-medium text-gray-900 text-sms">Locations</legend>
                        <div class="rounded-md checkbox-container">
                            <div class="mt-4 mb-4 ml-4 space-y-4">
                                @foreach($locations as $index => $location)
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input name="selected_locations[{{ $index }}]" id="selected_locations[{{ $index }}]" type="checkbox" value="{{ $location->id }}" class="w-4 h-4 text-green-800 border-gray-300 rounded focus:ring-green-700"
                                                wire:model="selected_locations"
                                                wire:loading.attr="disabled" 
                                                wire:target="update"
                                        />
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="selected_locations[{{ $index }}]" class="font-medium text-gray-700">{{ $location->name }}</label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </fieldset>
                </div> --}}
                {{-- <div class="col-span-12">
                    <fieldset>
                        <legend class="text-base font-medium text-gray-900">Roles</legend>
                        <div class="mt-4 space-y-4">
                            @foreach($permissions as $index => $role)
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input name="selected_roles[{{ $index }}]" id="selected_roles[{{ $index }}]" type="checkbox" value="{{ $role->id }}" class="w-4 h-4 text-green-800 border-gray-300 rounded focus:ring-green-700"
                                            wire:model.defer="selected_roles"
                                            wire:loading.attr="disabled" 
                                            wire:target="update"
                                    />
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="selected_roles[{{ $index }}]" class="font-medium text-gray-700">{{ $role->name }}</label>
                                    <p class="text-xs text-gray-500">{{ $role->description }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </fieldset>
                </div> --}}
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-button class="my-1 ml-3" wire:loading.attr="disabled" wire:target="store, update">
                <div wire:loading wire:target="store, update">
                    <x-icons.loading class="w-4 mr-2"/>
                </div>
                <x-icons.solid.paper-plane wire:loading.remove wire:target="store, update" class="w-4 h-4 mr-1 -mt-1 rotate-45"/>
                {{ $button_name }}
            </x-button>
        </x-slot>
    </x-form-modal>
</div>
