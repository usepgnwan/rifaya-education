<div wire:load="initSwiper">

        @foreach($_type as $k => $data )
            @if (isset($data['status']) && $data['status'])
            <div class="px-12  title text-leftpx-12  mx-auto">
                <h1 class="text-3xl mt-1 font-bold"> {{ $data['title'] }} </h1>
            </div>
            @endif
            @if(in_array($k, ['artikel','to']))

                <div class="@if (isset($data['status']) && $data['status']) container px-12 mt-5 @endif" id="card-artikel">
                    <div class="w-full relative">
                        <div class="swiper @if (isset($data['status']) && $data['status']) slide-carousel @else slide-carousel-minimal @endif swiper-container relative ">
                            <div class="swiper-wrapper mb-16 flex">
                                @forelse ($data['data'] as $item )
                                <div class="swiper-slide card-octaclass-flex  ">
                                    <div class="w-full rounded-xl p-2 relative">

                                        <div class="w-full h-52 mt-1 mb-2 overflow-hidden rounded-xl group">
                                            <div class="w-full h-full bg-cover bg-center bg-no-repeat rounded-xl transition-transform duration-300 ease-in-out transform scale-125 group-hover:scale-100" style="background-image: url('{{ asset($item->image) }}')">
                                            </div>
                                        </div>

                                        <div class="dark:bg-gray-800 absolute top-4 right-4 text-[10px] p-2 shadow-lg bg-white rounded-md content-center"> <span class="icon-[carbon--time]"></span>

                                        <span data-tooltip-target="tooltipContent-{{ $item->id }}" data-position="left" id="tooltip-default" > {{ $item->created_at->diffForHumans()  }} </span>


                                        </div>
                                        <div id="tooltipContent-{{ $item->id   }}" role="tooltip" class="relative w-3/5 z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                {{ $item->created_at->format('d M Y h:i:s')   }}
                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div>
                                    </div>
                                    <div class="px-1 py-4 dark:text-slate-400 min-h-[150px]">
                                        <div class="font-bold text-xl mb-1 text-gray-600 dark:text-slate-400 min-h-20">
                                         <p class="px-4 line-clamp-3 hover:line-clamp-none cursor-pointer hover:text-blue-500">
                                                <a href="{{ route('post.detail', ['slug'=>$item->slug]) }}" @click.prevent="Livewire.navigate('{{ route('post.detail', ['slug'=>$item->slug]) }}')">  {{ $item->title }}</a>
                                            </p>
                                        </div>
                                        <div class="flex mb-1  gap-1 px-4 overflow-auto">
                                            @if (isset($item->kelas))
                                                <div class="pill-yellow-octaclass text-xs px-3 rounded-2xl mb-2">
                                                    <div class="flex">
                                                        <div><span class="icon-[la--chalkboard-teacher]  text-lg"></span></div>
                                                        <div class="px-1 font-sm">{{$item->kelas->jenjang->title}} - {{$item->kelas->title}}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            @foreach ($item->materi as $k => $v)

                                                <div class="pill-octaclass text-xs  px-3 rounded-2xl mb-2">{{ $v->title }}</div>
                                            @endforeach
                                            <!-- <div class="w-7 h-w-7 rounded-full cursor-pointer border text-center flex justify-center"><span class="icon-[ic--twotone-plus] mt-1"></span></div> -->
                                        </div>
                                    </div>
                                    <hr class="dark:border-gray-700">
                                    @if($k == 'to')
                                        <div class="px-4 text-sm  py-2 w-full">
                                            <a href="" class="block btn-start-card py-3 "> Mulai</a>
                                        </div>
                                    @else
                                        <div class="px-4 text-sm  py-2 flex">
                                            @if( $item->user->profile  !== null)
                                            <img id="avatarButton" class="w-7 h-w-7 rounded-full cursor-pointer " src="{{ $item->user->profile }}" alt="User">
                                            @else
                                            <span class="size-6 icon-[solar--user-circle-bold]"></span>
                                            @endif
                                            <div class="px-4 pt-1">{{ $item->user->name }}</div>
                                        </div>
                                    @endif
                                </div>
                                @empty
                                    tidak ada data
                                @endforelse
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
                        @if ( count($data['data']) >0 )

                        <div class="absolute bottom-0 w-full flex content-center   justify-end z-50 mt-12">
                            @php
                                $to = $k == 'to' ? 'Tryout Online':'Artikel' ;
                            @endphp
                            <a href="{{ route('post.index',['kategori' =>  $to]) }}" @click.prevent="Livewire.navigate('{{ route('post.index',['kategori' =>  $to]) }}')"  class="mt-12 rounded-full p-2 px-4   text-[#FABE0E] border border-solid border-[#FABE0E]  hover:bg-[#FABE0E] hover:text-white dark:border-gray-800 dark:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-slate-400 ">   Selanjutnya <span class="icon-[formkit--arrowright] self-center"></span></a>
                        </div>

                        @endif
                    </div>
                </div>
            @endif
            @if($k == 'bank')
                <div class=" @if (isset($data['status']) && $data['status'])  container px-12 mt-5  @endif" id="bank-soal">
                    <ul class="mt-2 w-full">
                        @forelse($data['data'] as $key => $value)
                            <li class="btn-exam">
                                <a class="block text-sky-600 dark:text-slate-400 " href="{{ route('post.banksoal.detail', ['slug'=>$value->slug]) }}" @click.prevent="Livewire.navigate('{{ route('post.banksoal.detail', ['slug'=>$value->slug]) }}')">  {{ $value->title }}</a>
                            </li>
                        @empty
                            <p>Tidak ada bank soal</p>
                        @endforelse
                    </ul>
                </div>
            @endif

        @endforeach
        {{--
        <div class="px-12  title text-left mx-auto">
            <h1 class="text-3xl mt-1 font-bold"> Try Out </h1>
        </div>
        <div class="container px-12 mt-5" id="try-out">
            <div class="w-full relative">
                <div class="swiper slide-carousel swiper-container relative ">
                    <div class="swiper-wrapper mb-16 flex">
                        <div class="swiper-slide card-octaclass-flex ">
                            <div class="w-full rounded-xl p-2 relative">
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
                            <div class="w-full rounded-xl p-2 relative">
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
                            <div class="w-full rounded-xl p-2 relative">
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
                            <div class="w-full rounded-xl p-2 relative">
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
                            <div class="w-full rounded-xl p-2 relative">
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
        --}}
</div>
