<section class="w-full relative" id="akumulasi-fee">
    <div class="sm:p-4 p-2 bg-gray-50 flex items-center justify-between shadow-sm">
        <h2 class="text-xl font-bold text-gray-800">Akumulasi Fee Tutor</h2>
    </div>

    <div class="p-4">
        <div class="bg-white rounded shadow-sm border p-4">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-4 gap-4">
                <h3 class="font-medium text-lg text-gray-700">Daftar Rekap Absensi</h3>
                <div class="w-full md:w-72">
                    <input type="text" wire:model.live.debounce.300ms="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" placeholder="Cari nama Siswa atau Guru...">
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tutor</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Siswa</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total Sesi</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total Jam</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total (Ortu)</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fee Apps</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fee Tutor</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status Fee</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($rekaps as $rekap)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $rekap->mapping->teacher->name ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $rekap->mapping->student->name ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $rekap->tanggal_awal }} s/d {{ $rekap->tanggal_akhir }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $rekap->total_sesi_computed }} Sesi</td>
                            <td class="px-6 py-4 whitespace-nowrap font-semibold">{{ $rekap->total_jam_formatted }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-800 font-medium">
                                @if($rekap->pendapatan)
                                    Rp {{ number_format(($rekap->pendapatan->nominal_fee_tutor ?? 0) + ($rekap->pendapatan->nominal_fee_rifaya ?? 0), 0, ',', '.') }}
                                @else
                                    <span class="text-gray-400 font-normal">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-green-700 font-bold">
                                @if($rekap->pendapatan)
                                    Rp {{ number_format($rekap->pendapatan->nominal_fee_rifaya ?? 0, 0, ',', '.') }}
                                @else
                                    <span class="text-gray-400 font-normal">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-blue-700 font-bold">
                                @if($rekap->pendapatan)
                                    Rp {{ number_format($rekap->pendapatan->nominal_fee_tutor ?? 0, 0, ',', '.') }}
                                @else
                                    <span class="text-gray-400 font-normal">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($rekap->pendapatan && $rekap->pendapatan->status == 'dibayarkan')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Dibayarkan</span>
                                @elseif($rekap->pendapatan && $rekap->pendapatan->status == 'pending')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Pending</span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Belum Hitung</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <button type="button" wire:click="openCalculateModal({{ $rekap->id }})" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm transition-colors shadow-sm">
                                    Hitung Fee
                                </button>
                                @if($rekap->pendapatan)
                                <div class="mt-2 flex flex-col gap-1">
                                    <a href="{{ route('account.invoice.ortu', $rekap->id) }}" target="_blank" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-xs transition-colors shadow-sm text-center">
                                        Invoice Ortu
                                    </a>
                                    <a href="{{ route('account.invoice.guru', $rekap->id) }}" target="_blank" class="bg-purple-600 hover:bg-purple-700 text-white px-3 py-1 rounded text-xs transition-colors shadow-sm text-center">
                                        Invoice Guru
                                    </a>
                                </div>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-gray-400">Belum ada data rekap absensi.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Calculate Fee -->
    <x-modal.dialog wire:model="showCalculateModal" maxWidth="5xl">
        <x-slot name="title">Kalkulasi Fee Tutor</x-slot>
        <x-slot name="content">
            @if($rekapDetail)
            <div class="flex flex-col gap-6">
                <!-- Informasi Kelas -->
                <div>
                    <h4 class="font-bold text-gray-700 border-b pb-2 mb-4">Informasi Kelas & Aturan</h4>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                        <div>
                            <p class="text-gray-500 font-semibold text-xs">Nama Guru</p>
                            <p class="text-gray-800">{{ $rekapDetail->mapping->teacher->name ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-gray-500 font-semibold text-xs">Nama Siswa</p>
                            <p class="text-gray-800">{{ $rekapDetail->mapping->student->name ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-gray-500 font-semibold text-xs">Tanggal Pelaksanaan</p>
                            <p class="text-gray-800">{{ $rekapDetail->tanggal_awal }} s/d {{ $rekapDetail->tanggal_akhir }}</p>
                        </div>
                        <div>
                            <p class="text-gray-500 font-semibold text-xs">Total Sesi</p>
                            <p class="text-gray-800">{{ $rekapDetail->total_sesi }} Sesi</p>
                        </div>
                    </div>
                </div>

                <!-- Detail Aktivitas -->
                <div>
                    <h4 class="font-bold text-gray-700 border-b pb-2 mb-4">Detail Aktivitas & Kelebihan Jam</h4>
                    <div class="overflow-x-auto rounded border">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-3 py-2 text-left text-xs font-bold text-gray-600">Tanggal</th>
                                    <th class="px-3 py-2 text-left text-xs font-bold text-gray-600">Aktivitas</th>
                                    <th class="px-3 py-2 text-center text-xs font-bold text-gray-600">Asli</th>
                                    <th class="px-3 py-2 text-center text-xs font-bold text-blue-700 bg-blue-50">Dihitung (Base+Kelebihan)</th>
                                    <th class="px-3 py-2 text-center text-xs font-bold text-red-700 bg-red-50">Kelebihan Jam</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($calculatedActivities as $act)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-3 py-2 whitespace-nowrap">{{ $act['tanggal'] }}</td>
                                    <td class="px-3 py-2">{{ $act['materi'] }}</td>
                                    <td class="px-3 py-2 text-center whitespace-nowrap text-gray-500">
                                        {{ floor($act['durasi_asli'] / 60) }}j {{ $act['durasi_asli'] % 60 }}m
                                    </td>
                                    <td class="px-3 py-2 text-center whitespace-nowrap font-bold text-blue-700 bg-blue-50/30">
                                        {{ floor($act['durasi_hitung'] / 60) }}j {{ $act['durasi_hitung'] % 60 }}m
                                    </td>
                                    <td class="px-3 py-2 text-center whitespace-nowrap font-bold text-red-600 bg-red-50/30">
                                        @if($act['kelebihan_menit'] > 0)
                                            +{{ floor($act['kelebihan_menit'] / 60) }}j {{ $act['kelebihan_menit'] % 60 }}m
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-8 text-center text-gray-400 italic">Belum ada data aktivitas di rekap ini.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <hr class="border-gray-200">

                <!-- Standar Durasi & Toleransi -->
                <div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-600 mb-2">Standar Durasi 1 Sesi (Menit)</label>
                            <x-input.text type="number" wire:model.live.debounce.500ms="standarSesiMenit" placeholder="Misal: 90" />
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-600 mb-2">Toleransi Waktu (Menit)</label>
                            <x-input.text type="number" wire:model.live.debounce.500ms="toleransiMenit" placeholder="Misal: 15" />
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 mt-2">Ubah nilai di atas untuk menyesuaikan perhitungan otomatis pada tabel di atas.</p>
                </div>

                <hr class="border-gray-200">

                <!-- Input Kalkulasi Fee -->
                <div>
                    <h4 class="font-bold text-gray-700 border-b pb-2 mb-4">Input Kalkulasi Total Keseluruhan</h4>
                    <div class="mb-4 w-full md:w-1/2">
                        <label class="block text-sm font-semibold text-gray-600 mb-2">Fee Per Sesi (Rp)</label>
                        <x-input.text type="number" wire:model.live.debounce.300ms="feePerSesi" placeholder="Misal: 100000" />
                        @error('feePerSesi') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="bg-blue-50 p-4 rounded border border-blue-100">
                        <div class="flex flex-col md:flex-row md:justify-between md:items-end gap-4">
                            <div class="space-y-3 flex-1">
                                <div class="flex justify-between items-center text-sm border-b border-blue-100 pb-2">
                                    <span class="text-gray-600">Total Sesi ({{ $totalSesi }})</span>
                                    <span class="font-bold text-gray-800 text-lg">Rp {{ number_format($totalBayarSesi, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between items-center text-sm border-b border-blue-100 pb-2">
                                    <span class="text-gray-600">Total Kelebihan ({{ floor($totalKelebihanMenit/60) }}j {{ $totalKelebihanMenit%60 }}m)</span>
                                    <span class="font-bold text-gray-800 text-lg">Rp {{ number_format($totalBayarKelebihan, 0, ',', '.') }}</span>
                                </div>
                            </div>
                            <div class="md:text-right pt-2 md:pt-0 pl-0 md:pl-6 border-t md:border-t-0 md:border-l border-blue-200">
                                <p class="text-xs font-semibold text-gray-600 uppercase">Total Keseluruhan</p>
                                <p class="text-3xl font-black text-green-600">Rp {{ number_format($totalFee, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="border-gray-200">

                <div class="mt-6">
                    <h4 class="font-bold text-gray-700 border-b pb-2 mb-4">Kalkulasi Pendapatan Apps (Rifaya)</h4>
                    <div class="mb-4 w-full md:w-1/2">
                        <label class="block text-sm font-semibold text-gray-600 mb-2">Fee Rifaya Per Sesi (Rp)</label>
                        <x-input.text type="number" wire:model.live.debounce.300ms="feeRifayaPerSesi" placeholder="Misal: 25000" />
                        @error('feeRifayaPerSesi') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="bg-green-50 p-4 rounded border border-green-200">
                        <div class="flex flex-col md:flex-row md:justify-between md:items-end gap-4">
                            <div class="space-y-3 flex-1">
                                <div class="flex justify-between items-center text-sm border-b border-green-200 pb-2">
                                    <span class="text-gray-600">Total Sesi ({{ $totalSesi }})</span>
                                    <span class="font-bold text-gray-800 text-lg">Rp {{ number_format($totalRifayaSesi, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between items-center text-sm border-b border-green-200 pb-2">
                                    <span class="text-gray-600">Total Kelebihan ({{ floor($totalKelebihanMenit/60) }}j {{ $totalKelebihanMenit%60 }}m)</span>
                                    <span class="font-bold text-gray-800 text-lg">Rp {{ number_format($totalRifayaKelebihan, 0, ',', '.') }}</span>
                                </div>
                            </div>
                            <div class="md:text-right pt-2 md:pt-0 pl-0 md:pl-6 border-t md:border-t-0 md:border-l border-green-300">
                                <p class="text-xs font-semibold text-gray-600 uppercase">Total Pendapatan Apps</p>
                                <p class="text-3xl font-black text-green-700">Rp {{ number_format($pendapatanApps, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-xl text-center shadow-sm">
                    <p class="text-sm font-semibold text-gray-600 uppercase">Total Pendapatan Tutor</p>
                    <p class="text-xs text-gray-500 mb-1">Total Keseluruhan (Rp {{ number_format($totalFee, 0, ',', '.') }}) - Total Apps (Rp {{ number_format($pendapatanApps, 0, ',', '.') }})</p>
                    <p class="text-4xl font-black text-blue-700">Rp {{ number_format($pendapatanTutor, 0, ',', '.') }}</p>
                </div>

                <div class="mt-6">
                    <h4 class="font-bold text-gray-700 border-b pb-2 mb-4">Finalisasi & Pembayaran</h4>
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-600 mb-2">Status Pembayaran</label>
                        <select wire:model.live="statusPembayaran" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="pending">Simpan sebagai Pending</option>
                            <option value="dibayarkan_tutor">Dibayarkan ke Tutor</option>
                        </select>
                    </div>

                    @if($statusPembayaran == 'dibayarkan_tutor')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Upload Bukti TF ke Tutor <span class="text-red-500">*</span></label>
                            <input type="file" wire:model="fotoBuktiTf" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                            <div wire:loading wire:target="fotoBuktiTf" class="text-xs text-blue-500 mt-1">Uploading...</div>
                            @error('fotoBuktiTf') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Upload Bukti TF dari Ortu <span class="text-red-500">*</span></label>
                            <input type="file" wire:model="fotoPembayaranOrtu" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                            <div wire:loading wire:target="fotoPembayaranOrtu" class="text-xs text-blue-500 mt-1">Uploading...</div>
                            @error('fotoPembayaranOrtu') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    @endif

                    <div class="mt-6 flex justify-end gap-3 pt-4 border-t">
                        <button type="button" wire:click="saveFee" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded transition-colors shadow-sm inline-flex items-center gap-2">
                            <span class="icon-[uil--save]"></span> Simpan Data
                        </button>
                    </div>
                </div>
            </div>
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-button.secondary wire:click="$set('showCalculateModal', false)">Batal</x-button.secondary>
        </x-slot>
    </x-modal.dialog>
</section>
