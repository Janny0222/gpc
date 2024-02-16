@props(['id' => null, 'maxWidth' => null, 'submit'])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <form wire:submit.prevent="{{ $submit }}" method="POST">
        @csrf
        <div class="pb-4">
            <div class="text-lg border-b">
                <div class="px-6 py-4 font-bold">
                    {{ $title }}
                </div>
            </div>
            <p class="mt-1 text-xs text-gray-600 px-6">
                {{ $description }}
            </p>
    
            <div class="mt-4 px-6">
                {{ $content }}
            </div>
        </div>
        <div class="flex flex-row-reverse bg-gray-50 px-4 py-3 sm:px-6">
            {{ $footer }}
        </div>
    </form>
</x-modal>