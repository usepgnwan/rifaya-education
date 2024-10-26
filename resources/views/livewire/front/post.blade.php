<div>
    <section class="w-full h-[20vh] relative sm:h-[69vh] bg-gray-900 mb-12 sm:bg-fixed bg-no-repeat bg-cover bg-center" id="banner"  style="background-image: url('{{ asset('asset/img/home/post-blok.jpeg') }}')">
    <div class="absolute inset-0 bg-yellow-500 dark:bg-gray-900 opacity-50 pointer-events-none"></div>
        <div class="w-full flex justify-center h-full">
            <nav class="flex content-center  text-sm sm:text-2xl z-10 " aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="#" class="inline-flex items-center font-medium text-gray-700 hover:text-[#FABE0E] dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"></path>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <span class="icon-[ep--arrow-right] text-slate-700 mt-2"></span> &nbsp;
                            <a href="#" class="ms-1 font-medium text-gray-700 hover:text-[#FABE0E] md:ms-2 dark:text-gray-400 dark:hover:text-white">Projects</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <span class="icon-[ep--arrow-right] text-slate-700 mt-2"></span> &nbsp;
                            <span class="ms-1 font-medium text-gray-500 md:ms-2 dark:text-gray-400">Flowbite</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="container w-full mt-5 mb-12 px-6 relative mx-auto">
        <div class="m-6 mx-auto w-full p-4   border rounded-xl bg-white z-30 dark:bg-slate-700  dark:border-slate-800   max-lg:relative sticky  lg:top-24">
            <form wire:submit.prevent="postFilter" class="w-full flex gap-4 flex-wrap">
                <div class="w-full sm:w-full lg:w-1/4 lg:relative">
                    <input type="search" id="search" wire:model="search" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  >
                </div>
                <div class="w-full sm:w-full lg:w-1/4 lg:relative" wire:ignore>


                        <x-input.select  wire:model.live.debounce.300ms="kelas" :placeholder="__('- Pilih Kelas -')" :multiple="__(true)">
                            @foreach ($_kelas as $v )
                                <option value="{{ $v->id }}" @if($v->id == $kelas) selected @endif> {{ $v->title  }} - {{$v->jenjang->title}}</option>
                            @endforeach
                        </x-input.select>
                </div>
                <div class="w-full sm:w-full lg:w-1/4 lg:relative"  wire:ignore>

                    <!-- <select class="select2-init  absolute block w-full" name="kategori" data-target="kategori"  wire.model.live="kategori" > -->
                    <x-input.select  wire:model.live.debounce.300ms="kategori" :placeholder="__('- Pilih Kategori -')">
                        <option value="">- Semua Kategori -</option>
                        @foreach ($_kategori as $v )
                            <option value="{{ $v->id }}" @if($v->id == $kategori) selected @endif > {{ $v->title  }}  </option>
                        @endforeach
                    </x-input.select>

                    <!-- </select> -->
                </div>
                <div class="max-lg:w-full lg:w-1/5">
                    <button name="submit-filter" type="submit" class="btn-red-octaclass block h-[2.65rem] w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300  dark:border-gray-800 dark:text-gray-700 dark:bg-gray-900 dark:hover:bg-gray-800 dark:hover:text-slate-400"> Cari </button>
                </div>
            </form>
        </div>
        <div class="w-full flex flex- max-lg:flex-wrap gap-2">

            <div class="w-full hidden" wire:loading  wire:target="postFilter,gotoPage, previousPage, nextPage">
                <x-partials.front.post/>
            </div>
            <div class="w-full lg:w-3/4"   wire:loading.attr="hidden"  wire:target="postFilter,gotoPage, previousPage, nextPage" >
                <livewire:front.partials.post :lazy="true" :kategori="$kategori" :kelas="$kelas" :search="$search" />
            </div>
            <div class="pl-2 w-full lg:w-1/4   right-0 "  >
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
                                <button class="btn-red-octaclass"  @click.prevent="Livewire.navigate('{{ route('register') }}')"> Bergabung </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-bordered-yellow-octaclass">
                    <h3 class="font-bold text-xl">Bank Soal</h3>
                    <div class="w-full h-48 bg-cover bg-center mt-2 mb-2 bg-[url('https://images.unsplash.com/photo-1718042416613-43cc2d64f518?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wzNzgzNzV8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MjpExMTczNjB8&ixlib=rb-4.0.3&q=80&w=1080')] rounded-xl"></div>
                    <!-- <ul class="mt-2 w-full">
                        <li class="btn-exam">
                            <a class="block text-sky-600 dark:text-slate-400 ">Download Soal OSN Matematika SMA Tahun 2023 Tingkat Kota Kabupaten </a>
                        </li>
                        <li class=" btn-exam">
                            <a class="block text-sky-600  dark:text-slate-400">Download Soal Olimpiade</a>
                        </li>
                    </ul> -->
                    <livewire:front.partials.top-articels :lazy="true" :title="false" :type="[ 'bank'=>'Bank Soal Terbaru']"></livewire:front.partials.top-articels>
                    <!-- <hr class="mt-3 mb-3 dark:border-slate-800"> -->
                    <!-- <a href="" class="btn-next-yellow"> Selanjutnya <span class="icon-[formkit--arrowright] self-center"></span></a> -->
                </div>
                <div class="card-bordered-yellow-octaclass">
                    <h3 class="font-bold text-lg">Try Out</h3>
                    <div class="relative w-full card-try-out border-b dark:border-b-slate-800 mb-3 mt-3 py-3 hidden">
                        <div class="flex mt-2">
                            <img src="https://images.unsplash.com/photo-1718042416613-43cc2d64f518?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wzNzgzNzV8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MjpExMTczNjB8&ixlib=rb-4.0.3&q=80&w=1080" class="w-20 sm:w-16 h-20 sm:h-16 bg-cover bg-center" alt="">
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
                            <img src="https://images.unsplash.com/photo-1718042416613-43cc2d64f518?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wzNzgzNzV8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MjpExMTczNjB8&ixlib=rb-4.0.3&q=80&w=1080" class="w-20 sm:w-16 h-20 sm:h-16 bg-cover bg-center" alt="">
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
                            <img src="https://images.unsplash.com/photo-1718042416613-43cc2d64f518?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wzNzgzNzV8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MjpExMTczNjB8&ixlib=rb-4.0.3&q=80&w=1080" class="w-20 sm:w-16 h-20 sm:h-16 bg-cover bg-center" alt="">
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
                    <!-- <a href="" class="btn-next-yellow"> Selanjutnya <span class="icon-[formkit--arrowright] self-center"></span></a> -->
                </div>

            </div>
        </div>
    </section>
</div>


<!-- <script>
   document.addEventListener('livewire:initialized', function(){

            // Trigger the Livewire update on change
            $('.select2-init').on('change',function(e){
            var data = $(this).val();
            console.log(data);
            let target = $(this).data('target');

                @this.set(target, data);
            })


    });
</script> -->

