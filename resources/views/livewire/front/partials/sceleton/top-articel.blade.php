<div>

    @foreach($type as $k =>$title)
    <section class="container mb-12 mx-auto ">

            @if(!empty($title) && $_title)
                <div class="px-12 title text-left mx-auto">
                    <h1 class="text-3xl mt-1 font-bold">{{ ucwords($title) }}</h1>
                </div>
            @endif
        @if(in_array($k, ['artikel','to']))
        <div class="@if(!empty($title) && $_title) container px-12 mt-5" id="card-artikel @endif">
            <div class="w-full relative">
                <div class="swiper  @if(!empty($title) && $_title) slide-carousel @else slide-carousel-minimal @endif  swiper-container relative ">
                    <div class="swiper-wrapper mb-16 flex">
                        @for($i = 0; $i < $count; $i++)
                        <div class="swiper-slide card-octaclass-flex  animate-pulse rounded-xl">
                        <div class="flex items-center justify-center h-48 mb-4 bg-gray-300   dark:bg-gray-600 rounded-xl">
                                <span class="icon-[mdi--file-image] w-10 h-10 text-gray-200 dark:text-gray-800"></span>
                        </div>
                        <div class="px-4 py-4 dark:text-slate-400">
                        <div class="h-3 mb-4 bg-gray-200 rounded-full dark:bg-gray-600"></div>
                            <div class=" mb-1  gap-1">
                                <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-600 w-48 mb-4"></div>
                                <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-600 mb-3"></div>
                                <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-600 mb-3"></div>
                                <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-600"></div>
                            </div>
                        </div>
                        <hr class="dark:border-gray-700">
                        @if($k == 'to')
                            <div class="px-4 text-sm  py-2 w-full">
                                    <span  class="block rounded-full px-10 py-6 bg-gray-200 ">  </span>
                            </div>
                        @else
                            <div class="px-4 text-sm  py-2 flex justify-between">
                                <div class="w-9 h-w-9  icon-[solar--user-circle-bold] cursor-pointer size-6  my-auto   text-gray-200" ></div>

                                <div class="h-2.5  bg-gray-200 rounded-full dark:bg-gray-600 w-48 mt-2"></div>
                            </div>
                        @endif
                        </div>
                        @endfor
                    </div>

                    <div class="flex items-center gap-8 lg:justify-start justify-centerhidden">
                        <button id="slider-button-left" class="swiper-button-prev group !p-2 flex justify-center items-center border border-solid border-[#FABE0E] !w-12 !h-12 transition-all duration-500 rounded-full !top-2/4 !-translate-y-8 !left-5 hover:bg-[#FABE0E]  dark:border-gray-700 dark:hover:bg-gray-600" data-carousel-prev>
                            <svg class="h-5 w-5 text-[#FABE0E] dark:text-gray-400 dark:hover:text-gray-800 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path d="M10.0002 11.9999L6 7.99971L10.0025 3.99719" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                        <button id="slider-button-right" class="swiper-button-next group !p-2 flex justify-center items-center border border-solid border-[#FABE0E] !w-12 !h-12 transition-all duration-500 rounded-full !top-2/4 !-translate-y-8  !right-5 hover:bg-[#FABE0E] dark:border-gray-700 dark:hover:bg-gray-600" data-carousel-next>
                            <svg class="h-5 w-5 text-[#FABE0E] dark:text-gray-400 dark:hover:text-gray-800 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path d="M5.99984 4.00012L10 8.00029L5.99748 12.0028" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="absolute bottom-0 w-full flex content-center hidden  justify-end z-50 mt-12">
                    <a href="" class="mt-12 rounded-full p-2 px-4   text-[#FABE0E] border border-solid border-[#FABE0E]  hover:bg-[#FABE0E] hover:text-white dark:border-gray-800 dark:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-slate-400 "> Selanjutnya <span class="icon-[formkit--arrowright] self-center"></span></a>
                </div>
            </div>
        </div>
        @endif
        @if($k == 'bank')
            <div class=" @if(!empty($title) && $_title) container px-12 mt-5 animate-pulse @endif">
                <ul class="mt-2 w-full">
                @for($i = 0; $i < $count; $i++)
                    <li class="btn-exam py-4">
                    </li>
                @endfor
                </ul>
            </div>
        @endif
    </section>
    @endforeach
</div>
