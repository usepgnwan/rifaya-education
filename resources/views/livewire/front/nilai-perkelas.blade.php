<section class="max-h-screen h-screen relative"> 
    <div class="bg-[#FABE0E]  fixed w-full h-1/2"></div>
    <div class="w-full mt-3 max-sm:p-4 sm:h-screen space-y-4 sm:py-2 absolute z-20 ">
        <div class="max-sm:flex hidden  items-center justify-center text-white text-xl">
               <a href="{{ route('home') }}" class="flex space-x-2 items-center "> 
            <img src="{{ asset('asset/img/home/logo-rifaya.png') }}" alt="" class="w-5">
            <span> Source By Rifaya Education</span>
        </a>
        </div>
        <div class="bg-white  sm:my-auto  sm:w-9/12 mx-auto   sm:py-3   w-full p-5 rounded-xl shadow-md border-t-4 border-t-blue-700 dark:border dark:border-slate-800 mb-5 dark:border-t-4"> 
            <div class="text-justify"> 
                <h2 class="text-2xl font-extrabold mb-4">Pilih Kelas</h2> 
                      <form wire:submit.prevent="getList"  class="flex w-full space-x-2 max-sm:flex-wrap max-sm:space-y-3">
                        <div class="w-9/12"> 
                                <div wire:ignore>
                                    <x-input.select wire:model.live.debounce.300ms="request.kelas_id" :placeholder="__('- Pilih Kelas -')">
                                        <option value="">- Pilih Kelas -</option> 
                                        @foreach ($kelas as $value)
                                            <option value="{{ $value->id }}">{{ $value->kelas->title }} {{ $value->title }} ({{ $value->kelas->jenjang->title }}) - {{ $value->sekolah->nama_sekolah }}</option>
                                        @endforeach
                                    </x-input.select>
                                </div> 
                        </div>
                        <div class="w-3/12"> 
                            <x-button.primary type="submit" class="w-48 block max-sm:w-full max-sm:mt-3">Pilih</x-button.primary>
                        </div>
                      </form>
                  
            </div>
        </div>
        <div class="min-h-96  bg-white  sm:my-auto  sm:w-9/12 mx-auto   sm:py-3   w-full p-5 rounded-xl shadow-md border-t-4 border-t-blue-700 dark:border dark:border-slate-800 mb-5 dark:border-t-4 ">

            <div class="text-justify"> 
                <h2 class="text-2xl font-extrabold mb-4">Data Siswa</h2>
                 
                 @if ( count($this->listsiswa) > 0)
                 <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama Siswa
                            </th>
                            <th scope="col" class="px-6 py-3">
                                .::.
                            </th> 
                            
                        </tr>
                    </thead>
                    <tbody>
                            @forelse ($listsiswa as $value)
                            
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $value['nama_siswa'] }} 
                                    </td> 
                                  <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"> 
                                     <x-button.link   href="{{ route('nilai.siswa', [ 'id'=> $value['slug'] ]) }}" @click.prevent="Livewire.navigate('{{ route('nilai.siswa', [ 'id'=> $value['slug'] ]) }}')"  class="bg-green-500 mx-1 px-2 py-1 rounded text-white" >Lihat Nilai Saya</x-button.link> 
                                  </td>
                                </tr> 
                            @empty
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    data belum tersedia
                                    </td> 
                                </tr>     
                            @endforelse
                        </tbody>
                    </table>
                 @else
                    Data siswa belum tersedia / Pilih Kelas Kamu dulu yaa .
                 @endif
            </div>
             
        </div>
    </div>
   <div class=" max-sm:hidden rounded-2xl p-2 px-4 border-none  mt-2 fixed bottom-20 bg-[#FABE0E] border border-gray-300 shadow-lg text-white dark:bg-gray-800 dark:text-gray-200  right-4 z-50">
        <a href="{{ route('home') }}" class="flex space-x-2 items-center "> 
            <img src="{{ asset('asset/img/home/logo-rifaya.png') }}" alt="" class="w-5">
            <span> Source By Rifaya Education</span>
        </a>
    </div >
  
</section>
