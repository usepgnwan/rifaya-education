<!DOCTYPE html>
<html>
<head>
    <title>Invoice Wali Murid</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .header { text-align: center; margin-bottom: 30px; }
        .summary { width: 60%; float: right; }
        .summary th { text-align: left; }
        .summary td { text-align: right; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Invoice Tagihan Bimbingan Belajar</h2>
    </div>

    <p><strong>Nama Siswa:</strong> {{ $rekap->mapping->student->name ?? '-' }}</p>
    <p><strong>Nama Tutor:</strong> {{ $rekap->mapping->teacher->name ?? '-' }}</p>
    <p><strong>Periode:</strong> {{ $rekap->tanggal_awal }} s/d {{ $rekap->tanggal_akhir }}</p>

    <h3>Daftar Aktivitas & Perhitungan Durasi</h3>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Materi</th>
                <th>Durasi Asli</th>
                <th>Dihitung (Sesi + Kelebihan)</th>
                <th>Kelebihan Menit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($calc['activities'] as $act)
            <tr>
                <td>{{ $act['tanggal'] }}</td>
                <td>{{ $act['materi'] }}</td>
                <td>{{ floor($act['durasi_asli']/60) }}j {{ $act['durasi_asli']%60 }}m</td>
                <td>{{ floor($act['durasi_hitung']/60) }}j {{ $act['durasi_hitung']%60 }}m</td>
                <td>{{ $act['kelebihan_menit'] > 0 ? floor($act['kelebihan_menit']/60).'j '.($act['kelebihan_menit']%60).'m' : '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table class="summary">
        <tr>
            <th>Total Sesi ({{ $calc['totalSesi'] }})</th>
            <td>Rp {{ number_format($totalBayarSesi, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Total Kelebihan ({{ floor($calc['totalKelebihanMenit']/60) }}j {{ $calc['totalKelebihanMenit']%60 }}m)</th>
            <td>Rp {{ number_format($totalBayarKelebihan, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Total Keseluruhan</th>
            <td><strong>Rp {{ number_format($totalFee, 0, ',', '.') }}</strong></td>
        </tr>
    </table>
</body>
</html>
