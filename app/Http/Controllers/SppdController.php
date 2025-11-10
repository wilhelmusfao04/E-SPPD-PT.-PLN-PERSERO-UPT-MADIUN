<?php

namespace App\Http\Controllers;

use App\Models\Sppd;
use Illuminate\Http\Request;


class SppdController extends Controller
{
    // -------------------------- //
    // Tampilkan semua data SPPD //
    public function index()
    {
        $sppds = Sppd::all();
        return view('sppd.index', ['sppds' => $sppds]);
    }
    // --------------------------- //
    // Tampilkan form tambah data //
    public function create()
    {
        return view('sppd.create');
    }
    //------------------//
    // Simpan data baru //
    public function store(Request $request)
    {
        $request->validate([
            'nama_pegawai' => 'required',
            'no_trip'      => 'required',
            'lokasi_dinas' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'status' => 'required|in:Diajukan,Disetujui,Menunggu,Selesai',
        ]);

        Sppd::create($request->all());

        return redirect()->route('sppd.index')->with('success', 'Data SPPD berhasil ditambahkan.');
    }
    //---------------------//
    // Tampilkan form edit //
    public function edit($id)
    {
        $sppd = Sppd::findOrFail($id);
        return view('sppd.edit', compact('sppd'));
    }
    //-----------------------//
    // Simpan perubahan data //
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pegawai' => 'required',
            'no_trip'      => 'required',
            'lokasi_dinas' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'status' => 'required|in:Diajukan,Disetujui,Menunggu,Selesai',
        ]);

        $sppd = Sppd::findOrFail($id);
        $sppd->update($request->all());

        return redirect()->route('sppd.index')->with('success', 'Data SPPD berhasil diperbarui.');
    }
    //------------//
    // Hapus data //
    public function destroy($id)
    {
        $sppd = Sppd::findOrFail($id);
        $sppd->delete();

        return redirect()->route('sppd.index')->with('success', 'Data SPPD berhasil dihapus.');
    }


    
}