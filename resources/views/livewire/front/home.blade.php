<div>
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
                        name="email_address" placeholder="cari"   x-on:keydown.enter="window.location.href = '/blog?search=' + encodeURIComponent($event.target.value)">
                </div>
            </div>
            <div class="flex col-start-1 row-start-1 h-72 m-auto sm:h-1/2 sm:mt-[-20px]  lg:mt-24 my-auto sm:pl-10 ">
                <img src="{{ asset('asset/img/home/teacher-hai.png')}}" alt="" class="mx-auto lg:w-96">
            </div>
        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="mt-[-1px] dark:fill-gray-800 fill-[#FABE0E]">
        <path fill-opacity="1" d="M0,160L60,144C120,128,240,96,360,80C480,64,600,64,720,80C840,96,960,128,1080,122.7C1200,117,1320,75,1380,53.3L1440,32L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path>
    </svg>
    <section class="container  px-6 mx-auto" id="body-section">
        <livewire:front.partials.home-resume :lazy="true" :content="1"></livewire:front.partials.top-articels>
    </section>
    <section class="container mt-12 mx-auto ">
        <div class="w-10/12 sm:w-2/3 mx-auto p-5 flex gap-3">
            <select id="countries" class=" border sm:text-xl text-center text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block   p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500  w-80 bg-sky-500 text-white">
                <option value="CA">SD</option>
                <option value="CA" selected>SMP</option>
                <option value="CA">SMA</option>
            </select>
            <div class="text-center cursor- dark:bg-gray-800 dark:hover:bg-gray-800 bg-[#FABE0E]  text-white hover:bg-[#FABE0E] p-1 w-80 rounded-full hover:text-white sm:text-3xl font-bold"> VI</div>
            <div class="text-center cursor-pointer dark:hover:bg-gray-800 hover:bg-[#FABE0E] p-1 w-80 rounded-full hover:text-white sm:text-3xl font-bold"> VII</div>
            <div class="text-center cursor-pointer dark:hover:bg-gray-800 hover:bg-[#FABE0E] p-1 w-80 rounded-full hover:text-white sm:text-3xl font-bold"> VIII</div>
        </div>
        <div class="p-2 grid grid-cols-2 gap-2 md:grid-cols-3 md:p-4 lg:w-4/5 mx-auto" id="content-nya">
            <div class="card-grid group group/detail mt-2 saturate-150">
                <div
                    class="w-full h-full bg-[url('https://images.unsplash.com/photo-1718042416613-43cc2d64f518?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wzNzgzNzV8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MjpExMTczNjB8&ixlib=rb-4.0.3&q=80&w=1080')] bg-center bg-cover absolute group-hover:scale-125 transition-all duration-500  ">
                </div>
                <div class="absolute  bottom-[-200px]   group-hover/detail:bottom-0 lg:group-hover/detail:bottom-0  group-hover/detail:transition-all  group-hover/detail:duration-500 z-20 text-white  h-48 lg:h-28 dark:bg-gray-800 dark:text-slate-400  bg-[#FABE0E]  pt-2   w-full p-3   rounded-tl-3xl  rounded-tr-3xl ">
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
                <div class="absolute  bottom-[-200px]   group-hover/detail:bottom-0 lg:group-hover/detail:bottom-0  group-hover/detail:transition-all  group-hover/detail:duration-500 z-20 text-white  h-48 lg:h-28 dark:bg-gray-800 dark:text-slate-400  bg-[#FABE0E]  pt-2   w-full p-3   rounded-tl-3xl  rounded-tr-3xl ">
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
                <div class="absolute  bottom-[-200px]   group-hover/detail:bottom-0 lg:group-hover/detail:bottom-0  group-hover/detail:transition-all  group-hover/detail:duration-500 z-20 text-white  h-48 lg:h-28 dark:bg-gray-800 dark:text-slate-400  bg-[#FABE0E]  pt-2   w-full p-3   rounded-tl-3xl  rounded-tr-3xl ">
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
                <div class="absolute  bottom-[-200px]   group-hover/detail:bottom-0 lg:group-hover/detail:bottom-0  group-hover/detail:transition-all  group-hover/detail:duration-500 z-20 text-white  h-48 lg:h-28 dark:bg-gray-800 dark:text-slate-400  bg-[#FABE0E]  pt-2   w-full p-3   rounded-tl-3xl  rounded-tr-3xl ">
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
                <div class="absolute  bottom-[-200px]   group-hover/detail:bottom-0 lg:group-hover/detail:bottom-0  group-hover/detail:transition-all  group-hover/detail:duration-500 z-20 text-white  h-48 lg:h-28 dark:bg-gray-800 dark:text-slate-400  bg-[#FABE0E]  pt-2   w-full p-3   rounded-tl-3xl  rounded-tr-3xl ">
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
                <div class="absolute  bottom-[-200px]   group-hover/detail:bottom-0 lg:group-hover/detail:bottom-0  group-hover/detail:transition-all  group-hover/detail:duration-500 z-20 text-white  h-48 lg:h-28 dark:bg-gray-800 dark:text-slate-400  bg-[#FABE0E]  pt-2   w-full p-3   rounded-tl-3xl  rounded-tr-3xl ">
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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="mb-[-1px] fill-[#FABE0E] dark:fill-gray-800">
        <path fill-opacity="1" d="M0,224L1440,320L1440,320L0,320Z"></path>
    </svg>
    <section class=" p-7 px-6 mx-auto sm:w-full  lg:flex lg:p-6  bg-[#FABE0E] dark:bg-gray-800" id="body-section">
        <div class="container lg:p-12 lg:flex-1 lg:content-center mx-auto lg:max-w-7xl">
            <h1 class=" text-2xl sm:text-3xl font-semibold text-center mb-3">Apa itu <span class="text-white dark:text-white">Rifaya Education</span> </h1>
            <p class="text-justify lg:text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, amet? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium voluptatibus ut veniam deleniti quae maxime eaque aliquid reprehenderit magni nobis natus eos, hic tempore, quod neque nisi esse minus dolore reiciendis similique totam nesciunt asperiores. Aliquam obcaecati minima molestias sit error! Quibusdam architecto soluta quae nisi neque voluptatum numquam laudantium sunt rem expedita perspiciatis, similique, necessitatibus ullam repellat quam minus doloremque dignissimos earum, tenetur quas! Beatae commodi odit recusandae provident ad soluta, aliquam doloribus consequatur quibusdam quasi totam non accusamus?
            </p>
        </div>
        <div class="hidden lg:flex lg:w-80 lg:h-96 lg:p-4 relative   items-center rounded-xl bg-center bg-contain bg-no-repeat bg-[url('../ ')]">
            <img src="{{ asset('asset/img/home/teacher2.png')}}" class="drop-shadow-2xl ">
        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 " style="height: 180px;width: 100%;" class="mt-[-1px] fill-[#FABE0E] dark:fill-gray-800">
        <path fill-opacity="1" d="M0,32L1440,160L1440,0L0,0Z"></path>
    </svg>
    <section class="w-full mb-56 ">
        <div class="sm:w-9/12 mx-auto shadow-lg p-6 relative">
            <div class="max-lg:w-full max-lg:p-5 max-w-7xl mt-2 w-full sm:pl-1 pr-[16rem] mx-auto flex content-center flex-wrap ">
                <h1 class="font-bold text-2xl"><span class="text-[#fabe0e]"> Rifaya Education </span> Juga memiliki Les Private dengan System:</h1>
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
                            <div>Termasuk biaya transportasi Pengajar bagi les private Offline </div>
                        </div>
                    </li>
                    <li class="mb-1">
                        <div class="flex">
                            <div class="mr-2"><span class="icon-[material-symbols--checklist-rounded]"></span> </div>
                            <div>Termasuk biaya daring untuk Pengajar bagi les private Online </div>
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
                            <div>Tersedia untuk berbagai jenjang pendidikan dengan pengajar yang berkualitas </div>
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
        <livewire:front.partials.home-resume :lazy="true" :content="0"></livewire:front.partials.top-articels>
    </section>

    <section id="faq">
    <x-partials.front.faq :faq='$faq'></x-partials.front.faq>
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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0" class="w-full h-[80px] mb-[-1px] fill-[#FABE0E] dark:fill-gray-800">
        <path fill-opacity="1" d="M0,32L80,32C160,32,320,32,480,42.7C640,53,800,75,960,74.7C1120,75,1280,53,1360,42.7L1440,32L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
    </svg>
    <section class=" dark:bg-gray-800  bg-[#FABE0E]" id="testimoni">
        <div class="w-full sm:w-3/4 mx-auto  p-12 relative">
            <h4 class="text-center mb-5 text-2xl">Testimoni Rifaya Education </h4>
            <div class="swiper testimoni-carousel swiper-container">
                <div class="swiper-wrapper  ">
                    @foreach ($testimoni as $item)

                        <figure class="swiper-slide w-full mx-auto text-center">
                            <svg class="w-10 h-10 mx-auto mb-3 text-gray-400 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                                <path d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z" />
                            </svg>
                            <blockquote>
                                <p class="text-2xl italic font-medium text-gray-900  dark:text-slate-400">"{{ $item->description  }}"</p>
                            </blockquote>
                            <figcaption class="flex flex-wrap items-center justify-center mt-6 space-x-3 rtl:space-x-reverse">
                                <img class="w-14 h-14 rounded-full" src="{{ $item->image  }}" alt="profile picture">

                                <cite class="pe-3 w-full font-medium text-gray-900  dark:text-slate-400">{{ $item->name  }}</cite>
                                <small class="pe-3 w-full font-medium text-gray-900  dark:text-slate-400">{{ $item->from  }}</small>

                            </figcaption>
                        </figure>
                    @endforeach

                </div>
            </div>



        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 " class="w-full h-28 fill-[#FABE0E] dark:fill-gray-800">
        <path fill-opacity="1" d="M0,32L80,32C160,32,320,32,480,42.7C640,53,800,75,960,74.7C1120,75,1280,53,1360,42.7L1440,32L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
    </svg>
    <section class="container mb-12 mx-auto ">
        <div class="px-12  title text-leftpx-12  mx-auto">
            <p class="text-xl text-sky-400">Explore</p>
        </div>
        <livewire:front.partials.top-articels :lazy="true" :title="true" :type="['artikel' => 'Artikel Terbaru','to' => 'Try Out', 'bank'=>'Bank Soal Terbaru']"></livewire:front.partials.top-articels>
    </section>
    <section class="container mb-12 " id="profile">
        <livewire:front.partials.contact :lazy="true" ></livewire:front.partials.top-articels>
    </section>

</div>
