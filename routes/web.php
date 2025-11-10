<?php

use App\Http\Controllers\SesiController;
use App\Models\Sppd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SppdController;
use App\Http\Controllers\Api\ApiSesiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greeting', function () {
    return 'PT. PLN (Persero) UPT MADIUN';
});

//SppdController Take A Control
Route::resource('sppd', SppdController::class);

// 1. Route untuk menampilkan index view dengan data SPPD
Route::get('/sppd', function () {
    $sppds = Sppd::all();
    return view('sppd.index', ['sppds' => $sppds]);
})->name('sppd.index');

// 2. Route untuk menampilkan form tambah data SPPD
Route::get('/sppd/create', function () {
    return view('sppd.create');
})->name('sppd.create');

// 3. Route untuk menyimpan data SPPD yang baru ditambahkan
Route::post('/sppd', function (Request $request) {
    $validatedData = $request->validate([
        'nama_pegawai'     => 'required|string|max:255',
        'no_trip'          => 'required|string|max:100',
        'lokasi_dinas'     => 'required|string|max:255',
        'tanggal_mulai'    => 'required|date',
        'tanggal_selesai'  => 'required|date|after_or_equal:tanggal_mulai',
        'status'           => 'required|in:Diajukan,Disetujui,Menunggu,Selesai',
    ]);

    Sppd::create($validatedData);

    return redirect()->route('sppd.index');
})->name('sppd.store');

// 4. Route untuk menampilkan form edit SPPD
Route::get('/sppd/{id}/edit', function ($id) {
    $sppd = Sppd::findOrFail($id);
    return view('sppd.edit', ['sppd' => $sppd]);
})->name('sppd.edit');

// 5. Route untuk menyimpan data SPPD yang telah diubah
Route::put('/sppd/{id}', function (Request $request, $id) {
    $validatedData = $request->validate([
        'nama_pegawai'     => 'required|string|max:255',
        'no_trip'          => 'required|string|max:100',
        'lokasi_dinas'     => 'required|string|max:255',
        'tanggal_mulai'    => 'required|date',
        'tanggal_selesai'  => 'required|date|after_or_equal:tanggal_mulai',
        'status'           => 'required|in:Diajukan,Disetujui,Menunggu,Selesai',
    ]);

    $sppd = Sppd::findOrFail($id);
    $sppd->update($validatedData);

    return redirect()->route('sppd.index');
})->name('sppd.update');

// 6. Route untuk menghapus data SPPD
Route::delete('/sppd/{id}', function ($id) {
    $sppd = Sppd::findOrFail($id);
    $sppd->delete();

    return redirect()->route('sppd.index');
})->name('sppd.destroy');

Route::get('/login', [SesiController::class,'index']);
Route::post('/login', [SesiController::class,'login']);

Route::post('/api/login', [ApiSesiController::class, 'login']);