<section class="max-h-screen h-screen relative"> 
    <div class="bg-[#FABE0E]  fixed w-full h-1/2"></div>
    <div class="w-full mt-3 max-sm:p-4 sm:h-screen space-y-4 sm:py-2 absolute z-20">
        <div class="max-sm:flex hidden  items-center justify-center text-white text-xl">
               <a href="{{ route('home') }}" class="flex space-x-2 items-center "> 
            <img src="{{ asset('asset/img/home/logo-rifaya.png') }}" alt="" class="w-5">
            <span> Source By Rifaya Education</span>
        </a>
        </div>
        <div class="bg-white  sm:my-auto  sm:w-9/12 mx-auto   sm:py-3  w-full p-5 rounded-xl shadow-md border-t-4 border-t-blue-700 dark:border dark:border-slate-800 mb-5 dark:border-t-4"> 
            <div class="text-justify"> 
                <h2 class="text-2xl font-extrabold mb-4">Data Siswa</h2>
                 <div class="flex space-x-2 text-lg">
                    <div class="font-semibold">NAMA LENGKAP :</div>
                    <div>{{ mb_strtoupper($siswa->nama_siswa )}}</div>
                 </div>
            </div>
        </div>
        @forelse ($myNilai as $k=> $v)
        <div class="min-h-96  bg-white  sm:my-auto  sm:w-9/12 mx-auto   sm:py-3  w-full p-5 rounded-xl shadow-md border-t-4 border-t-blue-700 dark:border dark:border-slate-800 mb-5 dark:border-t-4 ">
            <div class="text-justify"> 
                <h2 class="text-2xl font-extrabold mb-4">{{ $k }}</h2> 
                <div class="overflow-x-auto">
                @forelse ($v as $val )
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400  "> 
                        <tbody>                      
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                                <td scope="row" class="px-6 py-4 text-lg font-semibold   text-gray-900 whitespace-nowrap dark:text-white" colspan="2">
                                  Penilaian {{ $val->label->title }} ({{ $val->label->mapel->title }})
                                </td>
                            </tr>        
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                                <td scope="row" class="px-6 py-4 text-lg font-semibold   text-gray-900 whitespace-nowrap dark:text-white" >
                                    Nilai
                                </td>  
                                <td scope="row" class="px-6 py-4 text-lg font-medium   text-gray-900 whitespace-nowrap dark:text-white" >
                                    {{ $val->nilai }}
                                </td>  
                              
                            </tr>        
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                                <td scope="row" class="px-6 py-4 text-lg font-semibold   text-wrap text-gray-900 whitespace-nowrap dark:text-white" >
                                    Notifikasi
                                </td>  
                                <td scope="row" class="px-6 py-4 text-lg font-medium   text-wrap text-gray-900 whitespace-nowrap dark:text-white" >
                                    @if ( $val->nilai == 1)
                                        SELAMAT, NILAI ASAT KAMU AMAN!
                                    @else
                                        NILAI ASAT KAMU PERLU DITINGKATKAN!
                                    @endif
                                </td>  
                              
                            </tr>        
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                                <td scope="row" class="px-6 py-4 text-lg font-semibold   text-wrap text-gray-900 whitespace-nowrap dark:text-white" >
                                    Catatan
                                </td>  
                                <td scope="row" class="px-6 py-4 text-lg font-medium text-wrap   text-gray-900 whitespace-nowrap dark:text-white" >
                                    {!! $val->catatan !!}
                                </td>  
                              
                            </tr>        
                        </tbody>
                    </table>
                 @empty
                     Data belum tersedia
                 @endforelse
                </div>
                
      
            </div> 
        </div>
        @empty
        <div class="min-h-96  bg-white  sm:my-auto  sm:w-9/12 mx-auto   sm:py-3  w-full p-5 rounded-xl shadow-md border-t-4 border-t-blue-700 dark:border dark:border-slate-800 mb-5 dark:border-t-4 ">
            <div class="text-justify"> 
                <h2 class="text-2xl font-extrabold mb-4">Data Belum tersedia</h2> 
            </div> 
        </div>
        @endforelse

    </div>
   <div class=" max-sm:hidden rounded-2xl p-2 px-4 border-none  mt-2 fixed bottom-20 bg-[#FABE0E] border border-gray-300 shadow-lg text-white dark:bg-gray-800 dark:text-gray-200  right-4 z-50">
        <a href="{{ route('home') }}" class="flex space-x-2 items-center "> 
            <img src="{{ asset('asset/img/home/logo-rifaya.png') }}" alt="" class="w-5">
            <span> Source By Rifaya Education</span>
        </a>
    </div >
  
</section>
