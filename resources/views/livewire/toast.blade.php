<!-- livewire/toast.blade.php -->
<div x-data="{ show: false, message: '', type: '' }"
     x-init="Livewire.on('showToast', (message, type) => {
                show = true;
                this.message = message;
                this.type = type;
                setTimeout(() => { show = false; }, 5000); // Hide after 5 seconds
            })"
     x-show.transition.duration.500ms="show"
     class="fixed inset-0 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end">
    <div x-show="show" 
         x-bind:class="{
             'bg-green-100': type === 'success',
             'bg-yellow-100': type === 'warning',
             'bg-red-100': type === 'error',
         }"
         class="max-w-sm w-full shadow-lg rounded-lg pointer-events-auto">
        <div class="rounded-lg shadow-xs overflow-hidden">
            <div class="p-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <x-icons.solid.check-circle 
                            :class="{
                                'text-green-400': type === 'success',
                                'text-yellow-400': type === 'warning',
                                'text-red-400': type === 'error',
                            }"
                            class="h-6 w-6" />
                    </div>
                    <div class="ml-3 w-0 flex-1 pt-0.5">
                        <p class="text-sm font-medium" x-text="message"></p>
                    </div>
                    <div class="ml-4 flex-shrink-0 flex">
                        <button @click="show = false" class="text-gray-400 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150">
                            <x-icons.solid.x class="h-5 w-5" />
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
