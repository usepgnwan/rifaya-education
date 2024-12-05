<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ isset($title) ? $title ." | " .  config('app.name') : config('app.name')  }}</title>
        <link rel="icon" href="{{ asset('asset/img/home/logo-rifaya.png') }}" type="image/png">
        <meta name="description" content="{{ isset($title) ? $title : config('app.name')  }}">

        @vite(['resources/css/app.css'])
        <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
        @livewireStyles
        <!-- <script src="{{ asset('/vendor/select2/css/select2.min.css')}}"></script> -->
         <link rel="stylesheet" href="{{ asset('/vendor/tinymce/skins/ui/oxide-dark/content.css')}}">

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

        <a href="{{ route('register') }}" class="btn-next-yellow mt-2 fixed bottom-20 bg-[#DC5A39] border border-gray-300 shadow-lg text-white dark:bg-gray-800 dark:text-gray-200  right-4 z-50">Daftar Les Private</a>
        <div
            x-data="affiliateBanner()"
            x-init="checkCookie()"
            x-show="isVisible"
            class="fixed inset-0 z-50 shadow-xl bg-transparent flex flex-wrap justify-center items-center cursor-pointer h-screen w-screen screen-affiliate"
        >
            <div class="absolute inset-0 bg-black opacity-35 h-full close-affiliate" @click="closeAffiliate()"></div>
            <div class="relative">
                <div class="absolute top-0 right-0 close-affiliate" @click="closeAffiliate()">
                    <div class="flex items-center">
                        <span class="icon-[line-md--close-circle] size-16"></span>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('asset/img/home/affiliate.png') }}" class="max-lg:h-80 h-[510px]" alt="affiliate">
                </div>
                <div class="flex justify-center">
                    <button class="text-2xl px-6 rounded-full p-2 bg-purple-700 text-white border border-solid border-purple-700 hover:bg-purple-600 hover:text-white max-lg:text-lg">Cek ketentuan & syarat disni</button>
                </div>
            </div>
        </div>

        <script>
            function affiliateBanner() {
                return {
                    isVisible: true,
                    checkCookie() {
                        // Check if the cookie exists
                        if (document.cookie.split('; ').find(row => row.startsWith('affiliate=close'))) {
                            this.isVisible = false; // Hide the banner
                        }
                    },
                    closeAffiliate() {
                        // Set the cookie to hide the banner
                        const date = new Date();
                        date.setTime(date.getTime() + 3 * 60 * 60 * 1000); // 3 hours expiration
                        document.cookie = `affiliate=close; expires=${date.toUTCString()}; path=/`;
                        this.isVisible = false; // Hide the banner
                    }
                };
            }
        </script>


        @livewireScripts
        @vite(['resources/js/app.js'])
        @stack('scripts')


    </body>
</html>
