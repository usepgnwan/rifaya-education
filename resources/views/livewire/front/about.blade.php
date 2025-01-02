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
                            <a href="#" class="ms-1 font-medium text-gray-800 hover:text-[#FABE0E] md:ms-2 dark:text-gray-400 dark:hover:text-white">Blog</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <span class="icon-[ep--arrow-right] text-slate-800 mt-2"></span> &nbsp;
                            <a href="#" class="ms-1 font-medium text-gray-800 hover:text-[#FABE0E] md:ms-2 dark:text-gray-400 dark:hover:text-white"> Tentang</a>
                        </div>
                    </li>

                </ol>
            </nav>
        </div>
    </section>
    <section class="px-6 mb-12">
        <div class="mx-auto">
            <div class="grid gap-2.5 lg:pb-8 pb-8">
                <h2 class="w-full text-center text-4xl font-bold font-manrope leading-normal">Tentang Rivaya Education</h2>
                <div class="w-full text-center text-gray-600 text-lg font-normal leading-8">Page ini menjelaskan lebih mendalam tentang <i>Rivaya Education (Les Private di Bandung)</i></div>
            </div>
            <div class="flex flex-col galery ">
                <div class="w-full mx-auto grid grid-cols-1 gap-0 lg:flex lg:gap-6 gallery">
                    <!-- <div class="md:col-span-4 md:h-[404px] h-[277px]   rounded-3xl">
                        <img src="https://via.placeholder.com/640x480.png/0066ee?text=nature+Faker+ut" alt="Gallery image" class="gallery-image object-contain rounded-3xl hover:grayscale transition-all duration-700 ease-in-out mx-auto lg:col-span-4 md:col-span-6 w-full h-full">
                    </div> -->
                    <div class="max-lg:w-full w-full text-justify">
                    <p class="indent-6 text-justify ">
                    Rifaya Education adalah lembaga les private di bandung yang berkomitmen untuk memberikan pengalaman belajar yang interaktif, inovatif, dan menyenangkan bagi setiap siswa. Kami meyakini bahwa setiap anak memiliki potensi yang istimewa dan unik, serta membutuhkan pendekatan belajar yang sesuai untuk mengembangkan kemampuan terbaiknya. Dengan metode pengajaran yang berfokus pada partisipasi aktif, Rifaya Education menghadirkan lingkungan belajar yang inspiratif dan mendorong siswa untuk menggali pengetahuan dengan cara yang menyenangkan dan bermakna.
                    </p>
                    <p class="indent-6 text-justify ">
                    Selain itu, Rifaya Education juga menyediakan berbagai artikel pembelajaran yang dirancang untuk mendukung proses belajar yang lebih menarik dan efektif. Melalui menu blog pada situs kami, siswa dan orang tua dapat mengakses artikel edukatif yang memperkaya pengalaman belajar.
                    </p>

                    <p class="text-center text-3xl font-bold mt-3"> Visi dan Misi   </p>
                        <div class="text-justify mt-4">
                            <span class="text-2xl font-bold"><span class="icon-[tdesign--user-list]"></span> Visi</span> kami adalah menciptakan generasi pelajar yang percaya diri, kritis dan kreatif.
                            <hr class="dark:border-gray-700 my-4">
                            <span class="text-2xl font-bold"><span class="icon-[fa6-solid--user-tie]"></span> Misi</span>  kami adalah menyediakan pengalaman belajar yang interaktif, mendukung setiap siswa dengan pendekatan personal, dan menginspirasi mereka untuk mencapai tujuan akademis.

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section id="faq">
    <x-partials.front.faq :faq='$faq'></x-partials.front.faq>
    </section>

    </section>
</div>
