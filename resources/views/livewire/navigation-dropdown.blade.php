<div>
    <div class="relative z-10">
        <div class="flex items-center justify-end px-5 py-5 text-gray-500">
            {{-- Baling Station --}}
            <div class="flex items-center mr-auto text-[25px] font-bold">
                <a
                    @click.prevent="handleOpen()"
                    class="pr-4 text-gray-700 hover:text-green-900 xl:hidden"
                    href="#"
                >
                    <svg
                        class="w-6 h-6"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>
                </a>
    
                <span class="text-green-700">Property Asset</span></span>
            </div>
    
            <!-- Settings Dropdown -->
            <div class="items-center hidden ml-6 xl:flex">
                {{-- <div class="relative mr-5">
                    <x-select wire:model="location" wire:loading.attr="disabled" wire:target="store" id="location" :name="__('location')" class="block w-full mt-1" :errors="$errors" required>
                        @foreach($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for="location"/>
                </div> --}}
    
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                            <div><span class="font-bold">{{ Auth::user()->name }}</span></div>
    
                            <div class="ml-1">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
    
                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
    
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center">
                                <x-icons.outline.logout class="w-5 h-5 mr-2"/>
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</div>
