

<div class=" @if($content == 1) sm:w-full  lg:flex lg:p-6 lg:max-w-full @endif ">

    @if($content == 1)
        <div class="hidden lg:flex lg:w-1/2 lg:h-96 lg:p-4 relative bg-gray-200   dark:bg-gray-600 items-center rounded-xl bg-center bg-cover animate-pulse">
            <div
                class="animate-ping-slow h-16 w-16 m-auto cursor-pointer bg-white/20 backdrop-blur-sm flex rounded-full scale-90">
                <p class="m-auto icon-[charm--media-play]  text-4xl ml-5 text-white/80 "> </p>
            </div>
        </div>
        <div class="lg:p-12 lg:flex-1 lg:items-center  animate-pulse">
            <h1 class=" text-2xl sm:text-3xl font-semibold text-center bg-gray-200 rounded dark:bg-gray-600 h-5 mb-2.5"> </h1>
            <p class="text-center mb-2.5 lg:text-left bg-gray-200 rounded dark:bg-gray-600 h-2.5"> </p>
            <p class="text-center mb-2.5 lg:text-left bg-gray-200 rounded dark:bg-gray-600 h-2.5"> </p>
            <div class="h-52 mt-2 lg:hidden  flex  p-4 relative bg-gray-200   dark:bg-gray-600 items-center rounded-xl bg-center bg-cover  ">
                <div
                    class="animate-ping-slow h-10 w-10 m-auto cursor-pointer bg-white/20 backdrop-blur-sm flex rounded-full scale-90">
                    <p class="m-auto icon-[charm--media-play]  text-2xl ml-3 sm:ml-5 text-white/80 "> </p>
                </div>
            </div>
            <div class="w-full mt-4  grid grid-cols-2 gap-0">
                <div class="w-3/4 mx-auto text-center mt-4 py-2">
                    <p class="font-bold text-4xl sm:text-5xl bg-gray-200 rounded dark:bg-gray-600 h-8  mb-2.5"> </p>
                <p class=" text-2xl sm:text-3xl font-semibold text-center bg-gray-200 rounded dark:bg-gray-600 h-2.5 mb-2.5"> </p>
                </div>
                <div class="w-3/4 mx-auto text-center mt-4 py-2">
                    <p class="font-bold text-4xl sm:text-5xl bg-gray-200 rounded dark:bg-gray-600 h-8  mb-2.5"> </p>
                <p class=" text-2xl sm:text-3xl font-semibold text-center bg-gray-200 rounded dark:bg-gray-600 h-2.5 mb-2.5"> </p>
                </div>
                <div class="w-3/4 mx-auto text-center mt-4 py-2">
                    <p class="font-bold text-4xl sm:text-5xl bg-gray-200 rounded dark:bg-gray-600 h-8  mb-2.5"> </p>
                <p class=" text-2xl sm:text-3xl font-semibold text-center bg-gray-200 rounded dark:bg-gray-600 h-2.5 mb-2.5"> </p>
                </div>
                <div class="w-3/4 mx-auto text-center mt-4 py-2">
                    <p class="font-bold text-4xl sm:text-5xl bg-gray-200 rounded dark:bg-gray-600 h-8  mb-2.5"> </p>
                <p class=" text-2xl sm:text-3xl font-semibold text-center bg-gray-200 rounded dark:bg-gray-600 h-2.5 mb-2.5"> </p>
                </div>
            </div>
        </div>
    @else
    <div class="container mx-auto w-full sm:w-2/3 min-h-52 flex flex-wrap justify-between  px-1 animate-pulse">
        <div class="text-center w-1/2 pt-5 sm:p-6 text-white dark:text-slate-400">
            <h1 class="text-3xl sm:text-6xl font-bold"><span class="icon-[ph--student-light]"></span>
            <span class="text-center mb-2.5 lg:text-left bg-gray-200 rounded dark:bg-gray-600 h-5 w-20 inline-flex"> </span>
        </h1>
            <h2 class="text-lg sm:text-3xl  ">Siswa Terdaftar</h2>
        </div>
        <div class="text-center w-1/2 pt-5 sm:p-6 text-white dark:text-slate-400">
            <h1 class="text-3xl sm:text-6xl font-bold"><span class="icon-[la--chalkboard-teacher]"></span>
            <span class="text-center mb-2.5 lg:text-left bg-gray-200 rounded dark:bg-gray-600 h-5 w-20 inline-flex"> </span>
        </div>
        <div class="text-center w-1/2 pt-5 sm:p-6 text-white dark:text-slate-400">
            <h1 class="text-3xl sm:text-6xl font-bold"><span class="icon-[mage--bookmark-question-mark] "></span>
            <span class="text-center mb-2.5 lg:text-left bg-gray-200 rounded dark:bg-gray-600 h-5 w-20 inline-flex"> </span>
        </h1>
            <h2 class="text-lg sm:text-3xl  "> Bank Soal</h2>
        </div>
        <div class="text-center w-1/2 pt-5 sm:p-6 text-white dark:text-slate-400">
            <h1 class="text-3xl sm:text-6xl font-bold">
                <span class="icon-[solar--document-add-broken]  "></span>
                <span class="text-center mb-2.5 lg:text-left bg-gray-200 rounded dark:bg-gray-600 h-5 w-20 inline-flex"> </span>
            </h1>
            <h2 class="text-lg sm:text-3xl  ">Try Out</h2>
        </div>
    </div>
    @endif


</div>
