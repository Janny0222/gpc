<div>
    <x-form-modal maxWidth="xl" wire:model.defer="isCreateModalOpen" submit="{{ $action }}">
        <x-slot name="title">
            {{ $form_title }} Company
            <button type="button" wire:click="closeAddModal()" wire:loading.attr="disabled" class="absolute top-0 right-0 mt-4 mr-4 text-gray-500 hover:text-gray-700">
                <x-icons.solid.x class="w-6 h-6" />
            </button>
        </x-slot>
        <x-slot name="description"></x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-12">
                <div class="col-span-12">
                    <x-label :for="__('code_id')" :value="__('Code')" :errors="$errors"/>
                    <div class="relative">
                        <select id="code_id" class="block w-full mt-1 py-2 border-gray-300 border rounded-md shadow-sm focus:outline-none focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" :name="__('code_id')" :value="old('code_id')"
                            wire:model.defer="code_id"
                            wire:loading.attr="disabled"
                            wire:target='store, update'
                            required
                            autofocus
                        >
                            <option value="" disabled selected class="text-gray-500">Select Code</option>
                                @foreach ($cv as $code)
                                    <option class="py-5 line-through" value="{{$code->id}}">{{$code->code}}</option>
                                @endforeach
                        </select>
                        
                    </div>
                </div>
                <div class="col-span-12">
                    <x-label :for="__('company_name')" :value="__('Company Name')" :errors="$errors"/>
                    <div class="relative">
                        <x-input id="company_name" class="block w-full mt-1" type="text" :name="__('owners_name')" :value="old('company_name')" :errors="$errors" 
                                wire:model.defer="company_name"
                                wire:loading.attr="disabled"
                                wire:target='store, update'
                                required
                                autofocus
                        />
                        <x-input-error for="company_name"/>
                    </div>
                </div>
                <div class="col-span-12">
                    <x-label :for="__('owners_name')" :value="__('Owners Name')" :errors="$errors"/>
                    <div class="relative">
                        <x-input id="owners_name" class="block w-full mt-1" type="text" :name="__('owners_name')" :value="old('owners_name')" :errors="$errors" 
                                wire:model.defer="owners_name"
                                wire:loading.attr="disabled"
                                wire:target='store, update'
                                required
                                autofocus
                        />
                        <x-input-error for="owners_name"/>
                    </div>
                </div>
                <div class="col-span-12">
                    <x-label :for="__('tin')" :value="__('TIN')" :errors="$errors"/>
                    <div class="relative">
                        <x-input id="tin" class="block w-full mt-1" type="text" :name="__('tin')" :value="old('tin')" :errors="$errors" 
                                wire:model.defer="tin"
                                wire:loading.attr="disabled"
                                wire:target='store, update'
                                required
                                autofocus
                        />
                        <x-input-error for="tin"/>
                    </div>
                </div>
                <div class="col-span-12">
                    <x-label :for="__('address')" :value="__('Registered Address')" :errors="$errors"/>
                    <div class="relative">
                        <x-input id="address" class="block w-full mt-1" type="text" :name="__('address')" :value="old('address')" :errors="$errors" 
                                wire:model.defer="address"
                                wire:loading.attr="disabled"
                                wire:target='store, update'
                                required
                                autofocus
                        />
                        <x-input-error for="address"/>
                    </div>
                </div>
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
