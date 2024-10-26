<section class="max-h-screen h-screen">
    <div class="gap-0 flex flex-wrap">
        <div class=" w-full sm:w-1/2 flex sm:h-screen justify-center sm:sticky sm:top-0 ">
            <div class="sm:my-auto mx-auto my-6 p-6">
                <div class="mx-auto h-72 bg-contain bg-no-repeat w-96 "  style="background-image: url('{{ asset('asset/img/home/teacher2.png') }}')"></div>
                <h1 class="text-center text-[#fabe0e] font-semibold text-3xl">
                    Rifaya Education
                </h1>
                <p class="text-center">Jadilah bagian dari perjalanan pendidikan yang menginspirasi. Bergabunglah dengan kami untuk membantu siswa mencapai potensi terbaik mereka. Raih kesempatan untuk berbagi pengetahuan dan keterampilan Anda sambil mendapatkan imbalan yang layak. Bergabunglah dengan Rifaya Education!</p>
            </div>
        </div>
        <div class="w-full sm:w-1/2 sm:h-screen flex  overflow-y-auto sm:py-7 ">
            <div class="min-h-96 sm:my-auto w-11/12 sm:w-10/12 mx-auto rounded-2xl sm:py-6 card-bordered-yellow-octaclass shadow-md p-12">
                <h1 class="font-bold text-3xl mb-2">Form Registrasi Tutor</h1>
                <p> Page ini dikhususkan bagi calon tutor yang ingin bergabung bersama kami di <i class="text-[#fabe0e]">Rifaya education</i> , isi dulu form dibawah sini yaa</p>
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
                            <x-input.text :id="__('no_telp')" wire:model="profile.no_telp" placeholder="No. Telp / Wa" type="number" />
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
                    <div class="mb-2 hidden">
                        <x-input.group for="Pengalaman Kerja" :inline="'true'" label="Pengalaman Kerja " :error="$errors->first('experience.title')"  >
                            <x-input.textarea :id="__('experience')" wire:model="experience.title" placeholder="Deskripsikan secara singkat"  />
                        </x-input.group>
                    </div>
                    <div class="mb-2">
                        <x-input.group for="lembaga_saat_ini" :inline="'true'" label="Apakah Anda mengajar di lembaga bimbel/les lain? Jika Ya, Sebutkan! (optional)" :error="$errors->first('profile.metode_mengajar')"  >
                            <x-input.textarea :id="__('lembaga_saat_ini')" wire:model="profile.lembaga_saat_ini" placeholder="Deskripsikan secara singkat"  />
                        </x-input.group>
                    </div>
                    <div class="mb-2">
                        <x-input.group for="perangkat" :inline="'true'" label="Apakah Memiliki perangkat mendukung untuk pembelajaran online? Sebutkan <span class='text-red-500'>*</span>" :error="$errors->first('profile.perangkat_ajar')"  >
                        <x-input.textarea :id="__('perangkat')" wire:model="profile.perangkat_ajar" placeholder="deskripsi singkat perangkat yang dimiliki"  />
                        </x-input.group>
                    </div>
                    <div class="mb-2" >
                        <x-input.group for="kelas" :inline="'true'" label="Kemampuan Mengajar  (optional)" :error="$errors->first('kelas')"  >
                            <div wire:ignore>
                                <x-input.select :multiple="__('true')" :placeholder="__('- Pilih Kelas -')"  wire:model.live.debounce.300ms="kelas" >
                                    @foreach ($_kelas as $v )
                                        <option value="{{ $v->id }}">{{ $v->title }} - {{ $v->jenjang->title }}</option>
                                    @endforeach
                                </x-input.select>
                            </div>
                        </x-input.group>
                        <span></span>
                    </div>
                    <div class="mb-2" >
                        <x-input.group for="kendaraan" :inline="'true'" label="Mata Pelajaran Yang dikuasai <span class='text-red-500'>*</span>" :error="$errors->first('mapel')"  >
                            <div wire:ignore>
                                <x-input.select :multiple="__('true')" :placeholder="__('- Pilih Mata Pelajaran -')"  wire:model.live.debounce.300ms="mapel" >
                                    @foreach ($mata_pelajarans as $v )
                                        <option value="{{ $v->id }}">{{ $v->title }}</option>
                                    @endforeach
                                </x-input.select>
                            </div>
                        </x-input.group>
                    </div>

                    <div class="mb-2" >
                        <x-input.group for="hari" :inline="'true'" label="Sebutkan jadwal ketersediaan mengajar Anda di Rifaya Education <span class='text-red-500'>*</span>" :error="$errors->first('hari')"  >
                            <div wire:ignore>
                                <x-input.select :multiple="__('true')" :placeholder="__('- Pilih Hari -')"  wire:model.live.debounce.300ms="hari" >
                                    @foreach (App\Models\User::HARI as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>
                                    @endforeach
                                </x-input.select>
                            </div>
                        </x-input.group>
                    </div>
                    <div class="mb-2" >
                        <x-input.group for="waktu" :inline="'true'" label="Sebutkan jadwal ketersediaan mengajar Anda di Rifaya Education <span class='text-red-500'>*</span>" :error="$errors->first('waktu')"  >
                            <div wire:ignore>
                                <x-input.select :multiple="__('true')" :placeholder="__('- Pilih Jam Ajar -')"  wire:model.live.debounce.300ms="waktu" >
                                    @foreach (App\Models\User::WAKTU as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>
                                    @endforeach
                                </x-input.select>
                            </div>
                        </x-input.group>
                    </div>

                    <div class="mb-2">
                        <x-input.group for="kendaraan" :inline="'true'" label="Metode Mengajar <span class='text-red-500'>*</span>" :error="$errors->first('mentoring')" >
                            <div wire:ignore>
                                <x-input.select  :multiple="__('true')" :placeholder="'- Pilih Metode Mengajar -'" wire:model.live.debounce.300ms="mentoring">
                                    <option value="offline">Offline (datang kerumah)</option>
                                    <option value="online">Online</option>
                                </x-input.select>
                            </div>
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
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Sim A" wire:model.live="profile.sim"  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sim A</label>
                            </div>
                            <div class="flex items-center">
                                <input checked id="checked-checkbox" type="checkbox" value="Sim C" wire:model.live="profile.sim" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sim C</label>
                            </div>
                        </x-input.group>
                        <div class="mb-4 mt-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">Upload Foto Terkini (optional)</label>
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
