<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Property Asset - GPC') }}</title>

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="/css/flatpickr.css" />
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
           
            @media print {
                body { 
                    font-size: 8px;
                    line-height: 1.2;
                }
            }
            [x-cloak] {
                display: none;
            }
            
            .choices__input {
                /* Change the default style of tailwindcss to Choices.js in multiple select */
                --tw-ring-offset-color: #f9f9f9 !important;
                --tw-ring-color: #f9f9f9 !important;
                border-color: #f9f9f9 !important;
            }

            .checkbox-container {
                border: 2px solid #ccc; height: 200px; overflow-y: scroll;
            }

            /* Remove Arrow in number input */
            /* Chrome, Safari, Edge, Opera */
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            /* Firefox */
            input[type=number] {
                -moz-appearance: textfield;
            }

            .loader {
                border-top-color: #16a34a;
                -webkit-animation: spinner 1.5s linear infinite;
                animation: spinner 1.5s linear infinite;
            }
            
            @-webkit-keyframes spinner {
                0% {
                    -webkit-transform: rotate(0deg);
                }
                100% {
                    -webkit-transform: rotate(360deg);
                }
            }
            
            @keyframes spinner {
                0% {
                    transform: rotate(0deg);
                }
                100% {
                    transform: rotate(360deg);
                }
            }
        </style>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        

        @livewireStyles
        
        @stack('styles')
        @stack('scripts')
    </head>
    <body class="antialiased font-lato scroll-smooth">
        <div id="app" x-data="{ isDesktop: window.innerWidth >= 800 }" x-on:resize.window="isDesktop = window.innerWidth >= 800">
        @include('livewire.sidebar')
        {{-- @include('layouts.sidebar') --}}
            <!-- Page Heading -->
                <!-- Page Content -->
                <main :class="{'ml-60': isDesktop}">
                    @livewire('navigation-dropdown')
                    <header class="w-full " >
                        <div class="px-6 py-6 mx-auto my-6">
                            {{ $header }}
                        </div>
                    </header>
                    {{ $slot }}
                </main>
                @livewireScripts
        </div>
       
    </body>
</html>
