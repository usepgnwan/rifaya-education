<section class="max-h-screen h-screen">
    <div class="gap-0 flex flex-wrap">
        <div class=" w-full sm:w-1/2 flex sm:h-screen justify-center sm:sticky sm:top-0 ">
            <div class="sm:my-auto mx-auto my-6 p-6">
                <div class="mx-auto h-72 bg-contain bg-no-repeat w-96 "  style="background-image: url('{{ asset('asset/img/home/teacher2.png') }}')"></div>
                <h1 class="text-center text-[#fabe0e] font-semibold text-3xl">
                    Rifaya Education
                </h1>
                <p class="text-center">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure reiciendis fuga, a quia sapiente, aut laboriosam quibusdam sed iusto corporis libero commodi. </p>
            </div>
        </div>
        <div class="w-full sm:w-1/2 sm:h-screen flex  overflow-y-auto sm:py-7 ">
            <div class="min-h-96 sm:my-auto w-11/12 sm:w-10/12 mx-auto rounded-2xl sm:py-6 card-bordered-yellow-octaclass shadow-md p-12">
                <h1 class="font-bold text-3xl mb-2">Form Registrasi Guru</h1>
                <p> Page ini dikhususkan bagi calon tutor/guru yang ingin bergabung bersama kami di <i class="text-[#fabe0e]">Rifaya education</i> , isi dulu form dibawah sini yaa 😊😊</p>
                <form class="w-full mt-4" wire:submit.prevent="register">
                    <div class="mb-2">
                        <x-input.group for="Nama Lengkap" :inline="'true'" label="Nama Lengkap <span class='text-red-500'>*</span>" :error="$errors->first('user.name')"  >
                            <x-input.text :id="__('name')" wire:model="user.name" placeholder="Nama Lengkap"  />
                        </x-input.group>
                    </div>
                    <div class="mb-2">
                        <x-input.group for="Email" :inline="'true'" label="Email <span class='text-red-500'>*</span>" :error="$errors->first('user.email')"  >
                            <x-input.text type="email" :id="__('email')" wire:model="user.email" placeholder="Email"  />
                        </x-input.group>
                    </div>
                    <div class="mb-2">
                        <x-input.group for="No Telp / Wa" :inline="'true'" label="No Telp / Wa <span class='text-red-500'>*</span>" :error="$errors->first('profile.no_telp')"  >
                            <x-input.text :id="__('no_telp')" wire:model="profile.no_telp" placeholder="masukan nama" type="number" />
                        </x-input.group>
                    </div>
                    <div class="mb-2">
                        <x-input.group for="Tanggal Lahir" :inline="'true'" label="Tanggal Lahir <span class='text-red-500'>*</span>" :error="$errors->first('profile.tanggal_lahir')"  >
                            <x-input.text :id="__('tanggal_lahir')" wire:model="profile.tanggal_lahir" placeholder="masukan tanggal lahir" type="date" />
                        </x-input.group>
                    </div>
                    <div class="mb-2">
                        <x-input.group for="Sosial Media" :inline="'true'" label="Sosial Media <span class='text-red-500'>*</span>" :error="$errors->first('sosmed.title')"  >
                            <x-input.text :id="__('sosmed')" wire:model="sosmed.title" placeholder="tiktok/ig"  />
                        </x-input.group>
                    </div>
                    <div class="mb-2">
                        <x-input.group for="Alamat Domisili" :inline="'true'" label="Alamat Domisili <span class='text-red-500'>*</span>" :error="$errors->first('profile.alamat_domisili')"  >
                            <x-input.textarea :id="__('profile')" wire:model="profile.alamat_domisili" placeholder="Alamat Domisili"  />
                        </x-input.group>
                    </div>
                    <div class="mb-2">
                        <x-input.group for="Pengalaman Kerja" :inline="'true'" label="Pengalaman Kerja " :error="$errors->first('experience.title')"  >
                            <x-input.textarea :id="__('experience')" wire:model="experience.title" placeholder="Deskripsikan secara singkat"  />
                        </x-input.group>
                    </div>
                    <div class="mb-2">
                        <x-input.group for="Metode Mengajar" :inline="'true'" label="Metode Mengajar" :error="$errors->first('profile.metode_mengajar')"  >
                            <x-input.textarea :id="__('metode_mengajar')" wire:model="profile.metode_mengajar" placeholder="Deskripsikan secara singkat"  />
                        </x-input.group>
                    </div>
                    <div class="mb-2">
                        <x-input.group for="perangkat" :inline="'true'" label="Apakah Memiliki perangkat mendukung untuk pembelajaran online? Sebutkan <span class='text-red-500'>*</span>" :error="$errors->first('profile.perangkat_ajar')"  >
                        <x-input.textarea :id="__('perangkat')" wire:model="profile.perangkat_ajar" placeholder="deskripsi singkat perangkat yang dimiliki"  />
                        </x-input.group>
                    </div>
                    <div class="mb-2">
                        <x-input.group for="kendaraan" :inline="'true'" label="Apakah Memiliki Kendaraan? <span class='text-red-500'>*</span>" :error="$errors->first('profile.kendaraan')"  >
                            <x-input.text :id="__('kendaraan')" wire:model="profile.kendaraan" placeholder="motor/mobil"  />
                        </x-input.group>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apakah Memiliki Sim?</label>
                        <x-input.group for="Title" :inline="'true'" label="sim <span class='text-red-500'>*</span>" :error="$errors->first('profile.sim')"  >
                            <x-input.radio>
                                <x-input.radio.item :id="__('radio-1')" :name="__('sim')"  value="1" wire:model.live="profile.sim">Ya</x-input.radio.item>
                                <x-input.radio.item :id="__('radio-2')" :name="__('sim')"  value="0" wire:model.live="profile.sim">Tidak</x-input.radio.item>
                            </x-input.radio>
                        </x-input.group>
                        <div class="mb-4 mt-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">Upload Foto Terkini</label>
                            <x-input.group for="Title" :inline="'true'" label="Foto" :error="$errors->first('form.image')"  >
                            <div
                                x-data="{ uploading: false, progress: 0 }"
                                x-on:livewire-upload-start="uploading = true"
                                x-on:livewire-upload-finish="uploading = false; progress = 0;"
                                x-on:livewire-upload-progress="progress = $event.detail.progress" >
                                @if ( $user['profile'] )

                                    @if (method_exists($user['profile'], 'temporaryUrl'))
                                        @if (method_exists($user['profile'], 'getMimeType') && str_starts_with($user['profile']->getMimeType(), 'image/'))
                                            <img class="h-48 object-cover rounded-lg w-96 mb-3" src="{{ $user['profile']->temporaryUrl() }}" alt="Image preview">
                                        @else
                                        <p class="text-red-500">Invalid file type. Only image files are allowed.</p>
                                        @endif
                                    @else
                                        <img class="h-48 object-cover rounded-lg w-96" src="{{ $user['profile'] }}" alt="Image preview">
                                    @endif
                                @endif
                                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="multiple_files" type="file"  wire:model="user.profile">
                                <p class="text-xs text-gray-400 mt-2">PNG, JPG SVG  and GIF are Allowed.</p>
                                <div x-show="uploading">
                                    <div class="w-full h-4 bg-slate-100 rounded-lg shadow-inner mt-3">
                                        <div class="bg-green-500 h-4 rounded-lg" :style="{ width: `${progress}%` }"></div>
                                    </div>
                                </div>
                            </div>
                        </x-input.group>

                        </div>
                        <div class="mb-4 mt-4">
                            <x-input.group for="Title" :inline="'true'" label="Upload Cv <span class='text-red-500'>*</span>pdf" :error="$errors->first('profile.cv')"  >
                                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="multiple_files" type="file"  wire:model="profile.cv">
                                <p class="text-xs text-gray-400 mt-2">PDF are Allowed. Max 5mb</p>
                            </x-input.group>
                        </div>
                    </div>
                    <div class="flex items-start mb-5">
                        <div class="flex items-center h-5">
                            <input id="terms" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required >
                        </div>
                        <label for="terms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Saya Setuju dengan <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a></label>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrasi</button>
                </form>
            </div>
        </div>
    </div>
</section>
