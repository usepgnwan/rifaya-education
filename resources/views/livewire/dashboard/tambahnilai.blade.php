<div class="w-full border-t border-gray-100 dark:border-t-gray-800  shadow overflow-hidden sm:rounded-lg p-5 dark:bg-gray-800 ">
    <div class="w-ful mb-3 flex justify-between">
        <h3 class="text-lg font-bold ">Tambah Nilai - {{ $dataMAP->kelas->title }} {{ $dataMAP->title }} ( {{ $dataMAP->kelas->jenjang->title }}) / {{ $dataMAP->sekolah->nama_sekolah }} </h3>
        <div>
            

            <x-button.primary wire:click="addSiswa"><x-icon.plus /> Tambah Siswa </x-button.primary>
            <x-button.primary wire:click="addLabelNilai"><x-icon.plus /> Tambah Penilaian </x-button.primary>
        </div>
    </div>
    <hr class="py-3">


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Siswa
                    </th>
                    @foreach ($listlabelnilai as $v )
                    <th scope="col" class="px-6 py-3">
                        {{ $v->title }}  ({{ $v->mapel->title }})
                    </th>
                    @endforeach
                    
                    
                </tr>
            </thead>
            <tbody>
                @forelse ($listsiswa as $value)
                 
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                             {{ $value['nama_siswa'] }}
                        </td> 
                        @foreach ($listlabelnilai as $v )
                            <td scope="col" class="px-6 py-6 font-medium text-gray-900 whitespace-nowrap dark:text-white" >
                                <div class="min-w-60 space-y-2"> 
                                    
                                    <x-input.text type="number"  wire:model.live.debounce.0ms="listNilai.{{ $value['siswa_id'] }}.{{ $v['id'] }}.nilai" id="namanilai" placeholder="Nilai"  wire:change="changeNilai({{ $listNilai[$value['siswa_id']][$v['id']]['id'] }},'nilai',{{ $value['siswa_id'] }},{{ $v['id'] }},'{{ $dataMAP->kelas->title }}')" />
                                     
                                    <select wire:model.live.debounce.0ms="listNilai.{{ $value['siswa_id'] }}.{{ $v['id'] }}.type" wire:change="changeNilai({{ $listNilai[$value['siswa_id']][$v['id']]['id'] }},'type',{{ $value['siswa_id'] }},{{ $v['id'] }},'{{ $dataMAP->kelas->title }}')"  class="w-full rounded-sm">
                                        <option value="">- Pilih Status -</option> 
                                        <option value="1">SELAMAT, NILAI ASAT KAMU AMAN!</option> 
                                        <option value="2">NILAI ASAT KAMU PERLU DITINGKATKAN!</option> 
                                    </select>
                                
                                    <x-input.textarea wire:model.live.debounce.0ms="listNilai.{{ $value['siswa_id'] }}.{{ $v['id'] }}.catatan" :id="__('catatan')" placeholder="Catatan" wire:change="changeNilai({{ $listNilai[$value['siswa_id']][$v['id']]['id'] }},'catatan',{{ $value['siswa_id'] }},{{ $v['id'] }},'{{ $dataMAP->kelas->title }}')"  /> 
                                        
                                </div>
                            </td>
                        @endforeach
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
    </div>

    <form wire:submit.prevent="save">
            <x-modal.dialog wire:model.defer="showEditModal">
                <x-slot name="title">Tambah Siswa</x-slot> 
                <x-slot name="content"> 
                    <div>
                        <x-input.group :inline="'true'" for="sekolah" label="Nama Siswa" :error="$errors->first('request.siswa_id')">
                            <div wire:ignore>
                                <x-input.select wire:model.live.debounce.300ms="request.siswa_id" :placeholder="__('- Pilih Siswa -')">
                                    <option value="">- Pilih Siswa -</option>
                                    @foreach ($siswa as $value)
                                    <option value="{{ $value->id }}">{{ $value->nama_siswa }}</option>
                                    @endforeach
                                </x-input.select>
                            </div>
                        </x-input.group> 
                    </div>

                </x-slot>

                <x-slot name="footer">
                    <x-button.secondary wire:click="$set('showEditModal', false)">Cancel</x-button.secondary>

                    <x-button.primary type="submit">Save</x-button.primary>
                </x-slot>
            </x-modal.dialog>
    </form>

    <form wire:submit.prevent="saveLabel">
            <x-modal.dialog wire:model.defer="showtModalNilai">
                <x-slot name="title">Tambah Penilaian</x-slot> 
                <x-slot name="content"> 
                    <div>
                        <x-input.group :inline="'true'" for="title" label="Nama Nilai" :error="$errors->first('label.title')">
                            <x-input.text type="namanilai" wire:model="label.title" id="namanilai" placeholder="Nama Nilai" />
                        </x-input.group>


                        <x-input.group :inline="'true'" for="sekolah" label="Mapel" :error="$errors->first('label.matapelajaran_id')">
                            <div wire:ignore>
                                <x-input.select wire:model.live.debounce.300ms="label.mata_pelajaran_id" :placeholder="__('- Pilih Mapel -')">
                                    <option value="">- Pilih Mapel -</option>
                                    @foreach ($mapel as $value)
                                    <option value="{{ $value->id }}">{{ $value->title }}</option>
                                    @endforeach
                                </x-input.select>
                            </div>
                        </x-input.group> 
                    </div>

                </x-slot>

                <x-slot name="footer">
                    <x-button.secondary wire:click="$set('showtModalNilai', false)">Cancel</x-button.secondary>

                    <x-button.primary type="submit">Save</x-button.primary>
                </x-slot>
            </x-modal.dialog>
    </form>
</div>