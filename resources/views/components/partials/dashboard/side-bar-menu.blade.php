<section class="w-full relative " id="dashboard">
    <!-- drawer component -->
    <div id="drawer-disabled-backdrop" class="fixed top-[64px] left-0 h-screen p-4 overflow-y-auto transition-transform  bg-[#FABE0E] max-lg:w-64 sm:w-1/5 dark:bg-gray-800 z-20 ">
        <div class="w-full flex flex-wrap justify-center p-2 hidden">
            <div class="w-full flex justify-center mx-auto ">
                @if (auth()->user()->profile )
                <img id="avatarButton" class="w-24 h-w-24 rounded-full cursor-pointer " src="{{ auth()->user()->profile }} " alt="User">
                @else
                <span class="size-14 icon-[solar--user-circle-bold]"></span>
                @endif
            </div>
            <div class="text-wrap">
                {{auth()->user()->name}}

            </div>
        </div>
        <h5 id="drawer-disabled-backdrop-label" class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">Menu</h5>

        <div class="py-4 overflow-y-auto">
            <ul class="space-y-2 font-medium">
                <x-partials.dashboard.side-link href="{{ route('account.dashboard') }}" :active="request()->routeIs('account.dashboard')" :icon="'icon-[streamline--pie-chart-solid]'">
                    <span class="ms-3">Dashboard</span>
                </x-partials.dashboard.side-link>
                <x-partials.dashboard.side-link href="{{ route('account.tes') }}" :active="request()->routeIs('account.tes')" :icon="'icon-[streamline--pie-chart-solid]'" class="hidden">
                    <span class="ms-3">Tes</span>
                </x-partials.dashboard.side-link>
                @can('hasRole', [1])
                <x-partials.dashboard.side-link href="{{ route('account.users', ['type' => 'teacher']) }}" :active="request()->routeIs('account.users')   && request()->route('type') === 'teacher'" :icon="'icon-[ph--user-list]'">
                    <span class="ms-3">Guru</span>
                </x-partials.dashboard.side-link>
                <x-partials.dashboard.side-link href="{{ route('account.users', ['type' => 'student']) }}" :active="request()->routeIs('account.users') && request()->route('type') === 'student'" :icon="'icon-[mdi--account-school-outline]'">
                    <span class="ms-3">Siswa</span>
                </x-partials.dashboard.side-link>
                @endcan
                @can('hasRole', [1,3])
                <x-partials.dashboard.side-link :multi="'true'"  href="{{ route('home') }}" :active="request()->routeIs('account.blog*')" :icon="'icon-[streamline--pie-chart-solid]'" class=" w-full ">
                    <span class="ms-3" > <x-slot name="title">Blog</x-slot> </span>
                    <!-- multi link -->
                    <x-slot name="link">
                        <x-partials.dashboard.side-link href="{{ route('account.blog') }}" :active="request()->routeIs('account.blog*')"   class=" pl-11 ">
                            <span class="ms-3">Blog</span>
                        </x-partials.dashboard.side-link>
                    </x-slot>
                </x-partials.dashboard.side-link>
                @endcan
                @can('hasRole', [1])
                <x-partials.dashboard.side-link :multi="'true'"  href="{{ route('home') }}" :active="request()->routeIs('account.master*')" :icon="'icon-[material-symbols--database-outline]'" class=" w-full ">
                    <span class="ms-3" > <x-slot name="title">Master</x-slot> </span>
                    <!-- multi link -->
                    <x-slot name="link">
                        <x-partials.dashboard.side-link href="{{ route('account.master.matapelajaran') }}" :active="request()->routeIs('account.master.matapelajaran*')"   class=" pl-11 ">
                            <span class="ms-3">Mata Pelajaran</span>
                        </x-partials.dashboard.side-link>
                        <x-partials.dashboard.side-link href="{{ route('account.master.qa') }}" :active="request()->routeIs('account.master.qa*')"   class=" pl-11 ">
                            <span class="ms-3">Q&A</span>
                        </x-partials.dashboard.side-link>
                    </x-slot>
                </x-partials.dashboard.side-link>
                @endcan
                {{--
                <x-partials.dashboard.side-link :multi="'true'"  href="{{ route('home') }}" :active="request()->routeIs('account.tes*')" :icon="'icon-[bx--data]'" class=" w-full ">
                    <span class="ms-3" > <x-slot name="title">Master</x-slot> </span>
                    <!-- multi link -->
                    <x-slot name="link">
                        <x-partials.dashboard.side-link href="{{ route('home') }}" :active="request()->routeIs('account.dasdshboard')"   class=" pl-11 ">
                            <span class="ms-3">Dashboard</span>
                        </x-partials.dashboard.side-link>
                    </x-slot>
                </x-partials.dashboard.side-link>

                <li>
                    <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example1" data-collapse-toggle="dropdown-example1">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                            <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                        </svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">E-commerce</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-example1" class="hidden py-2 space-y-2">
                        <li>
                            <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Products</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Billing</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Invoice</a>
                        </li>
                    </ul>
                </li>


                <x-partials.dashboard.side-link href="{{ route('home') }}" :active="request()->routeIs('account.inbox')" :icon="'icon-[streamline--pie-chart-solid]'" :class="'flex'">
                    <span class="flex-1 ms-3 whitespace-nowrap">Inbox</span>
                    <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
                </x-partials.dashboard.side-link>
                <x-partials.dashboard.side-link href="{{ route('home') }}" :active="request()->routeIs('account.inbox')" :icon="'icon-[streamline--pie-chart-solid]'" :class="'flex'">
                    <span class="flex-1 ms-3 whitespace-nowrap">Kanban</span>
                    <span class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span>
                </x-partials.dashboard.side-link>

                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Sign In</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
                            <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z" />
                            <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Sign Up</span>
                    </a>
                </li>--}}
            </ul>
        </div>
    </div>
</section>
