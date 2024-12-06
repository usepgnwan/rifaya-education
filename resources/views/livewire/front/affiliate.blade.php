<section class="container w-full mt-5 mb-12 px-6 relative mx-auto" x-init="console.log('Im initing')">
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
                        <a href="#" class="ms-1 font-medium text-gray-800 hover:text-[#FABE0E] md:ms-2 dark:text-gray-400 dark:hover:text-white">Affiliate</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <span class="icon-[ep--arrow-right] text-slate-800 mt-2"></span> &nbsp;
                        <a href="#" class="ms-1 font-medium text-gray-800 hover:text-[#FABE0E] md:ms-2 dark:text-gray-400 dark:hover:text-white"> Program</a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
    <div class="w-full flex flex- max-lg:flex-wrap gap-2">
        <div class="w-full lg:w-3/4">
            <div class=" shadow-sm   dark:shadow-slate-800 p-6 rounded-xl lg:mr-6">
                <h5 class="font-bold text-xl">Affiliate Program Rifaya Education</h5>
                <div class="w-full h-80 mt-1 mb-2 overflow-hidden rounded-xl group">
                    <div class="w-full h-full bg-cover bg-center bg-no-repeat rounded-xl transition-transform duration-300 ease-in-out transform scale-125 group-hover:scale-100" style="background-image: url('https://rifayaeducation.com/storage/images/DADM4m6LYOEuO5VHSz8daZAldkj09vyoKdfWirbn.png')">
                    </div>
                </div>
                <div class="w-full text-justify">
                    <h3 class="text-3xl font-extrabold">Program Affiliator di Rifaya Education</h3>
                    <p>Bergabunglah dengan kami sebagai affiliator les privat di Rifaya Education dan raih penghasilan tambahan dengan membantu siswa belajar!</p>
                    <div class="mt-2">
                        <a class=" mt-2 text-2xl px-6 rounded-full p-2 bg-purple-700 text-white border border-solid border-purple-700 hover:bg-purple-600 hover:text-white max-lg:text-lg w-full"  href="{{ route('affiliate.registrasi') }}" @click.prevent="Livewire.navigate('{{ route('affiliate.registrasi') }}')"> Daftar Sekarang, disini  </a>
                   </div>
                    <p>&nbsp;</p>
                    <h4 class="text-2xl font-extrabold">Spesifikasi</h4>
                    <p>1. Semua orang dapat mendaftar sebagai affiliator baik Tutor/Guru yang sudah terdaftar maupun pengguna umum</p>
                    <p>2. Orang Tua/Siswa dapat mengajak sodara atau teman dan akan tetap mendapatkan komisi affiliate</p>
                    <p>2. Siswa yang akan mendaftar di link affiliate merupakan siswa hasil dari rekrutan pribadi dan bukan siswa yang sedang aktif di lembaga lain</p>
                    <p>3. Terbuka untuk semua jenjang pendidikan</p>
                    <h4 class="text-2xl font-extrabold">&nbsp;</h4>
                    <h4 class="text-2xl font-extrabold">Tata Cara Mendaftar Affiliator</h4>
                    <p>1. Calon affiliator registrasi pada menu affiliate</p>
                    <p>2. Affiliator mendapatkan link affiliator untuk kemudian di share</p>
                    <p>3. Siswa mendaftar melalui link affiliator</p>
                    <p>4. Siswa mengambil les seminimal 2x sesi</p>
                    <p>5. Affiliator mendapat komisi sebesar 25rb/siswa dalam 1x pembayaran</p>

                    <div class="flex flex-col gallery  "><img class="gallery-image " src="https://rifayaeducation.com/tiny_filemanager/rifaya_education/Red%20and%20Yellow%20Illustration%20Affiliate%20Marketing%20Infographic%20Instagram%20Post(1).png" width="427" height="427"></div>
                    <h4 class="text-2xl font-extrabold">Q &amp; A</h4>
                    <p><strong>Bagaimana Proses mendapatkan komisi? dan simulasi pendapatan?</strong></p>
                    <p>- Siswa yang mendaftar minimal mengikuti les 2x pertemuan @90 menit akan mendapatkan 25rb/orang sekali bayar</p>
                    <p>- Contoh Simulasi, kamu mengajak 10 orang untuk les dan mengikuti les minimal 2 kali pertemuan<br>Maka 10 x 25000 = 250rb</p>
                    <p><strong>Bagaimana jika hanya ikut 1x les?</strong></p>
                    <p>- Uang affiliator tdk dibayarkan</p>
                    <p><strong>Kapan uang komisi di bayarkan?&nbsp;</strong></p>
                    <p>- Uang komisi akan di bayarkan tiap tanggal 1 sd 4 di awal bulannya</p>
                    <p><strong>Bagaimana Affiliator mengetahui siswa mendaftar di link yang di bagikan?</strong></p>
                    <p>- Affiliator akan memiliki dashboard, dan memiliki akun yang terdaftar sebelumnya di menu affiliate</p>
                    <p>&nbsp;</p>
                    <h4 class="text-2xl font-extrabold"><br><br>Mari Bergabung sebagai affiliator di rifaya education. ^^</h4>
                   <div class="mt-2">
                   <a class=" mt-2 text-2xl px-6 rounded-full p-2 bg-purple-700 text-white border border-solid border-purple-700 hover:bg-purple-600 hover:text-white max-lg:text-lg w-full"  href="{{ route('account.absensi.rekap') }}" @click.prevent="Livewire.navigate('{{ route('account.absensi.rekap') }}')"> Daftar Sekarang, disini  </a>
                   </div>
                </div>
                <hr class=" mt-10  dark:border-slate-800 mb-5 ">
                <div class="flex justify-between">
                    <div class="px-4 text-sm flex">
                        <img id="avatarButton" class="w-7 h-w-7 rounded-full cursor-pointer " src=" https://rifayaeducation.com/asset/img/home/logo-rifaya.png" alt="User">
                        <div class="p-1 lg:px-4 text-xs  lg:text-sm ">Rifaya Education</div>
                    </div>

                    <div class="  lg:px-4 text-xs lg:text-sm   py-1  flex justify-center items-center ">
                        <span class="icon-[carbon--time]"></span> &nbsp;

                        <!-- <span data-tooltip-target="tooltipContent"  id="tooltip-default">  </span> -->





                    </div>
                </div>
            </div>

            <div class="  lg:mx-4 lg:mr-6 mt-5">
                <div class="   title text-left   mx-auto">
                    <h1 class="text-xl mt-1 font-bold"> Artikel Terkait </h1>
                </div>
                @php
                $_type = ['artikel' => 'Artikel Terbaru'];
                @endphp

                <livewire:front.partials.top-articels :lazy="true" :title="false" :type="$_type"></livewire:front.partials.top-articels>
            </div>
        </div>
        <div class="w-full lg:w-1/4   right-0 ">
            <div class="card-bordered-yellow-octaclass ">
                <h3 class="font-bold text-xl">Siswa Terdaftar</h3>
                <div class="flex flex-wrap  dark:text-slate-400 px-2 text-justify">
                    <div class="w-full flex justify-center  mt-5 mb-4 max-lg:text-sm">
                        Bebarapa orang telah mendapatkan manfaat dari les private kami, sekarang giliran kamu untuk dapat belajar bersama kami.
                    </div>
                    <div class="w-full flex justify-center flex-wrap">
                        <div class=" flex  -space-x-4 rtl:space-x-reverse justify-center mt-1">
                            <img class="w-10 h-10 border-2 border-[#FABE0E] rounded-full dark:border-gray-400" src="/docs/images/people/profile-picture-5.jpg" alt="">
                            <img class="w-10 h-10 border-2 border-[#FABE0E] rounded-full dark:border-gray-400" src="/docs/images/people/profile-picture-2.jpg" alt="">
                            <img class="w-10 h-10 border-2 border-[#FABE0E] rounded-full dark:border-gray-400" src="/docs/images/people/profile-picture-3.jpg" alt="">
                            <a class="flex items-center justify-center w-10 h-10 text-xs font-medium text-white dark:text-slate-400 bg-gray-700 border-2 border-[#FABE0E] rounded-full hover:bg-gray-600 dark:border-gray-800" href="#">+99</a>
                        </div>
                        <div class="w-full mt-2  sm:mt-0 lg:mt-3">
                            <button class="btn-red-octaclass" @click.prevent="Livewire.navigate('{{ route('register') }}')"> Bergabung </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-bordered-yellow-octaclass">
                <h3 class="font-bold text-xl">Bank Soal</h3>
                <div class="w-full h-48 bg-cover bg-center mt-2 mb-2 bg-[url('https://rifayaeducation.com/asset/img/home/post-blok.jpeg')] rounded-xl"></div>
                <!-- <ul class="mt-2 w-full">
                        <li class="btn-exam">
                            <a class="block text-sky-600 dark:text-slate-400 ">Download Soal OSN Matematika SMA Tahun 2023 Tingkat Kota Kabupaten </a>
                        </li>
                        <li class=" btn-exam">
                            <a class="block text-sky-600  dark:text-slate-400">Download Soal Olimpiade</a>
                        </li>
                    </ul> -->
                <livewire:front.partials.top-articels :lazy="true" :title="false" :type="[ 'bank'=>'Bank Soal Terbaru']"></livewire:front.partials.top-articels>
                <hr class="mt-3 mb-3 dark:border-slate-800">
                <a class="btn-next-yellow" href="{{ route('post.index', ['kategori'=>'Bank Soal']) }}" @click.prevent="Livewire.navigate('{{ route('post.index', ['kategori'=>'Bank Soal']) }}')"> Selanjutnya <span class="icon-[formkit--arrowright] self-center"></span></a>
            </div>
            <div class="card-bordered-yellow-octaclass">
                <h3 class="font-bold text-lg">Try Out</h3>
                <div class="relative w-full card-try-out border-b dark:border-b-slate-800 mb-3 mt-3 py-3 hidden">
                    <div class="flex mt-2">
                        <img src="" class="w-20 sm:w-16 h-20 sm:h-16 bg-cover bg-center" alt="">
                        <div class="px-3">
                            <h5 class="w-full font-bold">To Olimpiade</h5>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="flex w-full justify-between mt-2">
                        <div class="p-1 text-red-900 dark:text-sky-600 italic">Rp. 15000</div>
                        <div><a href="" class="btn-start py-1"> Mulai</a></div>

                    </div>
                </div>
                <div class="relative w-full card-try-out border-b dark:border-b-slate-800 mb-3 mt-3 py-3 hidden">
                    <div class="flex mt-2">
                        <img src="" class="w-20 sm:w-16 h-20 sm:h-16 bg-cover bg-center" alt="">
                        <div class="px-3">
                            <h5 class="w-full font-bold">To Olimpiade</h5>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="flex w-full justify-between mt-2">
                        <div class="p-1 text-red-900 dark:text-sky-600 italic"><small class="text-xs line-through">Rp. 50000</small> <br> Rp 25000</div>
                        <div><a href="" class="btn-start py-1"> Mulai</a></div>
                    </div>
                </div>
                <div class="relative w-full card-try-out border-b dark:border-b-slate-800 mb-3 mt-3 py-3 hidden">
                    <div class="flex mt-2">
                        <img src="" class="w-20 sm:w-16 h-20 sm:h-16 bg-cover bg-center" alt="">
                        <div class="px-3">
                            <h5 class="w-full font-bold">To Olimpiade</h5>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="flex w-full justify-between mt-2">
                        <div class="p-1 text-red-900 dark:text-sky-600 italic">Free</div>
                        <div><a href="" class="btn-start py-1"> Mulai</a></div>

                    </div>
                </div>
                <a href="" class="btn-next-yellow hidden"> Selanjutnya <span class="icon-[formkit--arrowright] self-center"></span></a>
                belum tersedia
            </div>
            <div class="hidden card-bordered-yellow-octaclass">
                <h3 class="font-bold text-lg">Bank Soal</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt dolores architecto veniam? Mollitia atque nemo fuga inventore cumque dignissimos laudantium assumenda delectus fugit officiis, vel nulla tenetur, est eaque sint.</p>
                <hr class="mt-3 mb-3">
            </div>
        </div>
    </div>



    <div class="lightbox" id="lightbox">
        <span class="close" id="close">×</span>
        <img src="" alt="" class="lightbox-image" id="lightbox-image">
    </div>
</section>
