<section class="max-h-screen h-screen">


    <div class="w-full mt-14 mb-32 min-h-96 max-lg:mb-20 max-lg:p-2 justify-center items-center flex-col text-center  @if(session()->has('success')) flex  @else hidden @endif">
            <img src="{{ asset('asset/img/home/affiliate.png') }}" class='lg:w-96 max-lg:w-40 ' >
            <p class="mt-6 text-3xl font-bold">Hallo</p>
            <p class=" text-xl italic  text-[#FABE0E]">"Hallo Kak,  @if(session()->has('success')) {{session()->get('success')}}@endif"</p>
            <p class="max-lg:text-xs">Terima Kasih, Sudah mendaftar sebagai affiliator di Rifaya Education, berikut link yang bisa kaka share yaa 😊😊</p>
            <div class="max-lg:flex-wrap space-x-3 @if(session()->has('token')) flex  @else hidden @endif">
                <p id="textToCopy"class="hidden">{{route('register') . '/' . session()->get('token')}}</p>
                <p >{{ Str::limit(route('register') . '/' . session()->get('token'), 50) }}</p>


            </div>
        <div class="flex max-lg:flex-wrap space-x-3 justify-center">
            <x-button.link   class="btn-next-yellow mt-2 " id="copyButton"><span class="icon-[mynaui--copy]"></span>Copy Link Affiliate</x-input.link>
            <x-button.link href="{{ route('home') }}" class="btn-next-yellow mt-2 "><span class="icon-[bx--home]"></span> Kembali ke halaman utama</x-input.link>
            <div class="btn-next-yellow mt-2 whatsapp-button cursor-pointer"><span class="icon-[logos--whatsapp-icon] "></span> Hubungi Admin</div>
        </div>
    </div>

    @if(!session()->has('success'))
    <div class="gap-0 flex flex-wrap">
        <div class=" w-full sm:w-1/2 flex sm:h-screen justify-center sm:sticky sm:top-0 ">
            <div class="sm:my-auto mx-auto my-6 p-6">

                <img src="{{ asset('asset/img/home/affiliate.png') }}" class="h-96  w-96 mx-auto">
                <h1 class="text-center text-[#fabe0e] font-semibold text-3xl">
                    Rifaya Education
                </h1>
                <p class="text-center">Bergabunglah dengan kami sebagai affiliator les privat di Rifaya Education dan raih penghasilan tambahan dengan membantu siswa belajar! </p>
                <div class=" w-56  mx-auto">
                    <x-button.link href="{{ route('home') }}" class="btn-next-yellow mt-2 ">Kembali ke halaman utama</x-input.link>
                </div>
            </div>
        </div>
        <div class="w-full sm:w-1/2 sm:h-screen flex  overflow-y-auto sm:py-7 ">
            <div class="min-h-96 sm:my-auto w-11/12 sm:w-10/12 mx-auto rounded-2xl sm:py-6 card-bordered-yellow-octaclass shadow-md p-12">
                <h1 class="font-bold text-2xl">Registrasi Affiliator</h1>
                <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p> -->
                <form wire:submit="save" class="w-full mt-2">
                    <div class="mb-2">
                        <x-input.group for="Nama Lengkap" :inline="'true'" label="Nama Lengkap " :error="$errors->first('form.name')"  >
                            <x-input.text leadingAddOn='<span class="icon-[et--profile-male]"></span>' :id="__('name')" wire:model="form.name" placeholder="Nama Lengkap" type="input" />
                        </x-input.group>
                    </div>
                    <div class="mb-2">
                        <x-input.group for="No_telp" :inline="'true'" label="No. Telp/wa" :error="$errors->first('profile.no_telp')"  >
                            <x-input.text leadingAddOn='<span class="icon-[bi--phone]"></span>' :id="__('name')" wire:model="profile.no_telp" placeholder="No. Telp/wa" type="number" />
                        </x-input.group>
                    </div>
                    <div class="mb-2">
                        <x-input.group for="Email" :inline="'true'" label="Email " :error="$errors->first('form.email')"  >
                            <x-input.text leadingAddOn='<span class="icon-[fontisto--email]"></span> ' :id="__('email')" wire:model="form.email" placeholder="Email / Username" type="input" />
                        </x-input.group>
                    </div>
                    <div class="mb-2">
                        <x-input.group for="Password" :inline="'true'" label="Password " :error="$errors->first('form.password')"  >
                            <x-input.text leadingAddOn='<span class="icon-[lucide--key-round]"></span> ' :id="__('password')" wire:model="form.password" placeholder="password" type="password" />
                        </x-input.group>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Daftar</button>
                    <p class="mt-3">sudah punya akun? <span><a href="{{ route('login') }}"  @click.prevent="Livewire.navigate('{{ route('login') }}')"  class="text-blue-700"> Login disini </a></span></p>
                </form>
            </div>
        </div>
    </div>
    @endif
</section>

<script>
        document.getElementById('copyButton').addEventListener('click', function() {
            const text = document.getElementById('textToCopy').innerText;
            navigator.clipboard.writeText(text).then(() => {
                alert('Link Affiliate berhasil dicopy');
            }).catch(err => {
                console.error('Failed to copy text: ', err);
            });
        });
</script>
