<!doctype html>
<html class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('assets.page.css')
</head>
<body class=" dark:text-slate-400  dark:bg-gray-700 font-poppins">
    <header  class='flex dark:bg-gray-800 bg-[#FABE0E] border-b max-lg:py-4 max-lg:px-4 sm:px-10 sticky font-[sans-serif] min-h-[70px] tracking-wide  border-none  top-0 z-50  '
        id="header">
        <div class='flex flex-wrap items-center gap-5 w-full'>
            <a href="javascript:void(0)"><img src="https://readymadeui.com/readymadeui.svg" alt="logo"
                    class='lg:w-36 max-lg:w-20' />
            </a>
            <div id="collapseMenu" class='sm:w-[72%] lg:w-[72%] ml-auto max-lg:min-w-[300px] lg:!block max-lg:fixed max-lg:before:fixed max-lg:before:bg-black max-lg:before:opacity-50 z-50'>
                <button id="toggleClose" class='lg:hidden dark:bg-transparent fixed top-2 right-4 z-[100] rounded-full bg-[#FABE0E] p-3 h-opened mt-[2px]'>
                    <svg class="w-6 h-6 h-open" fill="#fff" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill dark:fill-white fill-white h-close hidden  mt-[3px]"
                        viewBox="0 0 320.591 320.591">
                        <path
                            d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
                            data-original="#000000"></path>
                        <path
                            d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
                            data-original="#000000"></path>
                    </svg>
                </button>
                <ul class='justify-end  max-lg:transition-all max-lg:ease-in-out max-lg:delay-75 lg:flex lg:items-center lg:ml-14 lg:gap-x-3 max-lg:space-y-3 max-lg:fixed  dark:bg-gray-800 lg:dark:bg-transparent max-lg:bg-[#FABE0E] max-lg:w-1/2  max-lg:top-0 max-lg:right-[-520px] max-lg:p-6 max-lg:h-full max-lg:shadow-md max-lg:overflow-auto z-50 '>
                    <li class='mb-6 hidden max-lg:block'>
                        <a href="{{ route('home') }}"><img src="{{ asset('asset/img/home/logo-rifayas.png') }}" alt="logo"
                                class='w-36' />
                        </a>
                    </li>
                    <li class='max-lg:border-b max-lg:dark:border-b-gray-500 max-lg:py-2 px-2 whitespace-nowrap'>
                        <a href='index.html' class=' dark:text-slate-400 lg:hover:text-[#007bff] text-sm text-[#007bff] block font-semibold text-[15px]'>Beranda</a>
                    </li>
                    <li class='max-lg:border-b max-lg:py-2 px-2 whitespace-nowrap max-lg:dark:border-b-gray-500 '>
                        <a href='artikel.html' class=' dark:text-slate-400 lg:hover:text-[#007bff] text-sm  text-gray-500 lg:text-white block font-semibold text-[15px]'>Artikel</a>
                    </li>
                    <li class='max-lg:border-b max-lg:py-2 px-2 whitespace-nowrap  group/sub-menu  group/rotate max-lg:dark:border-b-gray-500 hidden'>
                        <a href="#"
                            class='lg:hover:text-[#007bff] text-sm  text-gray-500 lg:text-white block font-semibold text-[15px]  group-hover:block  sub-menu  dark:text-slate-400'>Kelas
                            Intensif <span
                                class="text-[10px] icon-[simple-line-icons--arrow-down] group-hover/rotate:rotate-180 lg:group-hover/focus: ease-in duration-300"></span></a>
                        <ul  class=" hidden lg:group-hover/sub-menu:block lg:absolute lg:top[70px] leading-10 shadow-lg lg:min-w-32  bg-white lg:dark:bg-gray-800  sm:dark:bg-gray-800  rounded-md sub-menu-mobile">
                            <li class="  pl-6 pr-6 pt-2">
                                <a href="#"
                                    class="lg:hover:text-[#007bff] text-sm    dark:text-slate-400 text-gray-500 lg:text-slate-700 block font-semibold text-[15px] ">Web Design
                                </a>
                            </li>
                            <li class="more group/more  pl-6 pr-6 pt-2 more-mobile">
                                <span class="group-hover/more:block sub-menu">
                                    <a href="#"
                                        class="lg:hover:text-[#007bff]  dark:text-slate-400  text-sm  text-gray-500 lg:text-slate-700 block font-semibold text-[15px] pt-1 pb-2 ">More
                                        <span
                                            class="text-[10px] icon-[simple-line-icons--arrow-down] group-hover/more:rotate-180 ease-in duration-300">
                                        </span>
                                    </a>
                                    </a>
                                    <i class='bx bxs-chevron-right arrow more-arrow'></i>
                                </span>
                                <ul class=" hidden lg:group-hover/more:block sub-menu-mobile">
                                    <li><a href="#"
                                            class="pt-1 pb-2 lg:hover:text-[#007bff]   dark:text-slate-400 text-sm  text-gray-500 lg:text-slate-700 block font-semibold text-[15px]">Neumorphism</a>
                                    </li>
                                    <li><a href="#"
                                            class="pt-1 pb-2 lg:hover:text-[#007bff]  dark:text-slate-400 text-sm  text-gray-500 lg:text-slate-700 block font-semibold text-[15px]">Pre-loader</a>
                                    </li>
                                    <li><a href="#"
                                            class="pt-1 pb-2 lg:hover:text-[#007bff]   dark:text-slate-400 text-sm  text-gray-500 lg:text-slate-700 block font-semibold text-[15px]">Glassmorphism</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class='max-lg:border-b max-lg:py-2 px-2 whitespace-nowrap max-lg:dark:border-b-gray-500'>
                        <a href='tentang.html'
                            class='lg:hover:text-[#007bff] text-sm text-gray-500  dark:text-slate-400 lg:text-white block font-semibold text-[15px]'>Tentang</a>
                    </li>
                    <li class='max-lg:border-b max-lg:py-2 px-2 whitespace-nowrap max-lg:dark:border-b-gray-500'>
                        <a href='karir.html'
                            class='lg:hover:text-[#007bff] text-sm text-gray-500  dark:text-slate-400 lg:text-white block font-semibold text-[15px]'>Karir</a>
                    </li>

                    <li class='max-lg:border-b dark:border-b-gray-500 max-lg:py-2 px-2 whitespace-nowrap'>
                        <a href='cari_pengajar.html'
                            class='lg:hover:text-white lg:hover:bg-sky-400  border-2 max-lg:dark:border-gray-700 dark:border-gray-300 border-sky-400 rounded-full py-1.5 px-4 text-sm text-white  dark:text-slate-400 block font-semibold text-[15px] dark:hover:bg-gray-950 dark:hover:text-white'>Cari Pengajar</a>
                    </li>
                </ul>
            </div>

            <div class='flex ml-auto min-w-[30px] mr-6 gap-3 max-lg:mr-12 z-10'>
                <span class="icon-[ion--search-outline] size-5 cursor-pointer fill-gray-400 my-auto max-lg:ml-auto web-mode text-white"></span>
                <!-- <span class="icon-[line-md--moon-loop] size-4 cursor-pointer fill-gray-400 my-auto max-lg:ml-auto"></span> -->
                <span class="size-5 cursor-pointer fill-gray-400 my-auto max-lg:ml-auto text-white dark-button"></span>
                        <!-- <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="w-7 h-w-7 rounded-full cursor-pointer " src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="User"> -->
                <!-- Dropdown menu -->

                <span class="text-white"> | <a href="login.html" > login </a></span>

            </div>
        </div>
    </header>
    <!-- content page -->
    @yield('content')
    <!-- end page content  -->
    <footer class="w-full dark:bg-gray-800 bg-[#f3f4f5] sm:h-72 relative border-t-slate-100">
        <div class="container mx-auto  sm:w-5/6 w-full max-w-screen-xl flex flex-wrap  gap-0">
            <div class="relative w-full sm:w-2/4 p-5 ">
                <img src="https://readymadeui.com/readymadeui.svg" alt="logo"  class='lg:w-36 max-lg:w-24' />
                <h4 class=" font-bold mb-2 text-3xl text-[#FABE0E]">Rifaya Education</h4>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id nostrum cum iure excepturi voluptate explicabo libero?  </p>
                <div class="mt-12 sm:absolute bottom-10 flex gap-2 text-[#FABE0E] text-xl">
                    <a href="" class="hover:flex hover:items-center hover:text-white hover:bg-[#FABE0E] hover:rounded-full hover:w-8 hover:h-8 hover:justify-center"><span class="icon-[line-md--instagram]"></span></a>
                    <a href="" class="hover:flex hover:items-center hover:text-white hover:bg-[#FABE0E] hover:rounded-full hover:w-8 hover:h-8 hover:justify-center"><span class="icon-[mdi--whatsapp]"></span></a>
                    <a href="" class="hover:flex hover:items-center hover:text-white hover:bg-[#FABE0E] hover:rounded-full hover:w-8 hover:h-8 hover:justify-center"><span class="icon-[hugeicons--telegram]"></span></a>
                    <a href="" class="hover:flex hover:items-center hover:text-white hover:bg-[#FABE0E] hover:rounded-full hover:w-8 hover:h-8 hover:justify-center"><span class="icon-[basil--youtube-outline]"></span>
                    <a href="" class="hover:flex hover:items-center hover:text-white hover:bg-[#FABE0E] hover:rounded-full hover:w-8 hover:h-8 hover:justify-center"><span class="icon-[mdi--gmail]"></span></a>
                </div>
            </div>
            <div class="w-full sm:w-1/4 p-5 ">
                <h4 class=" font-bold mb-2">Kategori</h4>
                <ul class="text-black dark:text-gray-400 font-medium">
                    <li class="mb-4">
                        <a href="#" class=" hover:underline">Beranda</a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class=" hover:underline">Artikel</a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="hover:underline">Try Out</a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="hover:underline">Bank Soal</a>
                    </li>
                </ul>
            </div>
            <div class=" w-full sm:w-1/4 p-5 ">
                <h4 class=" mb-2 font-bold">Company</h4>
                <ul class="text-black dark:text-gray-400 font-medium">
                    <li class="mb-4">
                        <a href="#" class=" hover:underline">Tentang</a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="hover:underline">Pricing</a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="hover:underline">Faq</a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="hover:underline">Karir</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sm:absolute bottom-0 w-full h-16 bg-white text-center pt-3 dark:bg-gray-800  ">
            <hr class="hidden dark:block dark:sm:mb-2 dark:border-gray-700">
            <a href="https://usepgnwan.github.io" target="_blank" class="text-sm">© 2024 Copy Right | Usep Gnwan</a>
        </div>
    </footer>
    @include('assets.page.js')
</body>
</html>
