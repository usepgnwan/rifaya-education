<section>
    <div>
        <h1 class="text-2xl font-semibold text-gray-900 mb-2">Absensi Harian</h1>
        <x-partials.dashboard.breadcumb :data="$breadcumb"> </x-partials.dashboard.breadcumb>

        <div class="py-4 space-y-4">
            <!-- Top Bar -->
            <div class="flex justify-between max-lg:flex-wrap">
                <div class="w-2/4 flex space-x-4  max-lg:w-full">
                    <div class="w-10/12">
                        <x-input.text wire:model.live.debounce.300ms="filters.search" placeholder="Absensi Harian..." />
                    </div>
                </div>

                <div class="space-x-2 flex items-center max-lg:w-full" wire:ignore>
                    <x-input.select wire:model.live.debounce.300ms="perPage" id="perPage">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </x-input.select>

                    <x-dropdown label="Bulk Actions" class="hidden">


                        <x-dropdown.item type="button" wire:click="$toggle('showDeleteModal')" class="flex items-center space-x-2">
                            <x-icon.trash class="text-cool-gray-400" /> <span>Delete</span>
                        </x-dropdown.item>
                    </x-dropdown>
                    <x-button.primary wire:click="create"><x-icon.plus /> New</x-button.primary>
                </div>
            </div>

            <!-- users Table -->
            <div class="flex-col space-y-4">
                <x-table>
                    <x-slot name="head">
                        <x-table.heading class="pr-0 w-8">
                            <x-input.checkbox wire:model.live="selectPage" />
                        </x-table.heading>
                        <x-table.heading class="pr-0 w-8">No.</x-table.heading>
                        <x-table.heading>.::.</x-table.heading>
                        <x-table.heading sortable multi-column wire:click="sortBy('name_student')" :direction="$sorts['name_student'] ?? null" class="w-full">Nama Siswa</x-table.heading>
                        <x-table.heading>Kelas</x-table.heading>
                        <x-table.heading sortable multi-column wire:click="sortBy('mata_pelajaran')" :direction="$sorts['mata_pelajaran'] ?? null" class="w-full">Mata Pelajaran</x-table.heading>
                        <x-table.heading>Tanggal</x-table.heading>
                        <x-table.heading>Jam Ajar</x-table.heading>
                        <x-table.heading>Tambahan Jam Ajar</x-table.heading>
                        <x-table.heading>Sistem Pengajaran</x-table.heading>
                        <x-table.heading>Foto</x-table.heading>
                        <x-table.heading>Catatan</x-table.heading>
                    </x-slot>

                    <x-slot name="body">
                        @if ($selectPage)
                        <x-table.row class="bg-cool-gray-200" wire:key="row-message">
                            <x-table.cell colspan="12">
                                @unless ($selectAll)
                                <div>
                                    <span>You have selected <strong>{{ $data->count() }}</strong> Mapping, do you want to select all <strong>{{ $data->total() }}</strong>?</span>
                                    <x-button.link wire:click="selectAllPage" class="ml-1 text-blue-600">Select All</x-button.link>
                                </div>
                                @else
                                <span>You are currently selecting all <strong>{{ $data->total() }}</strong> users.</span>
                                @endif
                            </x-table.cell>
                        </x-table.row>
                        @endif

                        @forelse ($data as $k => $values)

                        <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $values->id }}" wire:target="filters.search,perPage,gotoPage, previousPage, nextPage">
                            <x-table.cell class="pr-0">
                                <x-input.checkbox wire:model.live="selected" value="{{ $values->id }}" />
                            </x-table.cell>
                            <x-table.cell class="pr-0">
                                {{$k+$data->firstItem()}}
                            </x-table.cell>
                            <x-table.cell>
                                <div class="flex">
                                    <x-button.link wire:click="edit({{ $values->id }})" class="bg-green-500 mx-1 px-2 py-1 rounded text-white" title="Edit"><span class="icon-[uil--edit]"></span></x-button.link>
                                </div>
                            </x-table.cell>
                            <x-table.cell>
                                <span class="text-cool-gray-900 font-medium">{{ $values->mapping->student->name }} </span>
                            </x-table.cell>
                            <x-table.cell>
                                <span class="text-cool-gray-900 font-medium">{{ $values->mapping->kelas->title }} - {{ $values->mapping->kelas->jenjang->title }} </span>
                            </x-table.cell>
                            <x-table.cell>
                                <span class="text-cool-gray-900 font-medium">{{ $values->mapping->mata_pelajaran->title }} </span>
                            </x-table.cell>
                            <x-table.cell>
                                <span class="text-cool-gray-900 font-medium">{{ $values->tanggal }} </span>
                            </x-table.cell>
                            <x-table.cell>
                                <span class="text-cool-gray-900 font-medium">{{ $values->jam_ajar }} </span>
                            </x-table.cell>
                            <x-table.cell>
                                <span class="text-cool-gray-900 font-medium">{{ $values->tambahan_jam_ajar }} </span>
                            </x-table.cell>
                            <x-table.cell>
                                <span class="text-cool-gray-900 font-medium">{{ $values->sistem_mengajar }} </span>
                            </x-table.cell>
                            <x-table.cell>


                                    @if($values->foto)
                                        <x-style.glithbox href="{{ $values->foto }}" data-gallery="gallery-{{$values->id}}" class="glightbox" >
                                            <x-style.glithbox.img :url="$values->foto" alt="image not found"  class=" object-contain  hover:grayscale transition-all duration-700 ease-in-out mx-auto lg:col-span-4 md:col-span-6 w-full h-full" />
                                        </x-style.glithbox>
                                    @else
                                        <p>Image not available</p>
                                    @endif
                            </x-table.cell>
                            <x-table.cell>
                                <span class="text-cool-gray-900 font-medium">{{ $values->catatan }} </span>
                            </x-table.cell>
                        </x-table.row>
                        @empty
                        <x-table.row>
                            <x-table.cell colspan="12">
                                <div class="flex justify-center items-center space-x-2">
                                    <x-icon.inbox class="h-8 w-8 text-cool-gray-400" />
                                    <span class="font-medium py-8 text-cool-gray-400 text-xl">No Absensi Harian found...</span>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                        @endforelse
                    </x-slot>
                </x-table>

                <div>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
        <!-- Delete Transactions Modal -->
        <form wire:submit.prevent="deleteSelected">
            <x-modal.confirmation wire:model.defer="showDeleteModal">
                <x-slot name="title">Delete Absensi Harian</x-slot>
                <x-slot name="content">
                    <div class="py-8 text-cool-gray-700">Are you sure you? This action is irreversible.</div>
                </x-slot>

                <x-slot name="footer">
                    <x-button.secondary wire:click="$set('showDeleteModal', false)">Cancel</x-button.secondary>

                    <x-button.primary type="submit">Delete</x-button.primary>
                </x-slot>
            </x-modal.confirmation>
        </form>
        <!-- Save Transaction Modal -->
        <form wire:submit.prevent="save">
            <x-modal.dialog wire:model.defer="showEditModal">
                <x-slot name="title">Create/Edit Absensi Harian</x-slot>
                <x-slot name="content">
                    <div>

                        <x-input.group :inline="'true'" for="Siswa" label="Nama Siswa  <span class='mt-1 text-red-500 text-sm'>*</span>" :error="$errors->first('request.mapping_siswa_id')">
                            <div wire:ignore>
                                <x-input.select wire:model.live.debounce.300ms="request.mapping_siswa_id" :placeholder="__('- Pilih Siswa -')">
                                    <option value="">- Pilih Siswa -</option>
                                    @foreach ($siswa as $value)
                                    <option value="{{ $value->id }}">{{ $value->student->name }} - {{ $value->mata_pelajaran->title }} - ({{ $value->kelas->title }} - {{ $value->kelas->jenjang->title }})</option>
                                    @endforeach
                                </x-input.select>
                            </div>
                        </x-input.group>
                    </div>
                    <div>
                            <x-input.group :inline="'true'" for="Sistem Mengajar" label="Sistem Mengajar <span class='mt-1 text-red-500 text-sm'>*</span>" :error="$errors->first('request.sistem_mengajar')">
                                <div wire:ignore>
                                    <x-input.select  wire:model.live.debounce.300ms="request.sistem_mengajar" :placeholder="__('- Pilih Sistem Mengajar -')">
                                    <option value="">- Pilih Sistem Mengajar -</option>
                                    <option value="Offline"> Offline (datang kerumah)</option>
                                    <option value="Online"> Online</option>
                                    </x-input.select>
                                </div>
                            </x-input.group>
                    </div>
                    <x-input.group :inline="'true'" for="tanggal" label="Tanggal <span class='mt-1 text-red-500 text-sm'>*</span>" :error="$errors->first('request.tanggal')">
                        <x-input.text type="date" wire:model="request.tanggal" id="tanggal" placeholder="Tanggal Akhir" />
                    </x-input.group>
                    <x-input.group :inline="'true'" for="jam_ajar" label="Jam Ajar (Menit) <span class='mt-1 text-red-500 text-sm'>*</span>" :error="$errors->first('request.jam_ajar')">
                        <x-input.text type="number" wire:model="request.jam_ajar" id="jam_ajar" placeholder="0" />
                    </x-input.group>
                    <x-input.group :inline="'true'" for="tambahan_jam_ajar" label="Tambahan Jam Ajar (Menit)" :error="$errors->first('request.tambahan_jam_ajar')">
                        <x-input.text type="number" wire:model="request.tambahan_jam_ajar" id="tambahan_jam_ajar" placeholder="0" />
                    </x-input.group>

                    <x-input.group for="Title" :inline="'true'" label="Foto" :error="$errors->first('request.foto')"  >
                        <div
                            x-data="{ uploading: false, progress: 0 ,
                                    resetFileInput() {
                                        document.getElementById('foto').value = ''; // Reset file input
                                        $wire.set('request.foto', 'remove'); // Clear Livewire model
                                    }
                            }"
                            x-on:livewire-upload-start="uploading = true"
                            x-on:livewire-upload-finish="uploading = false; progress = 0;"
                            x-on:livewire-upload-progress="progress = $event.detail.progress" >
                            @if ( $request['foto'] )
                                <div class="relative">
                                <button type="button" class="absolute top-0  @if (is_null($request['foto']) || $request['foto'] == 'remove') hidden @endif left-2 rounded bg-red-500 p-3 mt-1 text-white" @click="resetFileInput()">X</button>
                                @if (method_exists($request['foto'], 'temporaryUrl'))
                                    @if (method_exists($request['foto'], 'getMimeType') && str_starts_with($request['foto']->getMimeType(), 'image/'))
                                        <img class="object-cover mb-3 w-96" src="{{ $request['foto']->temporaryUrl() }}" alt="foto preview">
                                    @else
                                       <p class="text-red-500">Invalid file type. Only foto files are allowed.</p>
                                    @endif
                                @else
                                    <img class="object-cover mb-3 w-96 @if ($request['foto'] =='remove') hidden  @endif" src="{{ $request['foto'] }}" alt="Image preview">
                                @endif
                                </div>
                            @endif
                            <input type="file" name="file" id="file" wire:model="request.foto" accept="image/*">
                            <p class="text-xs text-gray-400 mt-2">PNG, JPG SVG  and GIF are Allowed.</p>
                            <div x-show="uploading">
                                <div class="w-full h-4 bg-slate-100 rounded-lg shadow-inner mt-3">
                                    <div class="bg-green-500 h-4 rounded-lg" :style="{ width: `${progress}%` }"></div>
                                </div>
                            </div>
                        </div>
                    </x-input.group>
                    <x-input.group :inline="'true'" for="catatan" label="Catatan Mengajar" :error="$errors->first('request.catatan')">
                        <x-input.textarea  wire:model="request.catatan" id="catatan" placeholder="Catatan Mengajar" />
                    </x-input.group>


                </x-slot>

                <x-slot name="footer">
                    <x-button.secondary wire:click="$set('showEditModal', false)">Cancel</x-button.secondary>

                    <x-button.primary type="submit">Save</x-button.primary>
                </x-slot>
            </x-modal.dialog>
        </form>
    </div>

</section>
