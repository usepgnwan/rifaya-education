<section>
<h1 class="text-2xl font-semibold text-gray-900 mb-2">Users</h1>
<x-partials.dashboard.breadcumb :data="$breadcumb"> </x-partials.dashboard.breadcumb>

<div class="   w-full lg:min-h-[69vh] max-lg:min-h-[85vh]  grid grid-cols-1 gap-0 lg:flex lg:gap-6">
    <div class="sm:px-4  lg:w-[70%]">
        <div class="w-full">
            <div class="flex mb-1  gap-1 flex-wrap">

                @foreach ($user->kelas as $v )
                <div class="pill-yellow-octaclass text-xs px-7 rounded-2xl mb-2">
                    <div class="flex">
                        <div><span class="icon-[la--chalkboard-teacher]  text-lg"></span></div>
                        <div class="px-1 font-sm">{{ $v->title ?? '-' }} - {{ $v->jenjang->title ?? '-' }}</div>
                    </div>
                </div>
                @endforeach

                @foreach ($user->mata_pelajaran as  $v)

                <div class="pill-octaclass text-xs  px-7 rounded-2xl mb-2">{{$v->title ?? '-'}}</div>
                @endforeach
                @foreach ($user->user_metodemengajar as  $v)
                    @if($v->title == 'online')
                    <div class="pill-octaclass text-xs  px-7 rounded-2xl mb-2">
                        <div class=" flex">
                            <div><span class="icon-[pepicons-print--camera] text-lg"></span></div>
                            <div class="px-1 font-sm">{{$v->title ?? '-'}}</div>
                        </div>
                    </div>
                    @else
                    <div class="pill-octaclass text-xs  px-7 rounded-2xl mb-2">
                        <div class=" flex">
                            <div><span class="icon-[fluent--people-edit-16-regular] text-lg"></span></div>
                            <div class="px-1 font-sm">{{$v->title ?? '-'}}</div>
                        </div>
                    </div>
                    @endif
                @endforeach

            </div>
            <div class="w-full">
                <blockquote class=" p-2 text-center mt-5 relative rounded-xl text-xl italic font-semibold text-gray-900 dark:border-gray-800 dark:text-white border ">
                    <svg class="w-8 h-8 absolute -top-4 -left-2 text-gray-400 dark:text-gray-800 mb-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                        <path d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z"></path>
                    </svg>
                    <p class="text-2xl p-3">  {{ $user->quote ?? '' }} </p>
                </blockquote>
            </div>

            <div class="mt-4 p-5 card-bordered-yellow-octaclass shadow-md">
                <h1 class="text-lg font-semibold">Profile</h1>
                <div class="grid grid-col mt-2">
                    <div>
                    <span class="icon-[entypo--address]"></span> Alamat domisili : {{   $user->user_profile->alamat_domisili ?? '-' }}
                    </div>
                    <div>
                        <span class="icon-[ic--outline-whatsapp]"></span> Nomor Telp / Wa : {{ $user->user_profile->no_telp ?? '-' }}
                    </div>
                    <div>
                        <span class="icon-[solar--calendar-bold]"></span> Tanggal Lahir : {{ $user->user_profile->tanggal_lahir ?? '-' }}
                    </div>
                    <div>
                        <span class="icon-[clarity--computer-solid]"></span> Perangkat Ajar : {{ $user->user_profile->perangkat_ajar ?? '-' }}
                    </div>
                    <div>
                        <span class="icon-[material-symbols--emoji-transportation]"></span> Kendaraan : {{ $user->user_profile->kendaraan ?? '-' }}
                    </div>
                    <div>
                        <span class="icon-[solar--card-bold]"></span> SIM : {{ $user->user_profile->sim ?? '-' }}
                    </div>

                </div>
            </div>
            <div class="mt-4 p-5 card-bordered-yellow-octaclass shadow-md">
                <h1 class="text-lg font-semibold">Ketersediaan Waktu Mengajar</h1>
                <div class="grid grid-cols-1 gap-0 ">
                    <div>
                        <span class="icon-[material-symbols--today] "></span> Hari
                        <br>
                        <ul class="list-disc list-inside pl-5 text-gray-800 space-y-0">
                            @foreach ($user->user_waktu as $v)
                            <li>{{ $v->title ?? '-' }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <span class="icon-[ri--time-line] "></span> Jam Ajar
                        <br>
                        <ul class="list-disc list-inside pl-5 text-gray-800 space-y-0">
                            @foreach ($user->user_jam_ajar as $v)
                            <li>{{ $v->title ?? '-' }}</li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
            <div class="mt-4 p-5 card-bordered-yellow-octaclass shadow-md">
                <h1 class="text-lg font-semibold">Wilayah Mengajar</h1>
                <div class=" flex mt-2">
                    <div class="text-xl bg-slate-300  rounded-xl  text-white dark:bg-transparent  px-2 py-1 dark:border-slate-900 dark:border dark:text-slate-800"><span class="icon-[carbon--location-filled] text-3xl mt-1 "></span></div>
                    <div class="px-4 font-sm"> <span class="font-semibold"> - </span> <br> <span class="text-sm text-slate-600">-</span></div>
                </div>
            </div>
            <div class="mt-4 p-5 card-bordered-yellow-octaclass shadow-md">
                <h1 class="text-lg font-semibold">Lembaga bimbel/les lain</h1>
                <p class="text-justify  mt-2">{{ $user->user_profile->lembaga_saat_ini ?? '-' }}</p>
            </div>

            <hr class="my-3 dark:border-slate-800">
            <div class="mt-4" id="ulasan">
                <h1 class="text-lg font-semibold">Ulasan dari siswa/wali ajar</h1>
                Belum tersedia
                <div class=" flex mt-2 hidden">
                    <div class="w-full border dark:border-slate-800 p-4 rounded-3xl my-2">
                        <div class="flex justify-between">
                            <div class="  text-sm py-2 flex">
                                <img id="avatarButton" class="w-8 h-8 h-w-8 rounded-full cursor-pointer" src="https://via.placeholder.com/600x1200" alt="User">
                                <div class="px-4 pt-1 font-semibold">Gunawan</div>
                            </div>
                            <div class="py-2">
                                <div class="pill-octaclass bg-yellow-200 dark:bg-slate-600 text-xs  px-4 rounded-2xl mb-2"><span class="icon-[fluent-emoji--star]"></span> 5</div>
                            </div>
                        </div>
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea enim autem dicta iusto distinctio nemo possimus animi, odit eum quod earum quam? Facilis quia dolorem laboriosam quis accusantium porro aliquid?
                        </p>
                    </div>
                </div>
                <div class="justify-end flex mt-2 hidden">
                    <div class=" w-3/4 border dark:border-slate-800 p-4 rounded-3xl my-2">
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea enim autem dicta iusto distinctio nemo possimus animi, odit eum quod earum quam? Facilis quia dolorem laboriosam quis accusantium porro aliquid?
                        </p>
                        <div class="flex justify-end">
                            <div class="  text-sm  flex">
                                <img id="avatarButton" class="w-8 h-8 h-w-8 rounded-full cursor-pointer" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="User">
                                <div class="px-4 pt-1 font-semibold">Rani Oktaviani</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" flex mt-2 hidden">
                    <div class="w-full border dark:border-slate-800 p-4 rounded-3xl my-2">
                        <div class="flex justify-between">
                            <div class="  text-sm py-2 flex">
                                <img id="avatarButton" class="w-8 h-8 h-w-8 rounded-full cursor-pointer" src="https://via.placeholder.com/600x1200" alt="User">
                                <div class="px-4 pt-1 font-semibold">Gunawan</div>
                            </div>
                            <div class="py-2">
                                <div class="pill-octaclass bg-yellow-200 dark:bg-slate-600 text-xs  px-4 rounded-2xl mb-2"><span class="icon-[fluent-emoji--star]"></span> 5</div>
                            </div>
                        </div>
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea enim autem dicta iusto distinctio nemo possimus animi, odit eum quod earum quam? Facilis quia dolorem laboriosam quis accusantium porro aliquid?
                        </p>
                    </div>
                </div>

                <div class="justify-end flex mt-2 hidden">
                    <p class="text-sm text-sky-700">Lihat lainnya <span class="icon-[formkit--arrowright] self-center"></span></p>
                </div>


            </div>

        </div>
    </div>
    <div class="flex col-start-1 row-start-1 w-full lg:w-2/5 ">
        <div class="w-full">
            <div class="card-bordered-yellow-octaclass shadow-lg  w-full lg:sticky lg:top-24">
                <div class=" lg:p-4 relative  mx-auto mt-5 mb-2 h-48 w-48 rounded-full bg-cover bg-center bg-no-repeat"   style="background-image: url('{{ $user->profile}}')">
                </div>
                <div class="w-full text-center my-3">
                    <h3 class="font-semibold">{{ $user->name }}</h3>
                    <p class="text-xs text-sky-600 hidden">Perempuan</p>
                    <p><span class="icon-[fluent-emoji--star]"></span> 5 (<a href="#ulasan" class="text-yellow-200"> 12 Ulasan</a>)</p>
                </div>
                <div class="px-2 mb-2 flex">
                    <div> <span class="icon-[lets-icons--group-add]"></span> </div>
                    <div class="px-2  font-sm relative">Jumlah Murid <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full mx-2 dark:border-gray-900">5</div>
                    </div>
                </div>
                <div class="px-2 mb-2 flex">
                    <div> <span class="icon-[teenyicons--school-outline]"></span> </div>
                    <div class="px-2  font-sm">{{ $user->user_profile->nama_kampus ?? '-' }}</div>
                </div>
                <div class="px-2  mb-2 flex">
                    <div class=""> <span class="icon-[carbon--education]"></span> </div>
                    <div class="px-2 font-sm">{{ $user->user_profile->jurusan ?? '-' }}</div>
                </div>
                <div class="px-2  mb-2 flex">
                    <div class=""> <span class="icon-[ic--outline-class]"></span> </div>
                    <div class="px-2 font-sm">{{ $user->user_profile->semester ?? '-' }}</div>
                </div>
                <div class="px-2  mb-2 flex">
                    <div class=""> <span class="icon-[fluent-mdl2--calendar-year]"></span> </div>
                    <div class="px-2 font-sm">{{ $user->user_profile->tahun_masuk ?? '-' }}/{{ $user->user_profile->tahun_lulus ?? '-' }}</div>
                </div>

                <a href="{{ $user->user_profile->cv  ?? ''}}" target="_blank" class="btn-red-octaclass flex justify-center items-center h-[2.65rem] w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300  dark:border-gray-800 dark:text-gray-700 dark:bg-gray-900 dark:hover:bg-gray-800 dark:hover:text-slate-400"> <span class="icon-[prime--file-pdf]  text-xl inline-block"></span> <span class="px-1">Download Cv</span> </a>
            </div>
        </div>

    </div>
</div>
</section>
