
   <div class="w-full mt-14 mb-32 min-h-96 max-lg:mb-20 max-lg:p-2 flex justify-center items-center flex-col text-center">
        <img src="{{ url('asset/img/home/register-succes.png') }}" class='lg:w-32 max-lg:w-20 ' >
        <p class="mt-6 text-3xl font-bold">Hallo</p>
        <p class=" text-xl italic  text-[#FABE0E]">"{{$name}}"</p>
        <p class="max-lg:text-xs">Tim kami akan segera menghubungi anda secepatnya.</p>
        <p class="max-lg:text-xs">Terima Kasih 😊</p>
        <x-button.link href="{{ route('home') }}" class="btn-next-yellow mt-2 ">Kembali ke halaman utama</x-input.link>
   </div>
