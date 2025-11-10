{{-- resources/views/sppd/index.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar SPPD</title>
</head>
<body>
    <h1>Daftar SPPD</h1>

    <!-- Tombol untuk menambah data SPPD -->
    <a href="{{ route('sppd.create') }}">Tambah Data SPPD</a>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Nama Pegawai</th>
                <th>No.Trip</th>
                <th>Lokasi Dinas</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sppds as $sppd)
                <tr>
                    <td>{{ $sppd->nama_pegawai }}</td>
                    <td>{{ $sppd->no_trip }}</td>
                    <td>{{ $sppd->lokasi_dinas }}</td>
                    <td>{{ $sppd->tanggal_mulai }}</td>
                    <td>{{ $sppd->tanggal_selesai }}</td>
                    <td>{{ $sppd->status }}</td>
                    <td>
                        <a href="{{ route('sppd.edit', $sppd->id) }}">Edit</a>

                        <form action="{{ route('sppd.destroy', $sppd->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            @if ($sppds->isEmpty())
                <tr>
                    <td colspan="7" align="center">Belum ada data SPPD.</td>
                </tr>
            @endif
        </tbody>
    </table>
</body>
</html>
