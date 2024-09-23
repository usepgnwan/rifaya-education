@if($content ==1)
<div class="sm:w-full  lg:flex lg:p-6 lg:max-w-full ">
    <div class="hidden lg:flex lg:w-1/2 lg:h-96 lg:p-4 relative bg-yellow-300 items-center rounded-xl bg-center bg-cover bg-[url('../asset/img/test.jpg')]">
        <div
            class="animate-ping-slow h-16 w-16 m-auto cursor-pointer bg-white/20 backdrop-blur-sm flex rounded-full scale-90">
            <p class="m-auto icon-[charm--media-play]  text-4xl ml-5 text-white/80 "> </p>
        </div>
    </div>
    <div class="lg:p-12 lg:flex-1 lg:items-center ">
        <h1 class=" text-2xl sm:text-3xl font-semibold text-center">Ada apa saja di <span class="text-[#fabe0e]"> Rifaya Education </span> ?</h1>
        <p class="text-center lg:text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, amet?
        </p>
        <div class="h-52 mt-2 lg:hidden  flex  p-4 relative bg-yellow-300 items-center rounded-xl bg-center bg-cover bg-[url('../asset/img/test.jpg')]  ">
            <div
                class="animate-ping-slow h-10 w-10 m-auto cursor-pointer bg-white/20 backdrop-blur-sm flex rounded-full scale-90">
                <p class="m-auto icon-[charm--media-play]  text-2xl ml-3 sm:ml-5 text-white/80 "> </p>
            </div>
        </div>
        <div class="w-full mt-4  grid grid-cols-2 gap-0">
            <div class="w-full text-center mt-4">
                <span class="font-bold text-4xl sm:text-5xl "><span class="purecounter"   data-purecounter-start="0"
                data-purecounter-end="{{ $artikel }}">{{ $artikel }} </span>++</span><br>
                <span class="text-sm sm:text-2xl text-slate-800 dark:text-slate-400">Artikel</span>
            </div>
            <div class="w-full text-center mt-4">
                <span class="font-bold text-4xl sm:text-5xl">
                    <span class="purecounter"   data-purecounter-start="0" data-purecounter-end="{{ $bank_soal }}">{{ $bank_soal }} </span> ++</span>
                </span>
                    <br>
                <span class="text-sm sm:text-2xl text-slate-800 dark:text-slate-400">Bank Soal</span>
            </div>
            <div class="w-full text-center mt-4">
                <span class="font-bold text-4xl sm:text-5xl"><span class="purecounter"   data-purecounter-start="0"
                data-purecounter-end="{{ $to }}">{{ $to }} </span>++</span></span><br>
                <span class="text-sm sm:text-2xl text-slate-800 dark:text-slate-400">try Out</span>
            </div>
            <div class="w-full text-center mt-4">
                <span class="font-bold text-4xl sm:text-5xl"><span class="purecounter"   data-purecounter-start="0"
                data-purecounter-end="{{ $kelas }}">{{ $kelas }} </span>++</span></span><br>
                <span class="text-sm sm:text-2xl text-slate-800 dark:text-slate-400">Kelas Intensif</span>
            </div>
        </div>
    </div>
</div>
@else
<div class="container mx-auto w-full sm:w-2/3 min-h-52 flex flex-wrap justify-between  px-1">
    <div class="text-center w-1/2 pt-5 sm:p-6 text-white dark:text-slate-400">
        <h1 class="text-3xl sm:text-6xl font-bold"><span class="icon-[ph--student-light]"></span>
        <span class="purecounter" data-purecounter-start="0" data-purecounter-end="{{$siswa}}">{{$siswa}} </span> ++</span>
    </h1>
        <h2 class="text-lg sm:text-3xl  ">Siswa Terdaftar</h2>
    </div>
    <div class="text-center w-1/2 pt-5 sm:p-6 text-white dark:text-slate-400">
        <h1 class="text-3xl sm:text-6xl font-bold"><span class="icon-[la--chalkboard-teacher]"></span> <span class="purecounter" data-purecounter-start="0" data-purecounter-end="{{ $guru }}">{{ $guru }} </span> ++</h1>
        <h2 class="text-lg sm:text-3xl  "> Tutor Berpengalaman</h2>
    </div>
    <div class="text-center w-1/2 pt-5 sm:p-6 text-white dark:text-slate-400">
        <h1 class="text-3xl sm:text-6xl font-bold"><span class="icon-[mage--bookmark-question-mark] "></span> <span class="purecounter" data-purecounter-start="0" data-purecounter-end="{{ $bank_soal }}">{{ $bank_soal }} </span> ++</h1>
        <h2 class="text-lg sm:text-3xl  "> Bank Soal</h2>
    </div>
    <div class="text-center w-1/2 pt-5 sm:p-6 text-white dark:text-slate-400">
        <h1 class="text-3xl sm:text-6xl font-bold">
            <span class="icon-[solar--document-add-broken]  "></span>
            <span class="purecounter" data-purecounter-start="0" data-purecounter-end="{{ $to }}">{{ $to }} </span> ++
        </h1>
        <h2 class="text-lg sm:text-3xl  ">Try Out</h2>
    </div>
</div>
@endif
