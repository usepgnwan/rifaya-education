<section>
    <div>
        <h1 class="text-2xl font-semibold text-gray-900 mb-2">Rekap Absensi</h1>
        <x-partials.dashboard.breadcumb :data="$breadcumb"> </x-partials.dashboard.breadcumb>

        <div class="py-4 space-y-4">
            <!-- Top Bar -->
            <div class="flex justify-between max-lg:flex-wrap">
                <div class="w-2/4 flex space-x-4  max-lg:w-full">
                    <div class="w-10/12">
                        <x-input.text wire:model.live.debounce.300ms="filters.search" placeholder="Rekap Absensi..." />
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
                        @can('hasRole', [1])
                        <x-table.heading class="w-full">Nama Guru</x-table.heading>
                        @endcan
                        <x-table.heading class="w-full">Nama Siswa</x-table.heading>
                        <x-table.heading >Fee Transfer</x-table.heading>
                        <x-table.heading>Kelas</x-table.heading>
                        <x-table.heading class="w-full">Mata Pelajaran</x-table.heading>
                        <x-table.heading>Tanggal Awal</x-table.heading>
                        <x-table.heading>Tanggal Akhir</x-table.heading>
                        <x-table.heading>Jadwal Terlaksana</x-table.heading>
                        <x-table.heading>Total Sesi</x-table.heading>
                        <x-table.heading>Tambahan Jam Ajar</x-table.heading>
                        <x-table.heading>Laporan</x-table.heading>
                        <x-table.heading>Kendala</x-table.heading>
                        <x-table.heading>Saran</x-table.heading>
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
                                    <x-button.link title="download cv" href="{{ $values->file ?? ''}}" target="_blank" class="bg-blue-500 mx-1 px-2 py-1 rounded text-white">
                                        <span class="icon-[prime--file-pdf]  text-xl inline-block"></span>
                                    </x-button.link>
                                </div>
                            </x-table.cell>
                            @can('hasRole', [1])
                            <x-table.cell>
                                <span class="text-cool-gray-900 font-medium">{{ $values->mapping->teacher->name }} </span>
                            </x-table.cell>
                            @endcan
                            <x-table.cell>
                                <span class="text-cool-gray-900 font-medium">{{ $values->mapping->student->name }} </span>
                            </x-table.cell>
                            <x-table.cell>
                                <span class="text-cool-gray-900 font-medium">{{ $values->fee_transfer }} </span>
                            </x-table.cell>
                            <x-table.cell>
                                <span class="text-cool-gray-900 font-medium">{{ $values->mapping->kelas->title }} - {{ $values->mapping->kelas->jenjang->title }} </span>
                            </x-table.cell>
                            <x-table.cell>
                                <span class="text-cool-gray-900 font-medium">{{ $values->mapping->mata_pelajaran->title }} </span>
                            </x-table.cell>
                            <x-table.cell>
                                <span class="text-cool-gray-900 font-medium">{{ $values->tanggal_awal }} </span>
                            </x-table.cell>
                            <x-table.cell>
                                <span class="text-cool-gray-900 font-medium">{{ $values->tanggal_akhir }} </span>
                            </x-table.cell>
                            <x-table.cell>
                                <span class="text-cool-gray-900 font-medium">{{ $values->jadwal_terlaksana }} </span>
                            </x-table.cell>
                            <x-table.cell>
                                <span class="text-cool-gray-900 font-medium">{{ $values->total_sesi }} </span>
                            </x-table.cell>
                            <x-table.cell>
                                <span class="text-cool-gray-900 font-medium">{{ $values->tambahan_jam_ajar }} </span>
                            </x-table.cell>
                            <x-table.cell>
                                <span class="text-cool-gray-900 font-medium">{{ $values->laporan }} </span>
                            </x-table.cell>
                            <x-table.cell>
                                <span class="text-cool-gray-900 font-medium">{{ $values->kendala }} </span>
                            </x-table.cell>
                            <x-table.cell>
                                <span class="text-cool-gray-900 font-medium">{{ $values->saran }} </span>
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
                                    <span class="font-medium py-8 text-cool-gray-400 text-xl">No Rekap Absensi found...</span>
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
                <x-slot name="title">Delete Rekap Absensi</x-slot>
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
                <x-slot name="title">Create/Edit Rekap Absensi</x-slot>
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

                    <x-input.group :inline="'true'" for="fee_transfer" label="Fee Transfer (Contoh : Rifaya_Mandiri_1882221) <span class='mt-1 text-red-500 text-sm'>*</span>" :error="$errors->first('request.fee_transfer')">
                        <x-input.text type="text" wire:model="request.fee_transfer" id="fee_transfer" placeholder="Fee Transfer " />
                    </x-input.group>
                    <x-input.group :inline="'true'" for="tanggal_awal" label="Tanggal Awal <span class='mt-1 text-red-500 text-sm'>*</span>" :error="$errors->first('request.tanggal_awal')">
                        <x-input.text type="date" wire:model="request.tanggal_awal" id="tanggal_awal" placeholder="Fee Transfer " />
                    </x-input.group>
                    <x-input.group :inline="'true'" for="tanggal_akhir" label="Tanggal Akhir <span class='mt-1 text-red-500 text-sm'>*</span>" :error="$errors->first('request.tanggal_akhir')">
                        <x-input.text type="date" wire:model="request.tanggal_akhir" id="tanggal_akhir" placeholder="Fee Transfer " />
                    </x-input.group>
                    <div>
                        <x-input.group :inline="'true'" for="Jadwal Terlaksana" label="Jadwal Terlaksana <span class='mt-1 text-red-500 text-sm'>*</span>" :error="$errors->first('request.jadwal_terlaksana')">
                            <div wire:ignore>
                                <x-input.select wire:model.live.debounce.300ms="request.jadwal_terlaksana" :placeholder="__('- Pilih Jadwal Terlaksana -')">
                                    <option value="">- Pilih Jadwal Terlaksana -</option>
                                    <option value="Senin"> Senin</option>
                                    <option value="Selasa"> Selasa</option>
                                    <option value="Rabu"> Rabu</option>
                                    <option value="Kamis"> Kamis</option>
                                    <option value="Jum'at"> Jum'at</option>
                                    <option value="Sabtu"> Sabtu</option>
                                    <option value="Minggu"> Minggu</option>
                                </x-input.select>
                            </div>
                        </x-input.group>
                    </div>

                    <x-input.group :inline="'true'" for="total_sesi" label="Total Sesi <span class='mt-1 text-red-500 text-sm'>*</span>" :error="$errors->first('request.total_sesi')">
                        <x-input.text type="number" wire:model="request.total_sesi" id="total_sesi" placeholder="Total Sesi " />
                    </x-input.group>
                    <x-input.group :inline="'true'" for="tambahan_jam_ajar" label="Tambahan Jam Ajar (menit) <span class='mt-1 text-red-500 text-sm'>*</span>" :error="$errors->first('request.tambahan_jam_ajar')">
                        <x-input.text type="number" wire:model="request.tambahan_jam_ajar" id="tambahan_jam_ajar" placeholder="Tambahan Jam Ajar (menit)" />
                    </x-input.group>

                    <x-input.group :inline="'true'" for="file" label="File/Foto <span class='mt-1 text-red-500 text-sm'>*</span>" :error="$errors->first('request.file')">
                        <input type="file" name="file" id="file" wire:model="request.file"  >
                        <p class="text-xs text-gray-400 mt-2">PDF,PNG, JPG SVG  and GIF are Allowed.</p>
                    </x-input.group>




                    <div>
                        <x-input.group :inline="'true'" for="Laporan Orang Tua" label="Sudah Laporan Orang Tua ? <span class='mt-1 text-red-500 text-sm'>*</span>" :error="$errors->first('request.laporan')">
                            <div wire:ignore>
                                <x-input.select wire:model.live.debounce.300ms="request.laporan" :placeholder="__('- Pilih Laporan Orang Tua -')">
                                    <option value="">- Pilih Jadwal Terlaksana -</option>
                                    <option value="Sudah melalui lisan langsung kepada orang tua"> Sudah melalui lisan langsung kepada orang tua</option>
                                    <option value="Sudah melalui whatsapp"> Sudah melalui whatsapp</option>
                                    <option value="Belum melaporkan"> Belum melaporkan</option>
                                </x-input.select>
                            </div>
                        </x-input.group>
                    </div>

                    <x-input.group :inline="'true'" for="kendala" label="Kendala" :error="$errors->first('request.kendala')">
                        <x-input.textarea wire:model="request.kendala" id="kendala" placeholder="Kendala" />
                    </x-input.group>
                    <x-input.group :inline="'true'" for="saran" label="Kritik & Saran" :error="$errors->first('request.saran')">
                        <x-input.textarea wire:model="request.saran" id="saran" placeholder="Kritik & Saran" />
                    </x-input.group>
                    <x-input.group :inline="'true'" for="catatan" label="Catatan Mengajar" :error="$errors->first('request.catatan')">
                        <x-input.textarea wire:model="request.catatan" id="catatan" placeholder="Catatan Mengajar" />
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
