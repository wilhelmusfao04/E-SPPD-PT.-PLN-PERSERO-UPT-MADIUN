{{-- resources/views/sppd/create.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data SPPD</title>
</head>
<body>
    <h1>Form Tambah SPPD</h1>

    {{-- Menampilkan pesan error jika ada --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sppd.store') }}" method="POST">
        @csrf

        <div>
            <label for="nama_pegawai">Nama Pegawai:</label>
            <input type="text" id="nama_pegawai" name="nama_pegawai" value="{{ old('nama_pegawai') }}">
        </div>

        <div>
            <label for="no_trip">No. Trip:</label>
            <input type="text" id="no_trip" name="no_trip" value="{{ old('no_trip') }}">
        </div>

        <div>
            <label for="lokasi_dinas">Lokasi Dinas:</label>
            <input type="text" id="lokasi_dinas" name="lokasi_dinas" value="{{ old('lokasi_dinas') }}">
        </div>

        <div>
            <label for="tanggal_mulai">Tanggal Mulai:</label>
            <input type="date" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}">
        </div>

        <div>
            <label for="tanggal_selesai">Tanggal Selesai:</label>
            <input type="date" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}">
        </div>

        <div>
            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="Diajukan" {{ old('status') == 'Diajukan' ? 'selected' : '' }}>Diajukan</option>
                <option value="Disetujui" {{ old('status') == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                <option value="Menunggu" {{ old('status') == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <div>
            <button type="submit">Simpan</button>
        </div>
    </form>
</body>
</html>
