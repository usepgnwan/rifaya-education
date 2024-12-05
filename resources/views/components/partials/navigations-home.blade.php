@props(['check' => null])
<header class='flex dark:bg-gray-800 bg-[#FABE0E] border-b max-lg:py-4 max-lg:px-4 sm:px-10 sticky font-[sans-serif] min-h-[70px] tracking-wide  border-none  top-0 z-50  '
    id="header">
    <div class='flex flex-wrap items-center gap-5 w-full'>

        <!-- front web -->
        @if ($check == 'dashboard')
            <!-- dashboard header -->
            <span>
            <!-- style="background-image: url('{{ asset('asset/img/home/teacher2.png') }}')" -->
                <a href="{{ route('home') }}" @click.prevent="Livewire.navigate('{{ route('home') }}')"><img src="{{ asset('asset/img/home/logo-rifayas.png') }}" alt="logo"  class='lg:w-36 max-lg:w-20 mr-4' /> </a>

                <button  class='button-menu max-lg:right-4 dark:bg-transparent fixed top-2 lg:left-[12.6rem]  z-[100] rounded-full   p-3 w-max- h-opened mt-[2px]'>
                    <!-- <svg class="w-6 h-6 h-open hidden" fill="#fff" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg> -->
                    <span class="icon-[line-md--close-to-menu-alt-transition] size-6 delay-75 h-open  hidden dark:fill-white text-white"></span>
                    <span class="icon-[line-md--menu-to-close-alt-transition] size-6 delay-75 fill dark:fill-white  h-close fill-whitemt-[3px] text-white"></span>

                    <!-- <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-3 fill dark:fill-white fill-white h-close   mt-[3px]"
                        viewBox="0 0 320.591 320.591">
                        <path
                            d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
                            data-original="#000000"></path>
                        <path
                            d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
                            data-original="#000000"></path>
                    </svg> -->
                </button>
            </span>
        @else
            <a href="{{ route('home') }}" @click.prevent="Livewire.navigate('{{ route('home') }}')">
             <img src="{{ asset('asset/img/home/logo-rifayas.png') }}"  alt="logo"
                    class='lg:w-36 max-lg:w-20' />
            </a>
            <div id="collapseMenu" class='sm:w-[72%] lg:w-[72%] ml-auto max-lg:min-w-[300px] lg:!block max-lg:fixed max-lg:before:fixed max-lg:before:bg-black max-lg:before:opacity-50 z-50'>
                <button id="toggleClose" class='lg:hidden dark:bg-transparent fixed top-2 right-4 z-[100] rounded-full bg-transparent p-3 h-opened mt-[2px]'>
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
                    <x-partials.front.nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">Beranda</x-partials.front.nav-link>
                    <x-partials.front.nav-link href="{{ route('post.index') }}" :active="request()->routeIs('post.*')">Blog</x-partials.front.nav-link>
                    <li class='max-lg:border-b max-lg:py-2 px-2 whitespace-nowrap  group/sub-menu  group/rotate max-lg:dark:border-b-gray-500 hidden'>
                        <a href="#"
                            class='lg:hover:text-[#007bff] text-sm  text-gray-500 lg:text-white block font-semibold text-[15px]  group-hover:block  sub-menu  dark:text-slate-400'>Kelas
                            Intensif <span
                                class="text-[10px] icon-[simple-line-icons--arrow-down] group-hover/rotate:rotate-180 lg:group-hover/focus: ease-in duration-300"></span></a>
                        <ul class=" hidden lg:group-hover/sub-menu:block lg:absolute lg:top[70px] leading-10 shadow-lg lg:min-w-32  bg-white lg:dark:bg-gray-800  sm:dark:bg-gray-800  rounded-md sub-menu-mobile">
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
                    <x-partials.front.nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">Tentang</x-partials.front.nav-link>
                    <x-partials.front.nav-link href="{{ route('teacher.join') }}" :active="request()->routeIs('teacher.join')">Jadi Pengajar</x-partials.front.nav-link>
                    <x-partials.front.nav-link href="{{ route('teacher.join') }}" :active="request()->routeIs('teacher.join')">Affiliate</x-partials.front.nav-link>

                    <x-partials.front.nav-link href="{{ route('register') }}"  @click.prevent="Livewire.navigate('{{ route('register') }}')" :class="'lg:hover:text-white lg:hover:bg-sky-400  border-2 max-lg:dark:border-gray-700 dark:border-gray-300 border-sky-400 rounded-full py-1.5 px-4 dark:hover:bg-gray-950 dark:hover:text-white'">Les Private</x-partials.front.nav-link>
                </ul>
            </div>
        @endif
        <div class='flex ml-auto min-w-[30px] mr-6 gap-3 max-lg:mr-12 z-10'>
            <span class="icon-[ion--search-outline] size-5 cursor-pointer fill-gray-400 my-auto max-lg:ml-auto web-mode text-white"></span>
            <!-- <span class="icon-[line-md--moon-loop] size-4 cursor-pointer fill-gray-400 my-auto max-lg:ml-auto"></span> -->
            <span class="size-5 cursor-pointer fill-gray-400 my-auto max-lg:ml-auto text-white dark-button"></span>
            <!-- <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="w-7 h-w-7 rounded-full cursor-pointer " src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="User"> -->
            <!-- Dropdown menu -->


            @auth

            <div x-data="{ open: false }" class="relative inline-block  ">
            @if (auth()->user()->profile )
            <img   @click="open = !open" @click.outside="open = false" class="w-7 h-w-7 rounded-full cursor-pointer my-auto max-lg:ml-auto" src="{{ auth()->user()->profile }} " alt="User">

            @else
                <span @click="open = !open" @click.outside="open = false"
                    class="mt-2 dropdown-toggle-button-user icon-[solar--user-circle-bold] cursor-pointer size-6  my-auto max-lg:ml-auto text-white">
                </span>
            @endif


                <!-- Dropdown Menu -->
                <div x-show="open" x-transition
                    class="z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-800 dark:divide-gray-600"
                    style="position: absolute; inset: 0px auto auto 0px; margin: 30px 0px 10px -130px; transform:translate3d(0px, 0px, 0px)"
                    @click.outside="open = false">

                    <!-- User Information -->
                    <div class="px-4 py-3 text-sm text-gray-900 dark:text-slate-400">
                        <div>{{ auth()->user()->name }}</div>
                        <div class="text-xs truncate">{{ auth()->user()->username }}</div>
                    </div>

                    <!-- Dropdown Links -->
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                        <li>
                            <a href="{{ route('account.dashboard') }}" @click.prevent="Livewire.navigate('{{ route('account.dashboard') }}')"  class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                        </li>
                        <li>
                            <button type="button" class="w-full text-left block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" @click.prevent="Livewire.dispatch('showModal', {status :true })">Ganti Password</button>
                        </li>
                        <!-- <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                        </li> -->
                    </ul>

                    <!-- Sign Out -->
                    <div class="py-1">


                    <form action="{{ route('logout') }}" class="w-full text-left">
                        @csrf
                        <button type="submit" class="text-left px-4 w-full py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                Logout
                        </button>
                    </form>


                    </div>
                </div>
            </div>


            @else
            <span class="text-white"> | <a href="{{ route('login') }}" @click.prevent="Livewire.navigate('{{ route('login') }}')"> Login  </a></span>
            @endauth
        </div>
    </div>
</header>
