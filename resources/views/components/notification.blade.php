@props(['status'])

@php
switch($status ?? 'success') {
    case 'error':
        $status = 'Error';
        $text_color = 'text-red-500';
        break;
    case 'warning':
        $status = 'Warning';
        $text_color = 'text-yellow-500';
        break;
    case 'info':
        $status = 'Info';
        $text_color = 'text-blue-500';
        break;
    case 'success':
    default:
        $status = 'Success';
        $text_color = 'text-green-500';
        break;
}
@endphp

<div {{ $attributes->merge(['class' => 'fixed inset-x-0 top-32 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end z-50']) }}>
    <div 
        x-data="{ show: @entangle($attributes->wire('model')) }"
        x-show="show"
        x-on:click.away="show = false"
        x-description="Notification panel, show/hide based on alert state."  
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
        class="flex w-full max-w-sm ml-auto overflow-hidden bg-white rounded-lg shadow-md pointer-events-auto"
        style="display: none;"
        >

        @if($status == 'Error')
        <div class="flex items-center justify-center px-3 bg-red-500">
            <x-icons.solid.x-circle class="w-6 h-6 text-white fill-current"/>
        </div>
        @elseif($status == 'Warning')
        <div class="flex items-center justify-center px-3 bg-yellow-500">
            <x-icons.solid.exclamation class="w-6 h-6 text-white fill-current"/>
        </div>
        @elseif($status == 'Info')
        <div class="flex items-center justify-center px-3 bg-blue-500">
            <x-icons.solid.information-circle class="w-6 h-6 text-white fill-current"/>
        </div>
        @else
        <div class="flex items-center justify-center px-3 bg-green-500">
            <x-icons.solid.check-circle class="w-6 h-6 text-white fill-current"/>
        </div>
        @endif
        
        <div class="px-4 py-2 -mx-3">
            <div class="mx-3">
                <span class="font-semibold {{ $text_color }} ">{{ $status }}</span>
                <p class="text-sm text-gray-600">
                    {{ $message }}
                </p>
            </div>
        </div>

        <div class="py-2 mr-4 ml-auto flex-shrink-0 flex">
            <div @click="show = false" class="h-5 w-5 text-gray-400 hover:text-gray-500 focus:outline-none focus:text-gray-500 cursor-pointer transition ease-in-out duration-150">
                <x-icons.solid.x />
            </div>
        </div>
    </div>
</div>