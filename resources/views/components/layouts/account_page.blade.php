<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ isset($title) ? $title ." | " .  config('app.name') : config('app.name')  }}</title>

    <link rel="icon" href="{{ asset('asset/img/home/logo-rifaya.png') }}" type="image/png">
    <meta name="description" content="{{ isset($title) ? $title : config('app.name')  }}">

    @vite(['resources/css/app.css'])
    @livewireStyles
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-8S3Y0M49BQ"></script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FXP4219XLM"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-FXP4219XLM');
    </script>
    <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
            {
            "@type": "ListItem",
            "position": 1,
            "name": "Beranda",
            "item": "https://rifayaeducation.com/"
            },
            {
            "@type": "ListItem",
            "position": 2,
            "name": "Artikel",
            "item": "https://rifayaeducation.com/blog"
            },
            {
            "@type": "ListItem",
            "position": 3,
            "name": "Les Private",
            "item": "https://rifayaeducation.com/daftar/siswa"
            }
        ]
        }
    </script>
</head>

<body class=" dark:text-slate-400  dark:bg-gray-700">
    <x-partials.navigations-home :check="'dashboard'"></x-partials.navigations-home>
    <x-partials.dashboard.side-bar-menu></x-partials.dashboard.side-bar-menu>
    <div class=" w-full   min-h-screen">
        <div class="w-4/5 ml-auto p-4 px-8 mt-1 octa-body-content transition-all ease-in-out  delay-75 max-lg:w-full">
            {{ $slot }}
        </div>
    </div>

    <x-partials.footer :check="'dashboard'"></x-partials.footer>

    <x-notification />
    @if(auth()->check())
    <livewire:partials.change-password></livewire:partials.change-password>
    @endif
    <script src=" https://cdn.jsdelivr.net/npm/air-datepicker@3.5.3/air-datepicker.min.js "></script>
    <link href=" https://cdn.jsdelivr.net/npm/air-datepicker@3.5.3/air-datepicker.min.css " rel="stylesheet">

    <!-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> -->
    <script src="{{ asset('/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{ asset('/vendor/tinymce_mathjax/plugin.js')}}"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
    <x-notification />
    @vite(['resources/js/app.js'])
    @livewireScripts
    @stack('scripts')
</body>

</html>
