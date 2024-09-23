@extends('template_page')
@section('content')
<section class=" dark:bg-gray-800 bg-[#FABE0E] ">
        <div class="container mx-auto lg:mx-auto lg:mt-0  p-5 w-full lg:min-h-[69vh] max-lg:min-h-[85vh]  grid grid-cols-1 gap-0 lg:flex lg:gap-6">
            <div class="lg:flex-[1 1 70%] sm:px-14 text-center lg:w-full sm:mt-[-400px] lg:mt-24">
                <p class="text-4xl sm:mt-20 sm:text-5xl tracking-wide font-bold  dark:text-slate-400 ">Mulai <span class="text-sky-400 dark:"> Belajarmu </span> Bersama </p>
                <div class="w-max mx-auto mb-5 text-4xl sm:text-5xl">
                    <h1 class="  text-sky-400 animate-typing overflow-hidden whitespace-nowrap border-r-4 border-r-skytext-sky-400 pr-5 text-3xl sm:text-5xl  font-bold">Rifaya Education</h1>
                </div>
                <p class=" dark:text-slate-400">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto, suscipit?</p>
                <div class="relative w-full mr-3 mt-4 shadow-lg">
                    <div class="absolute inset-y-0 right-4 flex items-center pl-3.5 pointer-events-none my-auto">
                        <span class="icon-[ion--search-outline] text-xl font-semibold"></span>
                    </div>
                    <input
                        class="formkit-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pr-10 p-4 dark:bg-gray-700 dark:border-gray-600 dark:focus:border-gray-600 dark:placeholder-gray-400  dark:text-slate-400 dark:focus:ring-blue-500  "
                        name="email_address" placeholder="cari">
                </div>
            </div>
            <div class="flex col-start-1 row-start-1 h-72 m-auto sm:h-1/2 sm:mt-[-20px]  lg:mt-24 my-auto sm:pl-10 ">
                <img src="{{ asset('asset/img/home/teacher-hai.png')}}" alt="" class="mx-auto lg:w-96">
            </div>
        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"  class="mt-[-1px] dark:fill-gray-800 fill-[#FABE0E]"><path   fill-opacity="1" d="M0,160L60,144C120,128,240,96,360,80C480,64,600,64,720,80C840,96,960,128,1080,122.7C1200,117,1320,75,1380,53.3L1440,32L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>
    <section class="container px-6 mx-auto sm:w-full  lg:flex lg:p-6 lg:max-w-full" id="body-section">
        <div
            class="hidden lg:flex lg:w-1/2 lg:h-96 lg:p-4 relative bg-yellow-300 items-center rounded-xl bg-center bg-cover bg-[url('../asset/img/test.jpg')]">
            <div
                class="animate-ping-slow h-16 w-16 m-auto cursor-pointer bg-white/20 backdrop-blur-sm flex rounded-full scale-90">
                <p class="m-auto icon-[charm--media-play]  text-4xl ml-5 text-white/80 "> </p>
            </div>
        </div>
        <div class="lg:p-12 lg:flex-1 lg:items-center ">
            <h1 class=" text-2xl sm:text-3xl font-semibold text-center">Ada apa saja di <span class="text-[#fabe0e]">  Rifaya Education </span> ?</h1>
            <p class="text-center lg:text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, amet?
            </p>
            <div  class="h-52 mt-2 lg:hidden  flex  p-4 relative bg-yellow-300 items-center rounded-xl bg-center bg-cover bg-[url('../asset/img/test.jpg')]  ">
                <div
                    class="animate-ping-slow h-10 w-10 m-auto cursor-pointer bg-white/20 backdrop-blur-sm flex rounded-full scale-90">
                    <p class="m-auto icon-[charm--media-play]  text-2xl ml-3 sm:ml-5 text-white/80 "> </p>
                </div>
            </div>
            <div class="w-full mt-4  grid grid-cols-2 gap-0">
                <div class="w-full text-center mt-4">
                    <span class="font-bold text-4xl sm:text-5xl">80++</span><br>
                    <span class="text-sm sm:text-2xl text-slate-800 dark:text-slate-400">Artikel</span>
                </div>
                <div class="w-full text-center mt-4">
                    <span class="font-bold text-4xl sm:text-5xl">80++</span><br>
                    <span class="text-sm sm:text-2xl text-slate-800 dark:text-slate-400">Bank Soal</span>
                </div>
                <div class="w-full text-center mt-4">
                    <span class="font-bold text-4xl sm:text-5xl">80++</span><br>
                    <span class="text-sm sm:text-2xl text-slate-800 dark:text-slate-400">try Out</span>
                </div>
                <div class="w-full text-center mt-4">
                    <span class="font-bold text-4xl sm:text-5xl">80++</span><br>
                    <span class="text-sm sm:text-2xl text-slate-800 dark:text-slate-400">Kelas Intensif</span>
                </div>
            </div>
        </div>
    </section>
    <section class="container mt-12 mx-auto ">
        <div class="w-10/12 sm:w-2/3 mx-auto p-5 flex gap-3">
            <select id="countries" class=" border sm:text-xl text-center text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block   p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500  w-80 bg-sky-500 text-white">
                <option value="CA">SD</option>
                <option value="CA" selected>SMP</option>
                <option value="CA">SMA</option>
            </select>
            <div  class="text-center cursor- dark:bg-gray-800 dark:hover:bg-gray-800 bg-[#FABE0E]  text-white hover:bg-[#FABE0E] p-1 w-80 rounded-full hover:text-white sm:text-3xl font-bold">    VI</div>
            <div class="text-center cursor-pointer dark:hover:bg-gray-800 hover:bg-[#FABE0E] p-1 w-80 rounded-full hover:text-white sm:text-3xl font-bold">  VII</div>
            <div  class="text-center cursor-pointer dark:hover:bg-gray-800 hover:bg-[#FABE0E] p-1 w-80 rounded-full hover:text-white sm:text-3xl font-bold">  VIII</div>
        </div>
        <div class="p-2 grid grid-cols-2 gap-2 md:grid-cols-3 md:p-4 lg:w-4/5 mx-auto" id="content-nya">
            <div class="card-grid group group/detail mt-2 saturate-150">
                <div
                    class="w-full h-full bg-[url('https://images.unsplash.com/photo-1718042416613-43cc2d64f518?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wzNzgzNzV8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MjpExMTczNjB8&ixlib=rb-4.0.3&q=80&w=1080')] bg-center bg-cover absolute group-hover:scale-125 transition-all duration-500  ">
                </div>
                <div  class="absolute  bottom-[-200px]   group-hover/detail:bottom-0 lg:group-hover/detail:bottom-0  group-hover/detail:transition-all  group-hover/detail:duration-500 z-20 text-white  h-48 lg:h-28 dark:bg-gray-800 dark:text-slate-400  bg-[#FABE0E]  pt-2   w-full p-3   rounded-tl-3xl  rounded-tr-3xl ">
                    <div class="w-full text-center font-bold text-xl  sm:mt-0 sm:mb-2 mb-1">Himpunan</div>
                    <div class="flex justify-between flex-wrap columns-2">
                        <div class="text-center text-sm max-lg:w-1/2"><a href=""><span
                                    class="icon-[lets-icons--file-dock-duotone] hidden sm:inline-block"></span><br
                                    class="hidden sm:inline-block"><span
                                    class="text-xs sm:text-sm">Artikel</span><br><span class="">90</span></a></div>
                        <div class="text-center text-sm max-lg:w-1/2"><span
                                class="icon-[mage--bookmark-question-mark] hidden sm:inline-block"></span><br
                                class="hidden sm:inline-block"><span class="text-xs sm:text-sm">Bank Soal</span><br>90
                        </div>
                        <div class="text-center text-sm max-lg:w-1/2"><span
                                class="icon-[solar--document-add-broken] hidden sm:inline-block"></span><br
                                class="hidden sm:inline-block"><span class="text-xs sm:text-sm">Try Out</span><br>90
                        </div>
                        <div class="text-center text-sm max-lg:w-1/2"><span
                                class="icon-[teenyicons--school-outline] hidden sm:inline-block"></span><br
                                class="hidden sm:inline-block"><span class="text-xs sm:text-sm">Kelas
                                Intensif</span><br>90</div>
                    </div>
                </div>
            </div>
            <div class="card-grid group group/detail mt-2 saturate-150">
                <div
                    class="w-full h-full bg-[url('https://images.unsplash.com/photo-1718042416613-43cc2d64f518?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wzNzgzNzV8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MjpExMTczNjB8&ixlib=rb-4.0.3&q=80&w=1080')] bg-center bg-cover absolute group-hover:scale-125 transition-all duration-500  ">
                </div>
                <div  class="absolute  bottom-[-200px]   group-hover/detail:bottom-0 lg:group-hover/detail:bottom-0  group-hover/detail:transition-all  group-hover/detail:duration-500 z-20 text-white  h-48 lg:h-28 dark:bg-gray-800 dark:text-slate-400  bg-[#FABE0E]  pt-2   w-full p-3   rounded-tl-3xl  rounded-tr-3xl ">
                    <div class="w-full text-center font-bold text-xl  sm:mt-0 sm:mb-2 mb-1">Himpunan</div>
                    <div class="flex justify-between flex-wrap columns-2">
                        <div class="text-center text-sm max-lg:w-1/2"><a href=""><span
                                    class="icon-[lets-icons--file-dock-duotone] hidden sm:inline-block"></span><br
                                    class="hidden sm:inline-block"><span
                                    class="text-xs sm:text-sm">Artikel</span><br><span class="">90</span></a></div>
                        <div class="text-center text-sm max-lg:w-1/2"><span
                                class="icon-[mage--bookmark-question-mark] hidden sm:inline-block"></span><br
                                class="hidden sm:inline-block"><span class="text-xs sm:text-sm">Bank Soal</span><br>90
                        </div>
                        <div class="text-center text-sm max-lg:w-1/2"><span
                                class="icon-[solar--document-add-broken] hidden sm:inline-block"></span><br
                                class="hidden sm:inline-block"><span class="text-xs sm:text-sm">Try Out</span><br>90
                        </div>
                        <div class="text-center text-sm max-lg:w-1/2"><span
                                class="icon-[teenyicons--school-outline] hidden sm:inline-block"></span><br
                                class="hidden sm:inline-block"><span class="text-xs sm:text-sm">Kelas
                                Intensif</span><br>90</div>
                    </div>
                </div>
            </div>
            <div class="card-grid group group/detail mt-2 saturate-150">
                <div
                    class="w-full h-full bg-[url('https://images.unsplash.com/photo-1718042416613-43cc2d64f518?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wzNzgzNzV8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MjpExMTczNjB8&ixlib=rb-4.0.3&q=80&w=1080')] bg-center bg-cover absolute group-hover:scale-125 transition-all duration-500  ">
                </div>
                <div  class="absolute  bottom-[-200px]   group-hover/detail:bottom-0 lg:group-hover/detail:bottom-0  group-hover/detail:transition-all  group-hover/detail:duration-500 z-20 text-white  h-48 lg:h-28 dark:bg-gray-800 dark:text-slate-400  bg-[#FABE0E]  pt-2   w-full p-3   rounded-tl-3xl  rounded-tr-3xl ">
                    <div class="w-full text-center font-bold text-xl  sm:mt-0 sm:mb-2 mb-1">Himpunan</div>
                    <div class="flex justify-between flex-wrap columns-2">
                        <div class="text-center text-sm max-lg:w-1/2"><a href=""><span
                                    class="icon-[lets-icons--file-dock-duotone] hidden sm:inline-block"></span><br
                                    class="hidden sm:inline-block"><span
                                    class="text-xs sm:text-sm">Artikel</span><br><span class="">90</span></a></div>
                        <div class="text-center text-sm max-lg:w-1/2"><span
                                class="icon-[mage--bookmark-question-mark] hidden sm:inline-block"></span><br
                                class="hidden sm:inline-block"><span class="text-xs sm:text-sm">Bank Soal</span><br>90
                        </div>
                        <div class="text-center text-sm max-lg:w-1/2"><span
                                class="icon-[solar--document-add-broken] hidden sm:inline-block"></span><br
                                class="hidden sm:inline-block"><span class="text-xs sm:text-sm">Try Out</span><br>90
                        </div>
                        <div class="text-center text-sm max-lg:w-1/2"><span
                                class="icon-[teenyicons--school-outline] hidden sm:inline-block"></span><br
                                class="hidden sm:inline-block"><span class="text-xs sm:text-sm">Kelas
                                Intensif</span><br>90</div>
                    </div>
                </div>
            </div>
            <div class="card-grid group group/detail mt-2 saturate-150">
                <div
                    class="w-full h-full bg-[url('https://images.unsplash.com/photo-1718042416613-43cc2d64f518?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wzNzgzNzV8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MjpExMTczNjB8&ixlib=rb-4.0.3&q=80&w=1080')] bg-center bg-cover absolute group-hover:scale-125 transition-all duration-500  ">
                </div>
                <div  class="absolute  bottom-[-200px]   group-hover/detail:bottom-0 lg:group-hover/detail:bottom-0  group-hover/detail:transition-all  group-hover/detail:duration-500 z-20 text-white  h-48 lg:h-28 dark:bg-gray-800 dark:text-slate-400  bg-[#FABE0E]  pt-2   w-full p-3   rounded-tl-3xl  rounded-tr-3xl ">
                    <div class="w-full text-center font-bold text-xl  sm:mt-0 sm:mb-2 mb-1">Himpunan</div>
                    <div class="flex justify-between flex-wrap columns-2">
                        <div class="text-center text-sm max-lg:w-1/2"><a href=""><span
                                    class="icon-[lets-icons--file-dock-duotone] hidden sm:inline-block"></span><br
                                    class="hidden sm:inline-block"><span
                                    class="text-xs sm:text-sm">Artikel</span><br><span class="">90</span></a></div>
                        <div class="text-center text-sm max-lg:w-1/2"><span
                                class="icon-[mage--bookmark-question-mark] hidden sm:inline-block"></span><br
                                class="hidden sm:inline-block"><span class="text-xs sm:text-sm">Bank Soal</span><br>90
                        </div>
                        <div class="text-center text-sm max-lg:w-1/2"><span
                                class="icon-[solar--document-add-broken] hidden sm:inline-block"></span><br
                                class="hidden sm:inline-block"><span class="text-xs sm:text-sm">Try Out</span><br>90
                        </div>
                        <div class="text-center text-sm max-lg:w-1/2"><span
                                class="icon-[teenyicons--school-outline] hidden sm:inline-block"></span><br
                                class="hidden sm:inline-block"><span class="text-xs sm:text-sm">Kelas
                                Intensif</span><br>90</div>
                    </div>
                </div>
            </div>
            <div class="card-grid group group/detail mt-2 saturate-150">
                <div
                    class="w-full h-full bg-[url('https://images.unsplash.com/photo-1718042416613-43cc2d64f518?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wzNzgzNzV8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MjpExMTczNjB8&ixlib=rb-4.0.3&q=80&w=1080')] bg-center bg-cover absolute group-hover:scale-125 transition-all duration-500  ">
                </div>
                <div  class="absolute  bottom-[-200px]   group-hover/detail:bottom-0 lg:group-hover/detail:bottom-0  group-hover/detail:transition-all  group-hover/detail:duration-500 z-20 text-white  h-48 lg:h-28 dark:bg-gray-800 dark:text-slate-400  bg-[#FABE0E]  pt-2   w-full p-3   rounded-tl-3xl  rounded-tr-3xl ">
                    <div class="w-full text-center font-bold text-xl  sm:mt-0 sm:mb-2 mb-1">Himpunan</div>
                    <div class="flex justify-between flex-wrap columns-2">
                        <div class="text-center text-sm max-lg:w-1/2"><a href=""><span
                                    class="icon-[lets-icons--file-dock-duotone] hidden sm:inline-block"></span><br
                                    class="hidden sm:inline-block"><span
                                    class="text-xs sm:text-sm">Artikel</span><br><span class="">90</span></a></div>
                        <div class="text-center text-sm max-lg:w-1/2"><span
                                class="icon-[mage--bookmark-question-mark] hidden sm:inline-block"></span><br
                                class="hidden sm:inline-block"><span class="text-xs sm:text-sm">Bank Soal</span><br>90
                        </div>
                        <div class="text-center text-sm max-lg:w-1/2"><span
                                class="icon-[solar--document-add-broken] hidden sm:inline-block"></span><br
                                class="hidden sm:inline-block"><span class="text-xs sm:text-sm">Try Out</span><br>90
                        </div>
                        <div class="text-center text-sm max-lg:w-1/2"><span
                                class="icon-[teenyicons--school-outline] hidden sm:inline-block"></span><br
                                class="hidden sm:inline-block"><span class="text-xs sm:text-sm">Kelas
                                Intensif</span><br>90</div>
                    </div>
                </div>
            </div>
            <div class="card-grid group group/detail mt-2 saturate-150">
                <div
                    class="w-full h-full bg-[url('https://images.unsplash.com/photo-1718042416613-43cc2d64f518?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wzNzgzNzV8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MjpExMTczNjB8&ixlib=rb-4.0.3&q=80&w=1080')] bg-center bg-cover absolute group-hover:scale-125 transition-all duration-500  ">
                </div>
                <div  class="absolute  bottom-[-200px]   group-hover/detail:bottom-0 lg:group-hover/detail:bottom-0  group-hover/detail:transition-all  group-hover/detail:duration-500 z-20 text-white  h-48 lg:h-28 dark:bg-gray-800 dark:text-slate-400  bg-[#FABE0E]  pt-2   w-full p-3   rounded-tl-3xl  rounded-tr-3xl ">
                    <div class="w-full text-center font-bold text-xl  sm:mt-0 sm:mb-2 mb-1">Himpunan</div>
                    <div class="flex justify-between flex-wrap columns-2">
                        <div class="text-center text-sm max-lg:w-1/2"><a href=""><span
                                    class="icon-[lets-icons--file-dock-duotone] hidden sm:inline-block"></span><br
                                    class="hidden sm:inline-block"><span
                                    class="text-xs sm:text-sm">Artikel</span><br><span class="">90</span></a></div>
                        <div class="text-center text-sm max-lg:w-1/2"><span
                                class="icon-[mage--bookmark-question-mark] hidden sm:inline-block"></span><br
                                class="hidden sm:inline-block"><span class="text-xs sm:text-sm">Bank Soal</span><br>90
                        </div>
                        <div class="text-center text-sm max-lg:w-1/2"><span
                                class="icon-[solar--document-add-broken] hidden sm:inline-block"></span><br
                                class="hidden sm:inline-block"><span class="text-xs sm:text-sm">Try Out</span><br>90
                        </div>
                        <div class="text-center text-sm max-lg:w-1/2"><span
                                class="icon-[teenyicons--school-outline] hidden sm:inline-block"></span><br
                                class="hidden sm:inline-block"><span class="text-xs sm:text-sm">Kelas
                                Intensif</span><br>90</div>
                    </div>
                </div>
            </div>

            <!-- <div class="card-grid group group/detail mt-2 saturate-150">
                <div
                    class="w-full h-full bg-[url('https://images.unsplash.com/photo-1718042416613-43cc2d64f518?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wzNzgzNzV8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MjpExMTczNjB8&ixlib=rb-4.0.3&q=80&w=1080')] bg-center bg-cover absolute group-hover:scale-125 transition-all duration-500  ">
                </div>
                <div
                    class="absolute sm:bottom-[-200px]  sm:group-hover/detail:bottom-0 lg:group-hover/detail:bottom-0 sm:group-hover/detail:transition-all sm:group-hover/detail:duration-500 z-20 text-white h-full sm:h-48 lg:h-28 bg-sky-transparent sm:bg-[#FABE0E] w-full p-3  sm:rounded-tl-3xl sm:rounded-tr-3xl pt-2">
                    <div class="w-full text-center font-bold text-xl  sm:mt-0 sm:mb-2 mb-1">Himpunan</div>
                    <div class="flex justify-between flex-wrap columns-2">
                        <div class="text-center text-sm max-lg:w-1/2"><a href=""><span
                                    class="icon-[lets-icons--file-dock-duotone] hidden sm:inline-block"></span><br
                                    class="hidden sm:inline-block"><span
                                    class="text-xs sm:text-sm">Artikel</span><br><span class="">90</span></a></div>
                        <div class="text-center text-sm max-lg:w-1/2"><span
                                class="icon-[mage--bookmark-question-mark] hidden sm:inline-block"></span><br
                                class="hidden sm:inline-block"><span class="text-xs sm:text-sm">Bank Soal</span><br>90
                        </div>
                        <div class="text-center text-sm max-lg:w-1/2"><span
                                class="icon-[solar--document-add-broken] hidden sm:inline-block"></span><br
                                class="hidden sm:inline-block"><span class="text-xs sm:text-sm">Try Out</span><br>90
                        </div>
                        <div class="text-center text-sm max-lg:w-1/2"><span
                                class="icon-[teenyicons--school-outline] hidden sm:inline-block"></span><br
                                class="hidden sm:inline-block"><span class="text-xs sm:text-sm">Kelas
                                Intensif</span><br>90</div>
                    </div>
                </div>
            </div> -->

        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="mb-[-1px] fill-[#FABE0E] dark:fill-gray-800"><path fill-opacity="1" d="M0,224L1440,320L1440,320L0,320Z"></path></svg>
    <section class=" p-7 px-6 mx-auto sm:w-full  lg:flex lg:p-6  bg-[#FABE0E] dark:bg-gray-800" id="body-section">
        <div class="container lg:p-12 lg:flex-1 lg:content-center mx-auto lg:max-w-7xl">
            <h1 class=" text-2xl sm:text-3xl font-semibold text-center mb-3">Apa itu <span class="text-white dark:text-white">Rifaya Education</span> </h1>
            <p class="text-justify lg:text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, amet? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium voluptatibus ut veniam deleniti quae maxime eaque aliquid reprehenderit magni nobis natus eos, hic tempore, quod neque nisi esse minus dolore reiciendis similique totam nesciunt asperiores. Aliquam obcaecati minima molestias sit error! Quibusdam architecto soluta quae nisi neque voluptatum numquam laudantium sunt rem expedita perspiciatis, similique, necessitatibus ullam repellat quam minus doloremque dignissimos earum, tenetur quas! Beatae commodi odit recusandae provident ad soluta, aliquam doloribus consequatur quibusdam quasi totam non accusamus?
            </p>
        </div>
        <div class="hidden lg:flex lg:w-80 lg:h-96 lg:p-4 relative   items-center rounded-xl bg-center bg-contain bg-no-repeat bg-[url('../ ')]">
            <img src="{{ asset('asset/img/home/teacher2.png')}}" class="drop-shadow-2xl " >
        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 " style="height: 180px;width: 100%;" class="mt-[-1px] fill-[#FABE0E] dark:fill-gray-800"><path  fill-opacity="1" d="M0,32L1440,160L1440,0L0,0Z"></path></svg>
    <section class="w-full mb-56 ">
        <div class="sm:w-9/12 mx-auto shadow-lg p-6 relative">
            <div class="max-lg:w-full max-lg:p-5 max-w-7xl mt-2 w-full sm:pl-1 pr-[16rem] mx-auto flex content-center flex-wrap ">
                <h1 class="font-bold text-2xl"><span class="text-[#fabe0e]">  Rifaya Education </span> Juga memiliki Les Private dengan System:</h1>
                <div class="text-justify mt-4">
                    <span class="text-2xl font-bold"><span class="icon-[pepicons-print--camera]  "></span> Online</span> consectetur adipisicing elit. Commodi quos quo labore error blanditiis possimus animi quaerat molestiae dolorum numquam similique voluptate itaque sapiente, ad, repellendus necessitatibus? Corrupti, ea beatae.
                    <hr class="dark:border-gray-700 my-4">
                    <span class="text-2xl font-bold"><span class="icon-[fluent--people-edit-16-regular]"></span> Offline</span> consectetur adipisicing elit. Commodi quos quo labore error blanditiis possimus animi quaerat molestiae dolorum numquam similique voluptate itaque sapiente, ad, repellendus necessitatibus? Corrupti, ea beatae.

                </div>
            </div>
            <div class="max-lg:w-full max-lg:p-5 bg-[#fabe0e] dark:bg-gray-800 dark:text-slate-400 lg:p-4 lg:absolute mx-auto mt-5   w-64 lg:rounded-xl lg:shadow-lg lg:right-0 lg:top-2 text-white">
            Keuntungan <i>Les Private</i> :
                <ul class="text-justify dark:text-gray-400 text-sm">
                    <li class="mb-1">
                        <div class="flex">
                            <div class="mr-2"><span class="icon-[material-symbols--checklist-rounded]"></span> </div>
                            <div>Termasuk biaya transportasi Pengajar bagi les private Offline   </div>
                        </div>
                    </li>
                    <li class="mb-1">
                        <div class="flex">
                            <div class="mr-2"><span class="icon-[material-symbols--checklist-rounded]"></span> </div>
                            <div>Termasuk biaya daring untuk Pengajar bagi les private Online    </div>
                        </div>
                    </li>
                    <li class="mb-1">
                        <div class="flex">
                            <div class="mr-2"><span class="icon-[material-symbols--checklist-rounded]"></span> </div>
                            <div> Durasi di sesuaikan dengan kesepakatan bersama atau dengan seminimal mungkin 60menit</div>
                        </div>
                    </li>
                    <li class="mb-1">
                        <div class="flex">
                            <div class="mr-2"><span class="icon-[material-symbols--checklist-rounded]"></span> </div>
                            <div>Menggunakan video conference yang disesuaikan dengan durasi pengajaran</div>
                        </div>
                    </li>
                    <li class="mb-1">
                        <div class="flex">
                            <div class="mr-2"><span class="icon-[material-symbols--checklist-rounded]"></span> </div>
                            <div>Tersedia untuk berbagai jenjang pendidikan dengan pengajar yang berkualitas   </div>
                        </div>
                    </li>
                    <li class="mb-1">
                        <div class="flex">
                            <div class="mr-2"><span class="icon-[material-symbols--checklist-rounded]"></span> </div>
                            <div>Dilakukan coaching pertemuan tutor dengan siswa dan orang tua</div>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </section>

    <section class="dark:bg-gray-800 bg-[#FABE0E] mb-12 mx-auto mt-32" id="resume">
        <div class="container mx-auto w-full sm:w-2/3 min-h-52 flex flex-wrap justify-between  px-1">
            <div class="text-center w-1/2 pt-5 sm:p-6 text-white dark:text-slate-400">
                <h1 class="text-3xl sm:text-6xl font-bold"><span class="icon-[ph--student-light]"></span>100+</h1>
                <h2  class="text-lg sm:text-3xl  ">Siswa Terdaftar</h2>
            </div>
            <div class="text-center w-1/2 pt-5 sm:p-6 text-white dark:text-slate-400">
                <h1 class="text-3xl sm:text-6xl font-bold"><span class="icon-[la--chalkboard-teacher]"></span> 20</h1>
                <h2  class="text-lg sm:text-3xl  "> Tutor Berpengalaman</h2>
            </div>
            <div class="text-center w-1/2 pt-5 sm:p-6 text-white dark:text-slate-400">
                <h1 class="text-3xl sm:text-6xl font-bold"><span class="icon-[mage--bookmark-question-mark] "></span> 200+</h1>
                <h2  class="text-lg sm:text-3xl  "> Bank Soal</h2>
            </div>
            <div class="text-center w-1/2 pt-5 sm:p-6 text-white dark:text-slate-400">
                <h1 class="text-3xl sm:text-6xl font-bold">
                    <span class="icon-[solar--document-add-broken]  "></span>
                    20
                </h1>
                <h2  class="text-lg sm:text-3xl  ">Try Out</h2>
            </div>
        </div>
    </section>

    <section id="faq" class="continer mt-32 mb-12">
        <h1 class="text-3xl font-bold text-center"> Apa Saja Yang Sering Di tanyakan ?</h1>
        <div class=" w-full lg:w-9/12 mx-auto flex max-lg:flex-wrap">
            <div class="lg:p-4 relative items-center rounded-xl text-center mx-auto mt-5">
                <img src="{{ asset('asset/img/home/question.png')}}" alt="" class="sm:h-56 h-36">
            </div>
            <div class="w-full mt-2 lg:w-9/12 sm:p-8 mx-2">
                <div id="accordion-open" data-accordion="open">
                    <h2 id="accordion-open-heading-1">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-800 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-open-body-1" aria-expanded="true" aria-controls="accordion-open-body-1">
                        <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg> What is Flowbite?</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                    </button>
                    </h2>
                    <div id="accordion-open-body-1" class="hidden" aria-labelledby="accordion-open-heading-1">
                    <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                        <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is an open-source library of interactive components built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.</p>
                        <p class="text-gray-500 dark:text-gray-400">Check out this guide to learn how to <a href="/docs/getting-started/introduction/" class="text-blue-600 dark:text-blue-500 hover:underline">get started</a> and start developing websites even faster with components on top of Tailwind CSS.</p>
                    </div>
                    </div>
                    <h2 id="accordion-open-heading-2">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-800 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-open-body-2" aria-expanded="false" aria-controls="accordion-open-body-2">
                        <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>Is there a Figma file available?</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                    </button>
                    </h2>
                    <div id="accordion-open-body-2" class="hidden" aria-labelledby="accordion-open-heading-2">
                    <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                        <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.</p>
                        <p class="text-gray-500 dark:text-gray-400">Check out the <a href="https://flowbite.com/figma/" class="text-blue-600 dark:text-blue-500 hover:underline">Figma design system</a> based on the utility classes from Tailwind CSS and components from Flowbite.</p>
                    </div>
                    </div>
                    <h2 id="accordion-open-heading-3">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-800 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-open-body-3" aria-expanded="false" aria-controls="accordion-open-body-3">
                        <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg> What are the differences between Flowbite and Tailwind UI?</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                    </button>
                    </h2>
                    <div id="accordion-open-body-3" class="hidden" aria-labelledby="accordion-open-heading-3">
                    <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                        <p class="mb-2 text-gray-500 dark:text-gray-400">The main difference is that the core components from Flowbite are open source under the MIT license, whereas Tailwind UI is a paid product. Another difference is that Flowbite relies on smaller and standalone components, whereas Tailwind UI offers sections of pages.</p>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">However, we actually recommend using both Flowbite, Flowbite Pro, and even Tailwind UI as there is no technical reason stopping you from using the best of two worlds.</p>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">Learn more about these technologies:</p>
                        <ul class="ps-5 text-gray-500 list-disc dark:text-gray-400">
                        <li><a href="https://flowbite.com/pro/" class="text-blue-600 dark:text-blue-500 hover:underline">Flowbite Pro</a></li>
                        <li><a href="https://tailwindui.com/" rel="nofollow" class="text-blue-600 dark:text-blue-500 hover:underline">Tailwind UI</a></li>
                        </ul>
                    </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="w-full mt-12 mb-12">
        <div class=" w-3/4 sm:w-2/3 min-h-52  mx-auto rounded-xl dark:bg-sky-950 dark:text-slate-400 bg-sky-400 h-50 shadow-lg p-4 sm:p-6  ">
            <div class="flex flex-wrap text-white dark:text-slate-400">
                <div class="w-full flex justify-center sm:text-3xl font-bold text-center text-lg ">Mulai Bergabung bersama kami</div>
                    <div class="w-full flex justify-center text-justify mt-5 mb-4 max-lg:text-sm">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem repudiandae ducimus fugit asperiores recusandae vitae ab voluptatum odio, sint quis?
                    </div>
                    <div class="w-full flex justify-center flex-wrap">
                        <div class=" flex  -space-x-4 rtl:space-x-reverse justify-center mt-1">
                            <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-400" src="/docs/images/people/profile-picture-5.jpg" alt="">
                            <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-400" src="/docs/images/people/profile-picture-2.jpg" alt="">
                            <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-400" src="/docs/images/people/profile-picture-3.jpg" alt="">
                            <a class="flex items-center justify-center w-10 h-10 text-xs font-medium text-white dark:text-slate-400 bg-gray-700 border-2 border-white rounded-full hover:bg-gray-600 dark:border-gray-800" href="#">+99</a>
                        </div>
                        <div class="w-full mt-2 sm:w-52 sm:mt-0 ml-3">
                            <button class="btn-red-octaclass"> Bergabung </button>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0" class="w-full h-[80px] mb-[-1px] fill-[#FABE0E] dark:fill-gray-800" ><path  fill-opacity="1" d="M0,32L80,32C160,32,320,32,480,42.7C640,53,800,75,960,74.7C1120,75,1280,53,1360,42.7L1440,32L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>
    <section class=" dark:bg-gray-800  bg-[#FABE0E]" id="testimoni">
        <div class="w-full sm:w-3/4 mx-auto  p-12 relative">
            <h4 class="text-center mb-5 text-2xl">Testimoni Siswa Tentang Rifaya Education </h4>
            <div class="swiper testimoni-carousel swiper-container">
                <div class="swiper-wrapper  ">
                    <figure class="swiper-slide w-full mx-auto text-center">
                        <svg class="w-10 h-10 mx-auto mb-3 text-gray-400 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                            <path d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z"/>
                        </svg>
                        <blockquote>
                            <p class="text-2xl italic font-medium text-gray-900  dark:text-slate-400">"Flowbite is just awesome. It contains tons of predesigned components and pages starting from login screen to complex dashboard. Perfect choice for your next SaaS application."</p>
                        </blockquote>
                        <figcaption class="flex flex-wrap items-center justify-center mt-6 space-x-3 rtl:space-x-reverse">
                            <img class="w-14 h-14 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gouch.png" alt="profile picture">

                                <cite class="pe-3 w-full font-medium text-gray-900  dark:text-slate-400">Michael Gough</cite>
                                <small class="pe-3 w-full font-medium text-gray-900  dark:text-slate-400">Smp 66 bandung</small>

                        </figcaption>
                    </figure>
                    <figure class="swiper-slide w-full mx-auto text-center">
                        <svg class="w-10 h-10 mx-auto mb-3 text-gray-400 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                            <path d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z"/>
                        </svg>
                        <blockquote>
                            <p class="text-2xl italic font-medium text-gray-900  dark:text-slate-400">"Flowbite is just awesome. It contains tons of predesigned components and pages starting from login screen to complex dashboard. Perfect choice for your next SaaS application."</p>
                        </blockquote>
                        <figcaption class="flex flex-wrap items-center justify-center mt-6 space-x-3 rtl:space-x-reverse">
                            <img class="w-14 h-14 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gouch.png" alt="profile picture">

                                <cite class="pe-3 w-full font-medium text-gray-900  dark:text-slate-400">Michael Gough</cite>
                                <small class="pe-3 w-full font-medium text-gray-900  dark:text-slate-400">Smp 66 bandung</small>

                        </figcaption>
                    </figure>
                    <figure class="swiper-slide w-full mx-auto text-center">
                        <svg class="w-10 h-10 mx-auto mb-3 text-gray-400 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                            <path d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z"/>
                        </svg>
                        <blockquote>
                            <p class="text-2xl italic font-medium text-gray-900  dark:text-slate-400">"Flowbite is just awesome. It contains tons of predesigned components and pages starting from login screen to complex dashboard. Perfect choice for your next SaaS application."</p>
                        </blockquote>
                        <figcaption class="flex flex-wrap items-center justify-center mt-6 space-x-3 rtl:space-x-reverse">
                            <img class="w-14 h-14 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gouch.png" alt="profile picture">

                                <cite class="pe-3 w-full font-medium text-gray-900  dark:text-slate-400">Michael Gough</cite>
                                <small class="pe-3 w-full font-medium text-gray-900  dark:text-slate-400">Smp 66 bandung</small>

                        </figcaption>
                    </figure>

                </div>
            </div>



        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 " class="w-full h-28 fill-[#FABE0E] dark:fill-gray-800"><path  fill-opacity="1" d="M0,32L80,32C160,32,320,32,480,42.7C640,53,800,75,960,74.7C1120,75,1280,53,1360,42.7L1440,32L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path></svg>
    <section class="container mb-12 mx-auto ">
        <div class="px-12  title text-leftpx-12  mx-auto">
            <p class="text-xl text-sky-400">Explore</p>
            <h1 class="text-3xl mt-1 font-bold"> Artikel Terbaru </h1>
        </div>
        <div class="container px-12 mt-5" id="card-artikel">
            <div class="w-full relative">
                <div class="swiper slide-carousel swiper-container relative ">
                    <div class="swiper-wrapper mb-16 flex">
                        <div class="swiper-slide card-octaclass-flex  ">
                            <div  class="w-full rounded-xl p-2 relative">
                                <img src="https://images.unsplash.com/photo-1718042416613-43cc2d64f518?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=M3wzNzgzNzV8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MjExMTczNjB8&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=1080" alt="" class="rounded-xl">
                                <div class="dark:bg-gray-800 absolute top-4 right-4 text-[10px] p-2 shadow-lg bg-white rounded-md content-center"> <span class="icon-[carbon--time]"></span> 2024 Jun 08</div>
                            </div>
                            <div class="px-4 py-4 dark:text-slate-400">
                                <div class="font-bold text-2xl  mb-1">Title</div>
                                    <div class="flex mb-1  gap-1">
                                        <div class="pill-octaclass">Himpunan</div>
                                        <div class="pill-octaclass">Bilangan</div>
                                        <!-- <div class="w-7 h-w-7 rounded-full cursor-pointer border text-center flex justify-center"><span class="icon-[ic--twotone-plus] mt-1"></span></div> -->
                                    </div>
                                    <p class="text-sm  px-1">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda, iusto vero! Modi, nihil eveniet enim voluptatum provident iusto reprehenderit ipsam iure.
                                    </p>
                                </div>
                                <hr class="dark:border-gray-700">
                                <div class="px-4 text-sm  py-2 flex">
                                    <img id="avatarButton" class="w-7 h-w-7 rounded-full cursor-pointer " src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="User">
                                    <div class="px-4 pt-1">Rani Oktaviani</div>
                                </div>
                        </div>
                        <div class="swiper-slide card-octaclass-flex  ">
                            <div  class="w-full rounded-xl p-2 relative">
                                <img src="https://images.unsplash.com/photo-1718042416613-43cc2d64f518?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=M3wzNzgzNzV8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MjExMTczNjB8&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=1080" alt="" class="rounded-xl">
                                <div class="dark:bg-gray-800 absolute top-4 right-4 text-[10px] p-2 shadow-lg bg-white rounded-md content-center"> <span class="icon-[carbon--time]"></span> 2024 Jun 08</div>
                            </div>
                            <div class="px-4 py-4 dark:text-slate-400">
                                <div class="font-bold text-2xl  mb-1">Title</div>
                                    <div class="flex mb-1  gap-1">
                                        <div class="pill-octaclass">Himpunan</div>
                                        <div class="pill-octaclass">Bilangan</div>
                                        <!-- <div class="w-7 h-w-7 rounded-full cursor-pointer border text-center flex justify-center"><span class="icon-[ic--twotone-plus] mt-1"></span></div> -->
                                    </div>
                                    <p class="text-sm  px-1">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda, iusto vero! Modi, nihil eveniet enim voluptatum provident iusto reprehenderit ipsam iure.
                                    </p>
                                </div>
                                <hr class="dark:border-gray-700">
                                <div class="px-4 text-sm  py-2 flex">
                                    <img id="avatarButton" class="w-7 h-w-7 rounded-full cursor-pointer " src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="User">
                                    <div class="px-4 pt-1">Rani Oktaviani</div>
                                </div>
                        </div>
                        <div class="swiper-slide card-octaclass-flex  ">
                            <div  class="w-full rounded-xl p-2 relative">
                                <img src="https://images.unsplash.com/photo-1718042416613-43cc2d64f518?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=M3wzNzgzNzV8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MjExMTczNjB8&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=1080" alt="" class="rounded-xl">
                                <div class="dark:bg-gray-800 absolute top-4 right-4 text-[10px] p-2 shadow-lg bg-white rounded-md content-center"> <span class="icon-[carbon--time]"></span> 2024 Jun 08</div>
                            </div>
                            <div class="px-4 py-4 dark:text-slate-400">
                                <div class="font-bold text-2xl  mb-1">Title</div>
                                    <div class="flex mb-1  gap-1">
                                        <div class="pill-octaclass">Himpunan</div>
                                        <div class="pill-octaclass">Bilangan</div>
                                        <!-- <div class="w-7 h-w-7 rounded-full cursor-pointer border text-center flex justify-center"><span class="icon-[ic--twotone-plus] mt-1"></span></div> -->
                                    </div>
                                    <p class="text-sm  px-1">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda, iusto vero! Modi, nihil eveniet enim voluptatum provident iusto reprehenderit ipsam iure.
                                    </p>
                                </div>
                                <hr class="dark:border-gray-700">
                                <div class="px-4 text-sm  py-2 flex">
                                    <img id="avatarButton" class="w-7 h-w-7 rounded-full cursor-pointer " src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="User">
                                    <div class="px-4 pt-1">Rani Oktaviani</div>
                                </div>
                        </div>
                        <div class="swiper-slide card-octaclass-flex  ">
                            <div  class="w-full rounded-xl p-2 relative">
                                <img src="https://images.unsplash.com/photo-1718042416613-43cc2d64f518?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=M3wzNzgzNzV8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MjExMTczNjB8&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=1080" alt="" class="rounded-xl">
                                <div class="dark:bg-gray-800 absolute top-4 right-4 text-[10px] p-2 shadow-lg bg-white rounded-md content-center"> <span class="icon-[carbon--time]"></span> 2024 Jun 08</div>
                            </div>
                            <div class="px-4 py-4 dark:text-slate-400">
                                <div class="font-bold text-2xl  mb-1">Title</div>
                                    <div class="flex mb-1  gap-1">
                                        <div class="pill-octaclass">Himpunan</div>
                                        <div class="pill-octaclass">Bilangan</div>
                                        <!-- <div class="w-7 h-w-7 rounded-full cursor-pointer border text-center flex justify-center"><span class="icon-[ic--twotone-plus] mt-1"></span></div> -->
                                    </div>
                                    <p class="text-sm  px-1">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda, iusto vero! Modi, nihil eveniet enim voluptatum provident iusto reprehenderit ipsam iure.
                                    </p>
                                </div>
                                <hr class="dark:border-gray-700">
                                <div class="px-4 text-sm  py-2 flex">
                                    <img id="avatarButton" class="w-7 h-w-7 rounded-full cursor-pointer " src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="User">
                                    <div class="px-4 pt-1">Rani Oktaviani</div>
                                </div>
                        </div>
                        <div class="swiper-slide card-octaclass-flex  ">
                            <div  class="w-full rounded-xl p-2 relative">
                                <img src="https://images.unsplash.com/photo-1718042416613-43cc2d64f518?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=M3wzNzgzNzV8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MjExMTczNjB8&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=1080" alt="" class="rounded-xl">
                                <div class="dark:bg-gray-800 absolute top-4 right-4 text-[10px] p-2 shadow-lg bg-white rounded-md content-center"> <span class="icon-[carbon--time]"></span> 2024 Jun 08</div>
                            </div>
                            <div class="px-4 py-4 dark:text-slate-400">
                                <div class="font-bold text-2xl  mb-1">Title</div>
                                    <div class="flex mb-1  gap-1">
                                        <div class="pill-octaclass">Himpunan</div>
                                        <div class="pill-octaclass">Bilangan</div>
                                        <!-- <div class="w-7 h-w-7 rounded-full cursor-pointer border text-center flex justify-center"><span class="icon-[ic--twotone-plus] mt-1"></span></div> -->
                                    </div>
                                    <p class="text-sm  px-1">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda, iusto vero! Modi, nihil eveniet enim voluptatum provident iusto reprehenderit ipsam iure.
                                    </p>
                                </div>
                                <hr class="dark:border-gray-700">
                                <div class="px-4 text-sm  py-2 flex">
                                    <img id="avatarButton" class="w-7 h-w-7 rounded-full cursor-pointer " src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="User">
                                    <div class="px-4 pt-1">Rani Oktaviani</div>
                                </div>
                        </div>
                        <div class="swiper-slide card-octaclass-flex  ">
                            <div  class="w-full rounded-xl p-2 relative">
                                <img src="https://images.unsplash.com/photo-1718042416613-43cc2d64f518?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=M3wzNzgzNzV8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MjExMTczNjB8&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=1080" alt="" class="rounded-xl">
                                <div class="dark:bg-gray-800 absolute top-4 right-4 text-[10px] p-2 shadow-lg bg-white rounded-md content-center"> <span class="icon-[carbon--time]"></span> 2024 Jun 08</div>
                            </div>
                            <div class="px-4 py-4 dark:text-slate-400">
                                <div class="font-bold text-2xl  mb-1">Title</div>
                                    <div class="flex mb-1  gap-1">
                                        <div class="pill-octaclass">Himpunan</div>
                                        <div class="pill-octaclass">Bilangan</div>
                                        <!-- <div class="w-7 h-w-7 rounded-full cursor-pointer border text-center flex justify-center"><span class="icon-[ic--twotone-plus] mt-1"></span></div> -->
                                    </div>
                                    <p class="text-sm  px-1">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda, iusto vero! Modi, nihil eveniet enim voluptatum provident iusto reprehenderit ipsam iure.
                                    </p>
                                </div>
                                <hr class="dark:border-gray-700">
                                <div class="px-4 text-sm  py-2 flex">
                                    <img id="avatarButton" class="w-7 h-w-7 rounded-full cursor-pointer " src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="User">
                                    <div class="px-4 pt-1">Rani Oktaviani</div>
                                </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-8 lg:justify-start justify-center">
                            <button id="slider-button-left" class="swiper-button-prev group !p-2 flex justify-center items-center border border-solid border-[#FABE0E] !w-12 !h-12 transition-all duration-500 rounded-full !top-2/4 !-translate-y-8 !left-5 hover:bg-[#FABE0E]  dark:border-gray-700 dark:hover:bg-gray-700" data-carousel-prev>
                        <svg class="h-5 w-5 text-[#FABE0E] dark:text-gray-400 dark:hover:text-gray-800 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M10.0002 11.9999L6 7.99971L10.0025 3.99719" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                            </button>
                            <button id="slider-button-right" class="swiper-button-next group !p-2 flex justify-center items-center border border-solid border-[#FABE0E] !w-12 !h-12 transition-all duration-500 rounded-full !top-2/4 !-translate-y-8  !right-5 hover:bg-[#FABE0E] dark:border-gray-700 dark:hover:bg-gray-700" data-carousel-next>
                            <svg class="h-5 w-5 text-[#FABE0E] dark:text-gray-400 dark:hover:text-gray-800 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M5.99984 4.00012L10 8.00029L5.99748 12.0028" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="absolute bottom-0 w-full flex content-center   justify-end z-50 mt-12">
                    <a href="" class="mt-12 rounded-full p-2 px-4   text-[#FABE0E] border border-solid border-[#FABE0E]  hover:bg-[#FABE0E] hover:text-white dark:border-gray-800 dark:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-slate-400 "> Selanjutnya <span class="icon-[formkit--arrowright] self-center"></span></a>
                </div>
            </div>
        </div>
        <div class="px-12  title text-left mx-auto">
            <h1 class="text-3xl mt-1 font-bold"> Try Out </h1>
        </div>
        <div class="container px-12 mt-5" id="try-out">
            <div class="w-full relative">
                <div class="swiper slide-carousel swiper-container relative ">
                    <div class="swiper-wrapper mb-16 flex">
                        <div class="swiper-slide card-octaclass-flex ">
                            <div  class="w-full rounded-xl p-2 relative">
                                <img src="https://images.unsplash.com/photo-1718042416613-43cc2d64f518?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=M3wzNzgzNzV8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MjExMTczNjB8&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=1080" alt="" class="rounded-xl">
                                <div class="dark:bg-gray-800 absolute top-4 right-4 text-[10px] p-2 shadow-lg bg-white rounded-md content-center"> <span class="icon-[carbon--time]"></span> 2024 Jun 08</div>
                                <div class="dark:bg-gray-800 absolute top-4 left-1 text-[10px] p-2   bg-sky-500 text-white rounded-md content-center text-sm  dark:text-sky-600 italic"> Gratis</div>
                            </div>
                            <div class="px-4 py-4 dark:text-slate-400">
                                <div class="font-bold text-2xl  mb-1">Title</div>
                                    <div class="flex mb-1  gap-1">
                                        <div class="pill-octaclass">Himpunan</div>
                                        <div class="pill-octaclass">Bilangan</div>
                                        <!-- <div class="w-7 h-w-7 rounded-full cursor-pointer border text-center flex justify-center"><span class="icon-[ic--twotone-plus] mt-1"></span></div> -->
                                    </div>
                                    <p class="text-sm  px-1">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda, iusto vero! Modi, nihil eveniet enim voluptatum provident iusto reprehenderit ipsam iure.
                                    </p>
                                </div>
                                <hr class="dark:border-gray-700">
                                <div class="px-4 text-sm  py-2 w-full">
                                    <a href="" class="block btn-start-card py-3 "> Mulai</a>
                                </div>
                        </div>
                        <div class="swiper-slide card-octaclass-flex  ">
                            <div  class="w-full rounded-xl p-2 relative">
                                <img src="https://images.unsplash.com/photo-1718042416613-43cc2d64f518?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=M3wzNzgzNzV8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MjExMTczNjB8&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=1080" alt="" class="rounded-xl">
                                <div class="dark:bg-gray-800 absolute top-4 right-4 text-[10px] p-2 shadow-lg bg-white rounded-md content-center"> <span class="icon-[carbon--time]"></span> 2024 Jun 08</div>
                                <div class="dark:bg-gray-800 absolute top-4 left-1 text-[10px] p-2   bg-sky-500 text-white rounded-md content-center text-sm">
                                    <div class="p-1 text-white dark:text-sky-600 italic"><small class="text-xs line-through  dark:text-sky-600 italic">Rp. 50000</small> <br> Rp 25000</div>
                                </div>
                            </div>
                            <div class="px-4 py-4 dark:text-slate-400">
                                <div class="font-bold text-2xl  mb-1">Title</div>
                                    <div class="flex mb-1  gap-1">
                                        <div class="pill-octaclass">Himpunan</div>
                                        <div class="pill-octaclass">Bilangan</div>
                                        <!-- <div class="w-7 h-w-7 rounded-full cursor-pointer border text-center flex justify-center"><span class="icon-[ic--twotone-plus] mt-1"></span></div> -->
                                    </div>
                                    <p class="text-sm  px-1">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda, iusto vero! Modi, nihil eveniet enim voluptatum provident iusto reprehenderit ipsam iure.
                                    </p>
                                </div>
                                <hr class="dark:border-gray-700">
                                <div class="px-4 text-sm  py-2 w-full">
                                    <a href="" class="block btn-start-card py-3"> Mulai</a>
                                </div>
                        </div>
                        <div class="swiper-slide card-octaclass-flex  ">
                            <div  class="w-full rounded-xl p-2 relative">
                                <img src="https://images.unsplash.com/photo-1718042416613-43cc2d64f518?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=M3wzNzgzNzV8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MjExMTczNjB8&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=1080" alt="" class="rounded-xl">
                                <div class="dark:bg-gray-800 absolute top-4 right-4 text-[10px] p-2 shadow-lg bg-white rounded-md content-center"> <span class="icon-[carbon--time]"></span> 2024 Jun 08</div>
                                <div class="dark:bg-gray-800 absolute top-4 left-1 text-[10px] p-2   bg-sky-500 text-white rounded-md content-center text-sm">
                                Rp 150000
                                </div>
                            </div>
                            <div class="px-4 py-4 dark:text-slate-400">
                                <div class="font-bold text-2xl  mb-1">Title</div>
                                    <div class="flex mb-1  gap-1">
                                        <div class="pill-octaclass">Himpunan</div>
                                        <div class="pill-octaclass">Bilangan</div>
                                        <!-- <div class="w-7 h-w-7 rounded-full cursor-pointer border text-center flex justify-center"><span class="icon-[ic--twotone-plus] mt-1"></span></div> -->
                                    </div>
                                    <p class="text-sm  px-1">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda, iusto vero! Modi, nihil eveniet enim voluptatum provident iusto reprehenderit ipsam iure.
                                    </p>
                                </div>
                                <hr class="dark:border-gray-700">
                                <div class="px-4 text-sm  py-2 w-full">
                                    <a href="" class="block btn-start-card py-3"> Mulai</a>
                                </div>
                        </div>
                        <div class="swiper-slide card-octaclass-flex  ">
                            <div  class="w-full rounded-xl p-2 relative">
                                <img src="https://images.unsplash.com/photo-1718042416613-43cc2d64f518?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=M3wzNzgzNzV8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MjExMTczNjB8&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=1080" alt="" class="rounded-xl">
                                <div class="dark:bg-gray-800 absolute top-4 right-4 text-[10px] p-2 shadow-lg bg-white rounded-md content-center"> <span class="icon-[carbon--time]"></span> 2024 Jun 08</div>
                            </div>
                            <div class="px-4 py-4 dark:text-slate-400">
                                <div class="font-bold text-2xl  mb-1">Title</div>
                                    <div class="flex mb-1  gap-1">
                                        <div class="pill-octaclass">Himpunan</div>
                                        <div class="pill-octaclass">Bilangan</div>
                                        <!-- <div class="w-7 h-w-7 rounded-full cursor-pointer border text-center flex justify-center"><span class="icon-[ic--twotone-plus] mt-1"></span></div> -->
                                    </div>
                                    <p class="text-sm  px-1">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda, iusto vero! Modi, nihil eveniet enim voluptatum provident iusto reprehenderit ipsam iure.
                                    </p>
                                </div>
                                <hr class="dark:border-gray-700">
                                <div class="px-4 text-sm  py-2 w-full">
                                    <a href="" class="block btn-start-card py-3"> Mulai</a>
                                </div>
                        </div>
                        <div class="swiper-slide card-octaclass-flex  ">
                            <div  class="w-full rounded-xl p-2 relative">
                                <img src="https://images.unsplash.com/photo-1718042416613-43cc2d64f518?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=M3wzNzgzNzV8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MjExMTczNjB8&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=1080" alt="" class="rounded-xl">
                                <div class="dark:bg-gray-800 absolute top-4 right-4 text-[10px] p-2 shadow-lg bg-white rounded-md content-center"> <span class="icon-[carbon--time]"></span> 2024 Jun 08</div>
                            </div>
                            <div class="px-4 py-4 dark:text-slate-400">
                                <div class="font-bold text-2xl  mb-1">Title</div>
                                    <div class="flex mb-1  gap-1">
                                        <div class="pill-octaclass">Himpunan</div>
                                        <div class="pill-octaclass">Bilangan</div>
                                        <!-- <div class="w-7 h-w-7 rounded-full cursor-pointer border text-center flex justify-center"><span class="icon-[ic--twotone-plus] mt-1"></span></div> -->
                                    </div>
                                    <p class="text-sm  px-1">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda, iusto vero! Modi, nihil eveniet enim voluptatum provident iusto reprehenderit ipsam iure.
                                    </p>
                                </div>
                                <hr class="dark:border-gray-700">
                                <div class="px-4 text-sm  py-2 w-full">
                                    <a href="" class="block btn-start-card py-3"> Mulai</a>
                                </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-8 lg:justify-start justify-center">
                        <button id="slider-button-left" class="swiper-button-prev group !p-2 flex justify-center items-center border border-solid border-[#FABE0E] !w-12 !h-12 transition-all duration-500 rounded-full !top-2/4 !-translate-y-8 !left-5 hover:bg-[#FABE0E] dark:border-gray-700 dark:hover:bg-gray-700" data-carousel-prev>
                        <svg class="h-5 w-5 text-[#FABE0E] dark:text-gray-400 dark:hover:text-gray-800 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M10.0002 11.9999L6 7.99971L10.0025 3.99719" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        </button>
                        <button id="slider-button-right" class="swiper-button-next group !p-2 flex justify-center items-center border border-solid border-[#FABE0E] !w-12 !h-12 transition-all duration-500 rounded-full !top-2/4 !-translate-y-8  !right-5 hover:bg-[#FABE0E] dark:border-gray-700 dark:hover:bg-gray-700" data-carousel-next>
                        <svg class="h-5 w-5 text-[#FABE0E] dark:text-gray-400 dark:hover:text-gray-800 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M5.99984 4.00012L10 8.00029L5.99748 12.0028" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        </button>
                    </div>
                    <div class="absolute bottom-0 w-full flex content-center   justify-end z-50 mt-12">
                        <a href="" class="mt-12 rounded-full p-2 px-4  text-[#FABE0E] border border-solid border-[#FABE0E] hover:bg-[#FABE0E] hover:text-white dark:border-gray-800 dark:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-slate-400"> Selanjutnya <span class="icon-[formkit--arrowright] self-center"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-12  title text-left mx-auto">
            <h1 class="text-3xl mt-1 font-bold"> Bank Soal Terbaru </h1>
        </div>
        <div class="container px-12 mt-5" id="bank-soal">
            <ul class="mt-2 w-full">
                <li class="btn-exam">
                    <a class="block text-sky-600 dark:text-slate-400 ">Download Soal OSN Matematika SMA Tahun 2023 Tingkat Kota Kabupaten </a>
                </li>
                <li class=" btn-exam">
                    <a class="block text-sky-600  dark:text-slate-400">Download Soal Olimpiade SMP KELAS 1</a>
                </li>
                <li class=" btn-exam">
                    <a class="block text-sky-600  dark:text-slate-400">Download Soal Olimpiade SMP KELAS 2</a>
                </li>
                <li class=" btn-exam">
                    <a class="block text-sky-600  dark:text-slate-400">Download Soal Olimpiade SMP KELAS 3</a>
                </li>
            </ul>
        </div>
    </section>
    <section class="container mb-12 " id="profile">
        <div class="w-full p-5">
            <div class=" w-full sm:w-9/12 mx-auto grid grid-cols-1 gap-0 lg:flex lg:gap-6 sm:shadow-lg sm:rounded-xl sm:p-9 sm:border-t-2">
                <div class=" mt-2 lg:w-2/3 sm:px-8 mx-auto flex content-center flex-wrap">
                    <h1 class="text-3xl font-bold text-center sm:text-left mb-2 w-full"> Tentang Penulis</h1>
                    <p class="text-justify">  Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit atque unde quidem laboriosam facilis repellendus debitis dolor harum quae impedit dolorum hic sed incidunt perferendis tenetur ipsum animi. Tenetur commodi perspiciatis provident aliquid tempore beatae, assumenda pariatur fugit accusantium impedit,.</p>
                    <form class="w-full mx-auto mt-5">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="email" name="floating_email" id="floating_email"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:text-slate-400 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="floating_email"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Alamat Email</label>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <textarea name="message" id="message" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:text-slate-400 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"  placeholder=" " required ></textarea>
                            <label for="message"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Pesan</label>
                        </div>
                        <button type="submit"
                            class="text-white   dark:bg-gray-800 bg-[#FABE0E] hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  dark:hover:bg-[#FABE0E] dark:focus:ring-[#FABE0E]">Kirim Pesan</button>
                    </form>

                </div>
                <div class="col-start-1 row-start-1 lg:p-4 relative items-center  text-center mx-auto mt-5 h-56 w-56 rounded-full bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('asset/img/home/rani1.jpg') }}')">
                </div>
            </div>
        </div>
    </section>
@endsection
