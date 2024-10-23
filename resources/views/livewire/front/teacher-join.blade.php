<div>
    <section class="container w-full mt-5 mb-12 px-6 relative mx-auto">
        <div class=" mb-3 mx-3 ">
            <nav class="flex content-center  text-sm sm:text-sm " aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-1 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="#" class="inline-flex items-center font-medium text-gray-700 hover:text-[#FABE0E] dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5 dark:fill-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <span class="icon-[ep--arrow-right] text-slate-800 mt-2"></span> &nbsp;
                            <a href="#" class="ms-1 font-medium text-gray-800 hover:text-[#FABE0E] md:ms-2 dark:text-gray-400 dark:hover:text-white">Jadi Pengajar</a>
                        </div>
                    </li>

                </ol>
            </nav>
        </div>
    </section>
    <section class="p-12 mx-auto sm:w-full  lg:flex lg:p-6 dark:bg-gray-800" id="body-section">
        <div class="container lg:p-12 lg:flex-1   mx-auto lg:max-w-7xl">
            <h1 class=" text-2xl sm:text-3xl font-semibold text-center mb-3">Menjadi Mitra Pengajar di <span class="text-[#FABE0E] dark:text-[#FABE0E]">Rifaya Education</span> </h1>
            <p class="text-justify lg:text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, amet? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium voluptatibus ut veniam deleniti quae maxime eaque aliquid reprehenderit magni nobis natus eos, hic tempore, quod neque nisi esse minus dolore reiciendis similique totam nesciunt asperiores. Aliquam obcaecati minima molestias sit error! Quibusdam architecto soluta quae nisi neque voluptatum numquam laudantium sunt rem expedita perspiciatis, similique, necessitatibus ullam repellat quam minus doloremque dignissimos earum, tenetur quas! Beatae commodi odit recusandae provident ad soluta, aliquam doloribus consequatur quibusdam quasi totam non accusamus?
            </p>
            <div class="w-full mt-5  mx-auto  ml-3 text-center">
                <a href="{{ route('teacher.register') }}" @click.prevent="Livewire.navigate('{{ route('teacher.register') }}')" class="btn-red-octaclass w-2/3 sm:w-1/5 bg-[#198754] hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300   px-12 p-3"> Daftar </a>
            </div>
        </div>
        <div class="hidden lg:flex lg:w-80 lg:h-96 lg:p-4 relative   items-center rounded-xl bg-center bg-contain bg-no-repeat bg-[url('../ ')]">
            <img src="{{ asset('asset/img/home/teacher2.png')}}" class="drop-shadow-2xl ">
        </div>
    </section>
    <section class="w-full mb-12">
        <div class="sm:w-9/12 mx-auto shadow-lg p-6 relative">
            <div class="max-lg:w-full max-lg:p-5 max-w-7xl mt-2 w-full sm:pl-1 pr-[16rem] mx-auto flex content-center flex-wrap ">
                <h1 class="font-bold text-2xl"> <span class="text-[#fabe0e]"> Rifaya Education </span> Les Private memiliki dua System pengajaran:</h1>
                <div class="text-justify mt-4">
                    <span class="text-2xl font-bold"><span class="icon-[fluent--people-swap-20-filled]"></span> Online</span> consectetur adipisicing elit. Commodi quos quo labore error blanditiis possimus animi quaerat molestiae dolorum numquam similique voluptate itaque sapiente, ad, repellendus necessitatibus? Corrupti, ea beatae.
                    <hr class="dark:border-gray-700 my-4">
                    <span class="text-2xl font-bold"><span class="icon-[fluent--people-edit-16-regular]"></span> Offline</span> consectetur adipisicing elit. Commodi quos quo labore error blanditiis possimus animi quaerat molestiae dolorum numquam similique voluptate itaque sapiente, ad, repellendus necessitatibus? Corrupti, ea beatae.

                </div>
            </div>
            <div class="max-lg:w-full max-lg:p-5 bg-[#fabe0e] dark:bg-gray-800 dark:text-slate-400 lg:p-4 lg:absolute mx-auto mt-5 h-80 w-64 lg:rounded-xl lg:shadow-lg lg:right-0 lg:top-2 text-white">
                Mengapa harus bergabung dengan <i>Les Private</i> :
                <ul class="text-justify dark:text-gray-400 text-sm">
                    <li class="mb-1">
                        <div class="flex">
                            <div class="mr-2"><span class="icon-[material-symbols--checklist-rounded]"></span> </div>
                            <div>Menambah penghasilan tiap bulannya</div>
                        </div>
                    </li>
                    <li class="mb-1">
                        <div class="flex">
                            <div class="mr-2"><span class="icon-[material-symbols--checklist-rounded]"></span> </div>
                            <div>Jadwal disesuaikan bersama</div>
                        </div>
                    </li>
                    <li class="mb-1">
                        <div class="flex">
                            <div class="mr-2"><span class="icon-[material-symbols--checklist-rounded]"></span> </div>
                            <div>Waktu flexible</div>
                        </div>
                    </li>
                    <li class="mb-1">
                        <div class="flex">
                            <div class="mr-2"><span class="icon-[material-symbols--checklist-rounded]"></span> </div>
                            <div>Menambah pengalaman</div>
                    <li class="mb-1">
                        <div class="flex">
                            <div class="mr-2"><span class="icon-[material-symbols--checklist-rounded]"></span> </div>
                            <div>Calon Siswa ter <i>verifikasi</i> </div>
                        </div>
                    </li>
                    <li class="mb-1">
                        <div class="flex">
                            <div class="mr-2"><span class="icon-[material-symbols--checklist-rounded]"></span> </div>
                            <div>Pelayanan komunikatif & informatif</div>
                        </div>
                    </li>
                    <li class="mb-1">
                        <div class="flex">
                            <div class="mr-2"><span class="icon-[material-symbols--checklist-rounded]"></span> </div>
                            <div>Sistem pembayar jelas</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="p-12 mx-auto sm:w-full  lg:flex lg:p-6 dark:bg-gray-800" id="body-section">
        <div class="hidden lg:flex lg:w-80 lg:h-96 lg:p-4 relative   items-center rounded-xl bg-center bg-contain bg-no-repeat bg-[url('../ ')]">
            <img src="{{ asset('asset/img/home/teacher-hai.png')}}" class="drop-shadow-2xl ">
        </div>
        <div class="container lg:p-12 lg:flex-1 lg:content-center  mx-auto lg:max-w-7xl">
            <h1 class=" text-2xl sm:text-3xl font-semibold text-center mb-3">Siapa saja yang bisa menjadi <span class="text-[#FABE0E] dark:text-[#FABE0E]">Mitra Pengajar ?</span> </h1>
            <p class="text-justify lg:text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, amet? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium voluptatibus ut veniam deleniti quae maxime eaque aliquid
            </p>
            <div class="w-full mt-5  mx-auto  ml-3 text-center">
                <a href="{{ route('teacher.register') }}" @click.prevent="Livewire.navigate('{{ route('teacher.register') }}')" class="btn-red-octaclass px-12 p-3 w-2/3 sm:w-1/5 bg-[#198754] hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 "> Daftar </a>
            </div>
        </div>

    </section>
    <section class="p-12 mx-auto sm:w-full  lg:flex lg:p-6"  >
        <div class="flex w-full px-12 m-auto flex-wrap ">
            <div class="w-1/2 mb-6 first-line:tracking-widest first-letter:text-8xl first-letter:float-left first-letter:font-semibold">
                1
                <p class="font-bold text-xl">Calon tutor Melakukan Registrasi</p>
                Calon Tutor mengisi form pendaftaran di halaman ini
            </div>
            <div class="w-1/2 mb-6 first-line:tracking-widest first-letter:text-8xl first-letter:float-left first-letter:font-semibold">
                2
                <p class="font-bold text-xl">Menunggu Verifikasi</p>
                setelah mengisi form pendaftaran maka admin rifaya akan melakukan verifikasi, waktu yang dibutuhkan 4 hari sd 1 minggu
            </div>
            <div class="w-1/2 mb-6 first-line:tracking-widest first-letter:text-8xl first-letter:float-left first-letter:font-semibold">
                3
                <p class="font-bold text-xl">Di hubungi admin</p>
                Admin akan memberikan link aktivasi akun guru
            </div>
            <div class="w-1/2 mb-6 first-line:tracking-widest first-letter:text-8xl first-letter:float-left first-letter:font-semibold">
                4
                <p class="font-bold text-xl">Calon tutor Melakukan Registrasi</p>
                Calon Tutor mengisi form pendaftaran di halaman ini
            </div>

        </div>
    </section>
</div>
