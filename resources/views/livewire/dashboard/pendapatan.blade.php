<section>
    <div>
        <h1 class="text-2xl font-semibold text-gray-900 mb-2">Pendapatan {{$type =='tuttor' ? 'Fee Tutor' : 'Affiliate' }}</h1>
        <x-partials.dashboard.breadcumb :data="$breadcumb"> </x-partials.dashboard.breadcumb>

        <div class="py-4 space-y-4">
            <!-- Top Bar -->
            <div class="flex justify-between max-lg:flex-wrap">
                <div class="w-2/4 flex space-x-4  max-lg:w-full">
                    <div class="w-10/12">
                        <x-input.text wire:model.live.debounce.300ms="filters.search" placeholder="cari..." />
                    </div>
                </div>

                <div class="space-x-2 flex items-center max-lg:w-full" wire:ignore>
                    <x-input.select wire:model.live.debounce.300ms="perPage" id="perPage">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </x-input.select>

                    @can('hasRole',[1])
                    @if ($type =='tuttor')

                    <x-dropdown label="Bulk Actions" class="hidden">
                        <x-dropdown.item type="button" wire:click="$toggle('showDeleteModal')" class="flex items-center space-x-2">
                            <x-icon.trash class="text-cool-gray-400" /> <span>Delete</span>
                        </x-dropdown.item>
                    </x-dropdown>
                    <x-button.primary wire:click="create"><x-icon.plus /> New</x-button.primary>
                    @endif
                    @endcan
                </div>
            </div>

            <!-- users Table -->
            <div class="flex-col space-y-4">
                <x-table>
                    <x-slot name="head">
                        @can('hasRole', [1])
                        @if ($type =='tuttor')
                        <x-table.heading class="pr-0 w-8">
                            <x-input.checkbox wire:model.live="selectPage" />
                        </x-table.heading>
                        @endif
                        @endcan
                        <x-table.heading class="pr-0 w-8">No.</x-table.heading>
                        @can('hasRole', [1])
                        @if ($type =='tuttor')
                        <x-table.heading>.::.</x-table.heading>
                        @endif
                        @endcan
                        <x-table.heading>Status</x-table.heading>
                        @can('hasRole', [1])
                        <x-table.heading>Guru</x-table.heading>
                        <x-table.heading>Affiliator</x-table.heading>
                        @endcan
                        <x-table.heading> Siswa</x-table.heading>
                        @can('hasRole', [1])
                        @if ($type =='tuttor')
                        <x-table.heading>Gross Income</x-table.heading>
                        @endif
                        @endcan
                        @can('hasRole', [1,2])
                        @if ($type =='tuttor')
                        <x-table.heading>Fee Transfer (Tutor)</x-table.heading>
                        @endif
                        @endcan
                        @can('hasRole', [1])
                        @if ($type =='tuttor')
                        <x-table.heading>Fee Rifaya</x-table.heading>
                        @endif
                        @endcan
                        @if ($type == 'tuttor')
                            @can('hasRole', [1])
                            <x-table.heading>Fee Affiliator</x-table.heading>
                            @endcan
                            @else
                            <x-table.heading>Fee Affiliator</x-table.heading>
                        @endif

                        <x-table.heading>Tanggal Pembayaran</x-table.heading>
                        <x-table.heading>Lampiran</x-table.heading>

                    </x-slot>
                    <x-slot name="body">
                        @can('hasRole', [1])

                        @if ($type =='tuttor')
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
                        @endif
                        @endcan
                        @forelse ($data as $k => $values)
                        <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $values->id }}" wire:target="filters.search,perPage,gotoPage, previousPage, nextPage">
                            @can('hasRole', [1])
                            @if ($type =='tuttor')
                            <x-table.cell class="pr-0">
                                <x-input.checkbox wire:model.live="selected" value="{{ $values->id }}" />
                            </x-table.cell>
                            @endif
                            @endcan
                            <x-table.cell class="pr-0">
                                {{$k+$data->firstItem()}}
                            </x-table.cell>
                            @can('hasRole', [1])
                            @if ($type =='tuttor')
                            <x-table.cell>
                                <div class="flex">
                                    <x-button.link wire:click="edit({{ $values->id }})" class="bg-green-500 mx-1 px-2 py-1 rounded text-white" title="Edit"><span class="icon-[uil--edit]"></span></x-button.link>
                                    <x-button.link title="download cv" href="{{ $values->file ?? ''}}" target="_blank" class="bg-blue-500 mx-1 px-2 py-1 rounded text-white">
                                        <span class="icon-[prime--file-pdf]  text-xl inline-block"></span>
                                    </x-button.link>
                                </div>
                            </x-table.cell>
                            @endif
                            @endcan
                            <x-table.cell>
                                <div  >
                                    @if ($values->status == 'pending')
                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">Pending</span>
                                    @else
                                    <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300 ">Dibayarkan</span>
                                    @endif
                                </div>
                            </x-table.cell>
                            @can('hasRole', [1])
                            <x-table.cell>
                                {{$values->rekap_absensi->mapping->teacher->name}}
                            </x-table.cell>
                            <x-table.cell>
                               {{ App\Models\User::whereHas('my_affiliate', function($q) use ($values){
                                    return $q->where('user_affiliate_id','=',$values->user_affiliate_id);
                                })->first()->name ?? '-'}}
                            </x-table.cell>
                            @endcan
                            <x-table.cell>
                                <div @if ($type =='tuttor') class="w-80" @endif>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>Nama</td>
                                                <td>:</td>
                                                <td>{{$values->rekap_absensi->mapping->student->name}}</td>
                                            </tr>
                                            @can('hasRole',[1,2])
                                                @if ($type =='tuttor')
                                                <tr>
                                                    <td>Periode</td>
                                                    <td>:</td>
                                                    <td>{{$values->rekap_absensi->tanggal_awal}} Sd {{$values->rekap_absensi->tanggal_akhir}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Total Sesi</td>
                                                    <td>:</td>
                                                    <td>{{$values->rekap_absensi->total_sesi}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Tambahan Jam Ajar</td>
                                                    <td>:</td>
                                                    <td>{{$values->rekap_absensi->tambahan_jam_ajar}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Kelas</td>
                                                    <td>:</td>
                                                    <td>{{$values->rekap_absensi->mapping->kelas->title}} - {{$values->rekap_absensi->mapping->kelas->jenjang->title}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Mata Pelajaran</td>
                                                    <td>:</td>
                                                    <td>{{$values->rekap_absensi->mapping->mata_pelajaran->title}}</td>
                                                </tr>

                                                @endif
                                            @endcan
                                        </tbody>
                                    </table>
                                </div>
                            </x-table.cell>
                            @can('hasRole', [1])
                            @if ($type =='tuttor')
                            <x-table.cell>
                               <div class="w-20">
                               Rp. {{number_format(($values->nominal_fee_rifaya + $values->nominal_fee_tutor),0,',','.')}}
                               </div>
                            </x-table.cell>
                            @endif
                            @endcan

                            @can('hasRole', [1,2])
                            @if ($type =='tuttor')
                            <x-table.cell>
                            <div class="w-20">
                                Rp. {{ number_format($values->nominal_fee_tutor,0,',','.') }}
                            </div>
                            </x-table.cell>
                            @endif
                            @endcan
                            @can('hasRole', [1])
                            @if ($type =='tuttor')
                            <x-table.cell>
                            <div class="w-20">
                                Rp. {{ number_format($values->nominal_fee_rifaya,0,',','.') }}
                            </div>
                            </x-table.cell>
                            @endif
                            @endcan
                            @if ($type == 'tuttor')
                                @can('hasRole', [1])
                                <x-table.cell>
                                    {{$values->nominal_affiliate}}
                                </x-table.cell>
                                @endcan
                            @else

                                <x-table.cell>
                                    {{$values->nominal_affiliate}}
                                </x-table.cell>
                            @endif
                            <x-table.cell>
                                {{$values->tanggal_pembayaran}}
                            </x-table.cell>
                            <x-table.cell>


                            @if ($type =='tuttor')
                            Gross Income:
                            <x-style.glithbox href="{{ $values->foto_gross_income }}"   data-title="Gross Income"  class="glightbox" >
                                        <x-style.glithbox.img :url="$values->foto_gross_income"    class=" object-contain  hover:grayscale transition-all duration-700 ease-in-out mx-auto lg:col-span-4 md:col-span-6 w-full h-full" />
                            </x-style.glithbox>
                            Fee Tutor:
                            <x-style.glithbox href="{{ $values->foto }}"   data-title="fee tutor"  class="glightbox" >
                                        <x-style.glithbox.img :url="$values->foto"    class=" object-contain  hover:grayscale transition-all duration-700 ease-in-out mx-auto lg:col-span-4 md:col-span-6 w-full h-full" />
                            </x-style.glithbox>
                            @endif
                            @if ($type == 'tuttor')
                            @can('hasRole', [1])
                            Fee Affiliate :
                            <x-style.glithbox href="{{ $values->foto_affiliate }}"   data-title="fee affiliate"  class="glightbox" >
                                        <x-style.glithbox.img :url="$values->foto_affiliate"  class=" object-contain  hover:grayscale transition-all duration-700 ease-in-out mx-auto lg:col-span-4 md:col-span-6 w-full h-full" />
                            </x-style.glithbox>
                            @endcan
                            @else
                            Fee Affiliate :
                            <x-style.glithbox href="{{ $values->foto_affiliate }}"   data-title="fee affiliate"  class="glightbox" >
                                        <x-style.glithbox.img :url="$values->foto_affiliate"  class=" object-contain  hover:grayscale transition-all duration-700 ease-in-out mx-auto lg:col-span-4 md:col-span-6 w-full h-full" />
                            </x-style.glithbox>
                            @endif

                            </x-table.cell>
                        </x-table.row>
                        @empty
                        <x-table.row>
                            <x-table.cell colspan="12">
                                <div class="flex justify-center items-center space-x-2">
                                    <x-icon.inbox class="h-8 w-8 text-cool-gray-400" />
                                    <span class="font-medium py-8 text-cool-gray-400 text-xl">No Pendapatan {{$type =='tuttor' ? 'Fee Tutor' : 'Affiliate' }} found...</span>
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
                <x-slot name="title">Delete Pendapatan {{$type =='tuttor' ? 'Fee Tutor' :$type }}</x-slot>
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
                <x-slot name="title">Create/Edit Pendapatan {{$type =='tuttor' ? 'Fee Tutor' :$type }}</x-slot>
                <x-slot name="content">
                    <div>
                        <x-input.group :inline="'true'" for="Siswa" label="Rekap Absensi  <span class='mt-1 text-red-500 text-sm'>*</span>" :error="$errors->first('request.rekap_absensi_id')">
                            <div >
                                <x-input.select wire:model.live.debounce.300ms="request.rekap_absensi_id"  >
                                    <option value="">- Pilih Rekap Absensi -</option>
                                    @foreach ($rekap_absensi as $value)
                                    <option value="{{ $value->id }}"
                                    @if ($request['rekap_absensi_id'] == $value->id)
                                        selected
                                    @endif
                                    > Tutor: {{$value->mapping->teacher->name}} - Siswa:  {{$value->mapping->student->name}} </option>
                                    @endforeach
                                </x-input.select>
                            </div>
                        </x-input.group>
                    </div>
                    <div>
                        <span wire:loading.class.remove="hidden" wire:target="request.rekap_absensi_id" class="hidden">
                            Loading ...
                        </span>
                        @if (!empty($_rekap_absensi))
                        <table>
                            <tbody>
                                <tr>
                                    <td colspan="3" class="font-bold">Detail Siswa</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>{{$_rekap_absensi->mapping->student->name}}</td>
                                </tr>
                                @can('hasRole',[1,2])
                                    @if ($type =='tuttor')
                                    <tr>
                                        <td>Periode</td>
                                        <td>:</td>
                                        <td>{{$_rekap_absensi->tanggal_awal}} Sd {{$_rekap_absensi->tanggal_akhir}}</td>
                                    </tr>
                                    <tr>
                                        <td>Total Sesi</td>
                                        <td>:</td>
                                        <td>{{$_rekap_absensi->total_sesi}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tambahan Jam Ajar</td>
                                        <td>:</td>
                                        <td>{{$_rekap_absensi->tambahan_jam_ajar}}</td>
                                    </tr>
                                    <tr>
                                        <td>Kelas</td>
                                        <td>:</td>
                                        <td>{{$_rekap_absensi->mapping->kelas->title}} - {{$_rekap_absensi->mapping->kelas->jenjang->title}}</td>
                                    </tr>
                                    <tr>
                                        <td>Mata Pelajaran</td>
                                        <td>:</td>
                                        <td>{{$_rekap_absensi->mapping->mata_pelajaran->title}}</td>
                                    </tr>

                                    @endif
                                @endcan
                            </tbody>
                        </table>
                        @endif
                    </div>
                    <div>
                        <x-input.group :inline="'true'" for="Siswa" label="Affiliator
                        <span wire:loading.class.remove='hidden' wire:target='request.rekap_absensi_id' class='hidden'>
                            update affiliator ...
                        </span>
                        " :error="$errors->first('request.user_affiliate_id')">
                            <div>
                                <x-input.select wire:model.live.debounce.300ms="request.user_affiliate_id" >
                                    <option value="">- Pilih Affiliator -</option>
                                    @foreach ($_affiliator as $value)
                                    <option value="{{ $value->my_affiliate->user_affiliate_id}}"
                                    @if ($request['user_affiliate_id'] == $value->my_affiliate->user_affiliate_id)
                                        selected
                                    @endif
                                    > {{ $value->name }} - {{ $value->my_affiliate->user_affiliate_id}} </option>
                                    @endforeach
                                </x-input.select>
                            </div>
                        </x-input.group>
                    </div>
                    <x-input.group :inline="'true'" for="tanggal_pembayaran" label="Tanggal Pembayaran <span class='mt-1 text-red-500 text-sm'>*</span>" :error="$errors->first('request.tanggal_pembayaran')">
                        <x-input.text type="date" wire:model="request.tanggal_pembayaran" id="tanggal_pembayaran" placeholder="Fee Transfer " />
                    </x-input.group>
                    <div>
                        <x-input.group :inline="'true'" for="Status" label="Status <span class='mt-1 text-red-500 text-sm'>*</span>" :error="$errors->first('request.status')">
                            <div wire:ignore>
                                <x-input.select wire:model.live.debounce.300ms="request.status" :placeholder="__('- Pilih Status -')">
                                    <option value="">- Pilih Status -</option>
                                    <option value="pending"> Pending</option>
                                    <option value="dibayarkan"> Dibayarkan</option>
                                </x-input.select>
                            </div>
                        </x-input.group>
                    </div>
                    <x-input.group :inline="'true'" for="nominal_fee_rifaya" label="Nominal Fee Rifaya <span class='mt-1 text-red-500 text-sm'>*</span>" :error="$errors->first('request.nominal_fee_rifaya')">
                        <x-input.text type="text" wire:model="request.nominal_fee_rifaya" id="nominal_fee_rifaya" placeholder="Nominal Fee Rifaya " />
                    </x-input.group>
                    <x-input.group :inline="'true'" for="nominal_fee_tutor" label="Nominal Fee Tutor <span class='mt-1 text-red-500 text-sm'>*</span>" :error="$errors->first('request.nominal_fee_tutor')">
                        <x-input.text type="text" wire:model="request.nominal_fee_tutor" id="nominal_fee_tutor" placeholder="Nominal Fee Tutor " />
                    </x-input.group>
                    <x-input.group :inline="'true'" for="nominal_affiliate" label="Nominal Fee Affiliate  " :error="$errors->first('request.nominal_affiliate')">
                        <x-input.text type="text" wire:model="request.nominal_affiliate" id="nominal_affiliate" placeholder="Nominal Fee Affiliate " />
                    </x-input.group>

                    <x-input.group for="Title" :inline="'true'" label="Gross Income" :error="$errors->first('request.foto_gross_income')"  >
                        <div
                            x-data="{ uploading: false, progress: 0 ,
                                    resetFileInput() {
                                        document.getElementById('file').value = ''; // Reset file input
                                        $wire.set('request.foto_gross_income', 'remove'); // Clear Livewire model
                                    }
                            }"
                            x-on:livewire-upload-start="uploading = true"
                            x-on:livewire-upload-finish="uploading = false; progress = 0;"
                            x-on:livewire-upload-progress="progress = $event.detail.progress" >
                            @if ( $request['foto_gross_income'] )
                                <div class="relative">
                                <button type="button" class="absolute top-0  @if (is_null($request['foto_gross_income']) || $request['foto_gross_income'] == 'remove') hidden @endif left-2 rounded bg-red-500 p-3 mt-1 text-white" @click="resetFileInput()">X</button>
                                @if (method_exists($request['foto_gross_income'], 'temporaryUrl'))
                                    @if (method_exists($request['foto_gross_income'], 'getMimeType') && str_starts_with($request['foto_gross_income']->getMimeType(), 'image/'))
                                        <img class="object-cover mb-3 w-96" src="{{ $request['foto_gross_income']->temporaryUrl() }}" alt="Image preview">
                                    @else
                                       <p class="text-red-500">Invalid file type. Only image files are allowed.</p>
                                    @endif
                                @else
                                    <img class="object-cover mb-3 w-96 @if ($request['foto_gross_income'] =='remove') hidden  @endif" src="{{ $request['foto_gross_income'] }}" alt="Image preview">
                                @endif
                                </div>
                            @endif
                            <input type="file" name="file" id="file" wire:model="request.foto_gross_income" accept="image/*">
                            <p class="text-xs text-gray-400 mt-2">PNG, JPG SVG  and GIF are Allowed.</p>
                            <div x-show="uploading">
                                <div class="w-full h-4 bg-slate-100 rounded-lg shadow-inner mt-3">
                                    <div class="bg-green-500 h-4 rounded-lg" :style="{ width: `${progress}%` }"></div>
                                </div>
                            </div>
                        </div>
                    </x-input.group>
                    <x-input.group for="Title" :inline="'true'" label="Fee Tutor" :error="$errors->first('request.foto')"  >
                        <div
                            x-data="{ uploading: false, progress: 0 ,
                                    resetFileInput() {
                                        document.getElementById('file').value = ''; // Reset file input
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
                                        <img class="object-cover mb-3 w-96" src="{{ $request['foto']->temporaryUrl() }}" alt="Image preview">
                                    @else
                                       <p class="text-red-500">Invalid file type. Only image files are allowed.</p>
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
                    <x-input.group for="Title" :inline="'true'" label="Fee Affiliate" :error="$errors->first('request.foto_affiliate')"  >
                        <div
                            x-data="{ uploading: false, progress: 0 ,
                                    resetFileInput() {
                                        document.getElementById('file').value = ''; // Reset file input
                                        $wire.set('request.foto_affiliate', 'remove'); // Clear Livewire model
                                    }
                            }"
                            x-on:livewire-upload-start="uploading = true"
                            x-on:livewire-upload-finish="uploading = false; progress = 0;"
                            x-on:livewire-upload-progress="progress = $event.detail.progress" >
                            @if ( $request['foto_affiliate'] )
                                <div class="relative">
                                <button type="button" class="absolute top-0  @if (is_null($request['foto_affiliate']) || $request['foto_affiliate'] == 'remove') hidden @endif left-2 rounded bg-red-500 p-3 mt-1 text-white" @click="resetFileInput()">X</button>
                                @if (method_exists($request['foto_affiliate'], 'temporaryUrl'))
                                    @if (method_exists($request['foto_affiliate'], 'getMimeType') && str_starts_with($request['foto_affiliate']->getMimeType(), 'image/'))
                                        <img class="object-cover mb-3 w-96" src="{{ $request['foto_affiliate']->temporaryUrl() }}" alt="Image preview">
                                    @else
                                       <p class="text-red-500">Invalid file type. Only image files are allowed.</p>
                                    @endif
                                @else
                                    <img class="object-cover mb-3 w-96 @if ($request['foto_affiliate'] =='remove') hidden  @endif" src="{{ $request['foto_affiliate'] }}" alt="Image preview">
                                @endif
                                </div>
                            @endif
                            <input type="file" name="file" id="file" wire:model="request.foto_affiliate" accept="image/*">
                            <p class="text-xs text-gray-400 mt-2">PNG, JPG SVG  and GIF are Allowed.</p>
                            <div x-show="uploading">
                                <div class="w-full h-4 bg-slate-100 rounded-lg shadow-inner mt-3">
                                    <div class="bg-green-500 h-4 rounded-lg" :style="{ width: `${progress}%` }"></div>
                                </div>
                            </div>
                        </div>
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
