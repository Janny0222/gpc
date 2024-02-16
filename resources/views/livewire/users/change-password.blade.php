<div>
    <x-form-modal maxWidth="md" wire:model.defer="isChangePasswordModalOpen" submit="changePassword">
        <x-slot name="title">
            Change {{ $name }}'s Password
        </x-slot>
        <x-slot name="description"></x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-12">
                <div class="col-span-12">
                    <x-label :for="__('password')" :value="__('Password')" :errors="$errors"/>

                    <div class="relative">
                        <x-input id="password" class="block w-full mt-1" type="password" :name="__('password')" :value="old('password')" :errors="$errors" 
                                wire:model.defer="password"
                                wire:loading.attr="disabled"
                                wire:target='store'
                                required
                                autofocus
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
                                autofocus
                        />
                        <x-input-error for="password_confirmation"/>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
                <x-button type="button" wire:click="closeChangePasswordModal()" wire:loading.attr="disabled" wire:target="changePassword" class="my-1 ml-3">
                    <x-icons.solid.x class="w-4 h-4 mr-2"/>
                    {{ __('Cancel') }}
                </x-button>
                <x-button class="my-1 ml-3" wire:loading.attr="disabled" wire:target="changePassword">
                    <div wire:loading wire:target="changePassword">
                        <x-icons.loading class="w-4 mr-2"/>
                    </div>
                    <x-icons.solid.paper-plane wire:loading.remove wire:target="changePassword" class="w-4 h-4 mr-1 -mt-1 rotate-45"/>
                    {{ __('Update') }}
                </x-button>
        </x-slot>
    </x-form-modal>
</div>
