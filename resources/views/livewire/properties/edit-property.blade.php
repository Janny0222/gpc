<div>
    <x-form-modal maxWidth="xl" wire:model.defer="isCreateModalOpen" submit="{{ $action }}">
        <x-slot name="title">
            {{ $form_title }} Property
            <button type="button" wire:click="closeModal()" wire:loading.attr="disabled" class="absolute top-0 right-0 mt-4 mr-4 text-gray-500 hover:text-gray-700">
                <x-icons.solid.x class="w-6 h-6" />
            </button>
        </x-slot>
        <x-slot name="description"></x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-12">
                <div class="col-span-12">
                    <x-label :for="__('cvno')" :value="__('CV No.')" :errors="$errors"/>
                    <div class="relative">
                        <x-input id="cvno" class="block w-full mt-1" :name="__('cvno')" :value="old('cvno')"
                            wire:model.defer="cvno"
                            wire:loading.attr="disabled"
                            wire:target='update'
                            required
                            disabled
                        />
                    </div>
                </div>
                <div class="col-span-12">
                    <x-label :for="__('address')" :value="__('Location or Address')" :errors="$errors"/>
                    <div class="relative">
                        <x-input id="address" class="block w-full mt-1" type="text" :name="__('address')" :value="old('address')" :errors="$errors" 
                                wire:model.defer="address"
                                wire:loading.attr="disabled"
                                wire:target='update'
                                required
                                autofocus
                        />
                        <x-input-error for="address"/>
                    </div>
                </div>
                <div class="col-span-12">
                    <x-label :for="__('lot_id')" :value="__('AREA')" :errors="$errors"/>
                    <div class="relative">
                        <x-select id="lot_id" class="block w-full mt-1" :name="__('lot_id')" :value="old('lot_id')"
                            wire:model.defer="lot_id"
                            wire:loading.attr="disabled"
                            wire:target='update'
                            required
                            autofocus
                        >
                        <option value="">Select Area</option>
                                @foreach ($lot as $l)
                                    <option value="{{$l->id}}">{{$l->area}}</option>
                                @endforeach
                        </x-select>
                    </div>
                </div>                
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-button class="my-1 ml-3" wire:loading.attr="disabled" wire:target="update">
                <div wire:loading wire:target="update">
                    <x-icons.loading class="w-4 mr-2"/>
                </div>
                <x-icons.solid.paper-plane wire:loading.remove wire:target="update" class="w-4 h-4 mr-1 -mt-1 rotate-45"/>
                {{ $button_name }}
            </x-button>
        </x-slot>
    </x-form-modal>
</div>


