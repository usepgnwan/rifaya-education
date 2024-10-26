<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ isset($title) ? $title ." | " .  config('app.name') : config('app.name')  }}</title>

        @vite(['resources/css/app.css'])
        <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
        @livewireStyles
        <!-- <script src="{{ asset('/vendor/select2/css/select2.min.css')}}"></script> -->
         <link rel="stylesheet" href="{{ asset('/vendor/tinymce/skins/ui/oxide-dark/content.css')}}">
    </head>
    <body class=" dark:text-slate-400  dark:bg-gray-700">
       <x-partials.navigations-home :check="'home'"></x-partials.navigations-home>
        {{ $slot }}
        <x-partials.footer></x-partials.footer>
        @if(auth()->check())
            <livewire:partials.change-password></livewire:partials.change-password>
        @endif
        <!-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> -->
        <!-- <script src="{{ asset('/vendor/jquery/jquery.js')}}"></script> -->
        <script src="{{ asset('/vendor/tinymce/tinymce.min.js')}}"></script>
        <script src="{{ asset('/vendor/tinymce_mathjax/plugin.js')}}"></script>
        <!-- <script src="{{ asset('/vendor/select2/js/select2.min.js')}}"></script> -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
        <x-notification />


        @livewireScripts
        @vite(['resources/js/app.js'])
        @stack('scripts')


    </body>
</html>
