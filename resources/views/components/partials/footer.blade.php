@props(['check' => null])

<footer class=" @if ($check == 'dashboard')  transition-all ease-in-out delay-75 sm:w-4/5 octa-footer  sm:ml-auto @endif  w-full dark:bg-gray-800 bg-[#f3f4f5] sm:h-72 relative border-t-slate-100">
    <div class="container mx-auto  sm:w-5/6 w-full max-w-screen-xl flex flex-wrap  gap-0">
        <div class="relative w-full sm:w-2/4 p-5 ">
            <img src="{{ asset('asset/img/home/logo-rifayas.png') }}" alt="logo" class='lg:w-36 max-lg:w-24' />
            <!-- <h4 class=" font-bold mb-2 text-3xl text-[#FABE0E]">Rifaya Education</h4> -->
            <p>Jl Cipedes Kota Bandung  </p>
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
                    <a href="{{ route('home') }}" class=" hover:underline">Beranda</a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('post.index',['kategori' => 'Artikel']) }}" class=" hover:underline">Artikel</a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('post.index',['kategori' => 'Try Out']) }}" class="hover:underline">Try Out</a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('post.index',['kategori' => 'Bank Soal']) }}" class="hover:underline">Bank Soal</a>
                </li>
            </ul>
        </div>
        <div class=" w-full sm:w-1/4 p-5 ">
            <h4 class=" mb-2 font-bold">Rifaya Education</h4>
            <ul class="text-black dark:text-gray-400 font-medium">
                <li class="mb-4">
                    <a href="{{ route('about') }}" class=" hover:underline">Tentang</a>
                </li>
                <!-- <li class="mb-4">
                    <a href="#" class="hover:underline">Pricing</a>
                </li> -->
                <li class="mb-4">
                    <a href="{{ route('register') }}" class="hover:underline">Daftar Les Private</a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('teacher.register') }}" class="hover:underline">Daftar Tutor / Guru Les</a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('affiliate.registrasi') }}" class="hover:underline">Daftar Affiliator</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="sm:absolute bottom-0 w-full h-16 bg-white text-center pt-3 dark:bg-gray-800  ">
        <hr class="hidden dark:block dark:sm:mb-2 dark:border-gray-700">
        <a href="https://usepgnwan.github.io" target="_blank" class="text-sm">© 2024 Copy Right | Usep Gnwan</a>
    </div>
</footer>


<div class="fixed bottom-4 z-50 shadow-xl bg-white dark:bg-gray-700 w-14 h-14 right-4 cursor-pointer rounded-full flex items-center justify-center whatsapp-button"> <span class="icon-[logos--whatsapp-icon] text-4xl"></span> </div>
