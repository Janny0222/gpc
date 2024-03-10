<div class="mx-10">
    <form action="store" wire:submit.prevent="store">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-12">
        
            <div class="col-span-6">
                <x-label :for="__('cvno')" :value="__('CV No.')"/>
                <div class="relative col-span-6">
                    <x-input disabled id="cvno" class="block w-full mt-1" type="text" name="cvno"
                        wire:model.defer="cvno"
                        wire:loading.attr="disabled"
                        wire:target='store'
                        required
                        autofocus
                    />
                    <x-input-error for="cvno"/>
                </div>
            </div>
            <div class="col-span-6">
                <x-label :for="__('address')" :value="__('Location or Address')" :errors="$errors"/>
                <div class="relative">
                    <x-input id="address" class="block w-full mt-1" type="text" :name="__('address')" :value="old('address')" :errors="$errors"
                        wire:model.defer="address"
                        wire:loading.attr="disabled"
                        wire:target='store'
                        autofocus
                    />
                    <x-input-error for="address"/>
                </div>
            </div>
                <div class="col-span-3">
                    <x-label :for="__('area')" :value="__('AREA')"/>
                    <div class="relative">
                        <x-select id="area" class="block w-full mt-1" :name="__('area')" :value="old('area')"
                        wire:model.defer="area"
                        wire:loading.attr="disabled"
                        wire:target='store'
                        autofocus
                        >
                                    <option value="">Select Lot </option>
                            @foreach ($lot as $l)
                                    <option value="{{$l->area}}">{{$l->area}}</option>
                                    <!-- Add more options as needed -->
                            @endforeach
                        </x-select>
                        <x-input-error for="area"/>
                    </div>
                </div>
        
            <div class="flex items-center justify-between col-span-12">
                <x-button-link href="{{route ('property.add-lot')}}" class="my-1" wire:loading.attr="disabled" wire:target="">
                    Add Lot
                </x-button-link>
                <x-button wire:click.prevent="$emitTo('properties.add-warehouse', 'open-add-modal')" class="my-1">
                    Warehouse
                </x-button>
                <x-button-link href="#" class="my-1" wire:loading.attr="disabled" wire:target="">
                    Projects
                </x-button-link>
            </div>
            {{-- <div class="items-center justify-between col-span-4 ">
                <x-label for="area" value="AREA" />
                <x-input id="area" disabled class="block w-full mt-1" type="text" name="area" wire:model="area"/>
                <x-label for="tct" value="TCT" />
                <x-input id="tct" disabled class="block w-full mt-1" type="text" name="tct" wire:model='tct'/>
            </div>
            <div class="items-center justify-between col-span-4 ">
                <x-label for="note1" value="Note 1" />
                <x-input id="note1" disabled class="block w-full mt-1" type="text" name="note1" wire:model="note1"/>
                <x-label for="note2" value="Note 2" />
                <x-input id="note2" disabled class="block w-full mt-1" type="text" name="note2" wire:model='note2'/>
            </div> --}}
        
        </div>
        <div class="flex justify-end pt-8">
            {{-- <x-button type="button" wire:click="closeCreateModal()" wire:loading.attr="disabled" wire:target="store, update" class="my-1 ml-3">
                <x-icons.solid.x class="w-4 h-4 mr-2"/>
                {{ __('Cancel') }}
            </x-button> --}}
            <x-button class="my-1 ml-3" wire:loading.attr="disabled" wire:target="store">
                <div wire:loading wire:target="store">
                    <x-icons.loading class="w-4 mr-2"/>
                </div>
                <x-icons.solid.paper-plane wire:loading.remove wire:target="store" class="w-4 h-4 mr-1 -mt-1 rotate-45"/>
                {{ __('SAVE') }}
            </x-button>
        </div>
    </form>
</div>


