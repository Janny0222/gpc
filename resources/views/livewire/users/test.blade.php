<div>
    <x-form-modal maxWidth="xl" wire:model.defer="isCreateModalOpen" submit="{{ $action }}">
        <x-slot name="title">
            {{ $form_title }} User
        </x-slot>
        <x-slot name="description"></x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-1 sm:grid-cols-12 gap-6">
                <div class="col-span-12">
                    <x-label :for="__('name')" :value="__('Name')" :errors="$errors"/>
                    <div class="relative">
                        <x-input id="name" class="block mt-1 w-full" type="text" :name="__('name')" :value="old('name')" :errors="$errors" 
                                wire:model.defer="name"
                                wire:loading.attr="disabled"
                                wire:target='store'
                                required
                                autofocus
                        />
                        <x-input-error for="name"/>
                    </div>
                </div>
                <div class="col-span-12">
                    <x-label :for="__('username')" :value="__('Username')" :errors="$errors"/>
                    <div class="relative">
                        <x-input id="username" class="block mt-1 w-full" type="text" :name="__('username')" :value="old('username')" :errors="$errors" 
                                wire:model.defer="username"
                                wire:loading.attr="disabled"
                                wire:target='store'
                                required
                                autofocus
                        />
                        <x-input-error for="username"/>
                    </div>
                </div>
                <div class="col-span-12">
                    <x-label :for="__('email')" :value="__('Email')" :errors="$errors"/>
                    <div class="relative">
                        <x-input id="email" class="block mt-1 w-full" type="email" :name="__('email')" :value="old('email')" :errors="$errors" 
                                wire:model.defer="email"
                                wire:loading.attr="disabled"
                                wire:target='store'
                        />
                        <x-input-error for="email"/>
                    </div>
                </div>
                @if($form_title== 'Add')
                <div class="col-span-12">
                    <x-label :for="__('password')" :value="__('Password')" :errors="$errors"/>
                    <div class="relative">
                        <x-input id="password" class="block mt-1 w-full" type="password" :name="__('password')" :value="old('password')" :errors="$errors" 
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
                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" :name="__('password_confirmation')" :value="old('password_confirmation')" :errors="$errors" 
                                wire:model.defer="password_confirmation"
                                wire:loading.attr="disabled"
                                wire:target='store'
                                required
                        />
                        <x-input-error for="password_confirmation"/>
                    </div>
                </div>
                @endif
                @if($form_title == 'Edit')
                <div class="col-span-12">
                    <x-label :for="__('status_id')" :value="__('Status')" :errors="$errors"/>
                    <div class="relative">
                        <x-select wire:model.defer="status_id" wire:loading.attr="disabled" wire:target="update" id="status_id" :name="__('status_id')" class="block mt-1 w-full" :errors="$errors" required>
                            <option value="" selected>Select Status</option>
                            @foreach($statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error for="status_id"/>
                    </div>
                </div>
                @endif
                <div class="col-span-12">
                    <x-label :for="__('default_location')" :value="__('Default Location')" :errors="$errors"/>
                    <div class="relative">
                        <x-select wire:model.defer="default_location" wire:loading.attr="disabled" wire:target="update" id="default_location" :name="__('default_location')" class="block mt-1 w-full" :errors="$errors" required>
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
                        <legend class="text-sms font-medium text-gray-900">Locations</legend>
                        <div class="checkbox-container rounded-md">
                            <div class="mt-4 ml-4 mb-4 space-y-4">
                                @foreach($locations as $index => $location)
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input name="selected_locations[{{ $index }}]" id="selected_locations[{{ $index }}]" type="checkbox" value="{{ $location->id }}" class="focus:ring-green-700 h-4 w-4 text-green-800 border-gray-300 rounded"
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
                </div>
                {{-- <div class="col-span-12">
                    <fieldset>
                        <legend class="text-base font-medium text-gray-900">Roles</legend>
                        <div class="mt-4 space-y-4">
                            @foreach($permissions as $index => $role)
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input name="selected_roles[{{ $index }}]" id="selected_roles[{{ $index }}]" type="checkbox" value="{{ $role->id }}" class="focus:ring-green-700 h-4 w-4 text-green-800 border-gray-300 rounded"
                                            wire:model.defer="selected_roles"
                                            wire:loading.attr="disabled" 
                                            wire:target="update"
                                    />
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="selected_roles[{{ $index }}]" class="font-medium text-gray-700">{{ $role->name }}</label>
                                    <p class="text-gray-500 text-xs">{{ $role->description }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </fieldset>
                </div> --}}
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-button type="button" wire:click="closeCreateModal()" wire:loading.attr="disabled" wire:target="store, update" class="ml-3 my-1">
                <x-icons.solid.x class="h-4 w-4 mr-2"/>
                {{ __('Cancel') }}
            </x-button>
            <x-button class="ml-3 my-1" wire:loading.attr="disabled" wire:target="store, update">
                <div wire:loading wire:target="store, update">
                    <x-icons.loading class="w-4 mr-2"/>
                </div>
                <x-icons.solid.paper-plane wire:loading.remove wire:target="store, update" class="h-4 w-4 mr-1 -mt-1 rotate-45"/>
                {{ $button_name }}
            </x-button>
        </x-slot>
    </x-form-modal>
</div>
