<!DOCTYPE html>
<html>
<head>
    <title>Invoice Tutor</title>
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
        <h2>Invoice Pembayaran Tutor</h2>
    </div>

    <p><strong>Nama Tutor:</strong> {{ $rekap->mapping->teacher->name ?? '-' }}</p>
    <p><strong>Nama Siswa:</strong> {{ $rekap->mapping->student->name ?? '-' }}</p>
    <p><strong>Periode:</strong> {{ $rekap->tanggal_awal }} s/d {{ $rekap->tanggal_akhir }}</p>

    <h3>Daftar Aktivitas & Durasi</h3>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Materi</th>
                <th>Durasi Asli</th>
            </tr>
        </thead>
        <tbody>
            @foreach($calc['activities'] as $act)
            <tr>
                <td>{{ $act['tanggal'] }}</td>
                <td>{{ $act['materi'] }}</td>
                <td>{{ floor($act['durasi_asli']/60) }}j {{ $act['durasi_asli']%60 }}m</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table class="summary">
        <tr>
            <th>Total Bayaran (Pendapatan Tutor)</th>
            <td><strong>Rp {{ number_format($pendapatanTutor, 0, ',', '.') }}</strong></td>
        </tr>
    </table>
</body>
</html>
