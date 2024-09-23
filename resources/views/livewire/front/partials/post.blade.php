<div class=" mb-12 continer  ">
<div class="w-full  max-sm:block hidden ">
    {{ $data->links('vendor.livewire.tailwind')}}
</div>
<div class="w-full  sm:flex sm:flex-wrap sm:gap-6 sm:justify-evenly">
@forelse($data as $k =>$item)
        <div class="  dark:shadow-gray-800 dark:bg-gray-800 dark:text-slate-400 rounded-xl shadow-lg mb-10 sm:mb-0 sm:w-64 md:w-80 lg:w-72  ">
            <div class="w-full rounded-xl p-2 relative">
                <div class="w-full h-52 mt-1 mb-2 overflow-hidden rounded-xl group">
                    <div class="w-full h-full bg-cover bg-center bg-no-repeat rounded-xl transition-transform duration-300 ease-in-out transform scale-125 group-hover:scale-100" style="background-image: url('{{ asset($item->image) }}')">
                    </div>
                </div>
                <div class="dark:bg-gray-800 absolute top-4 right-4 text-[10px] p-2 shadow-lg bg-white rounded-md content-center">
                    <span class="icon-[carbon--time]"></span>
                    <span data-tooltip-target="tooltipContent-{{ $item->id }}" id="tooltip-default" > {{ $item->created_at->diffForHumans()  }} </span>
                </div>
                <div id="tooltipContent-{{ $item->id   }}" role="tooltip" class="relative w-3/5 z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    {{ $item->created_at->format('d M Y h:i:s')   }}
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>
            <div class="px-4 py-4 dark:text-slate-400">
                <div class="font-bold text-xl mb-1 text-gray-600 dark:text-slate-400 min-h-20">
                    <p class=" line-clamp-3 hover:line-clamp-none cursor-pointer hover:text-blue-500">
                        <a href="{{ route('post.detail', ['slug'=>$item->slug]) }}" @click.prevent="Livewire.navigate('{{ route('post.detail', ['slug'=>$item->slug]) }}')">  {{ $item->title }}</a>
                    </p>
                </div>
                <div class="flex mb-1  gap-1   overflow-auto">
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
            @if($item->categori_id == 2)
                <div class="px-4 text-sm  py-2 w-full">
                    <a href="" class="block btn-start-card py-3 "> Mulai</a>
                </div>
            @else
                <div class="px-4 text-sm  py-2 flex">
                    <img id="avatarButton" class="w-7 h-w-7 rounded-full cursor-pointer " src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="User">
                    <div class="px-4 pt-1">{{ $item->user->name ?? '' }}</div>
                </div>
            @endif
        </div>
    @empty
    <div class="w-full p-4  text-center">
        --- Tidak ada data ---
    </div>
    @endforelse
</div>
<div class="w-full  sm:flex  sm:gap-6 sm:justify-evenly mt-12">

    {{ $data->links('vendor.livewire.pagination-home')}}
</div>



</div>
