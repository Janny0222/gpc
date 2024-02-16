<div>
    <x-notification
        wire:model.defer="notification"
        :status="$status">
        <x-slot name="message">
            {{ $message }}
        </x-slot>
    </x-notification>
</div>
