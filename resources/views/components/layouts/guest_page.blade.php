<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{  isset($title) ? $title ." | " .  config('app.name') : config('app.name')  }}</title>

        @vite(['resources/css/app.css'])
    </head>
    <body class=" dark:text-slate-400  dark:bg-gray-700">
        {{ $slot }}
        <!-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> -->
        <script src="{{ asset('/vendor/tinymce/tinymce.min.js')}}"></script>
        <script src="{{ asset('/vendor/tinymce_mathjax/plugin.js')}}"></script>
        @livewireScripts
        @vite(['resources/js/app.js'])
        @stack('scripts')
    </body>
</html>
