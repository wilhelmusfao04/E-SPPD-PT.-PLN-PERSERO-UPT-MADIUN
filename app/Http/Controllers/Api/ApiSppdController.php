<?php

namespace App\Http\Controllers\Api;

use App\Models\Sppd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SppdResource;
use App\Http\Resources\SppdCollection;
use Illuminate\Support\Facades\DB;

class ApiSppdController extends Controller
{
    /**
     * GET /api/sppds
     * Menampilkan semua data SPPD (paginated)
     */
    public function index()
    {
        $sppds = Sppd::paginate(30);
        return new SppdCollection($sppds);
    }

    /**
     * GET /api/sppds/{id}
     * Menampilkan detail satu data SPPD
     */
    public function show($id)
    {
        $sppd = Sppd::findOrFail($id);
        return new SppdResource($sppd);
    }

    /**
     * POST /api/sppds
     * Menyimpan data SPPD baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pegawai'     => 'required|string|max:255',
            'no_trip'          => 'required|string|max:255',
            'lokasi_dinas'     => 'required|string|max:255',
            'tanggal_mulai'    => 'required|date',
            'tanggal_selesai'  => 'required|date|after_or_equal:tanggal_mulai',
            'status'           => 'required|in:Diajukan,Disetujui,Menunggu,Selesai',
        ]);

        $sppd = Sppd::create($validated);

        return response()->json([
            'message' => 'Data SPPD berhasil ditambahkan.',
            'data'    => new SppdResource($sppd),
        ], 201);
    }

    /**
     * PUT /api/sppds/{id}
     * Memperbarui data SPPD
     */
    public function update(Request $request, $id)
    {
        $sppd = Sppd::findOrFail($id);

        $validated = $request->validate([
            'nama_pegawai'     => 'required|string|max:255',
            'no_trip'          => 'required|string|max:255',
            'lokasi_dinas'     => 'required|string|max:255',
            'tanggal_mulai'    => 'required|date',
            'tanggal_selesai'  => 'required|date|after_or_equal:tanggal_mulai',
            'status'           => 'required|in:Diajukan,Disetujui,Menunggu,Selesai',
        ]);

        $sppd->update($validated);

        return response()->json([
            'message' => 'Data SPPD berhasil diperbarui.',
            'data'    => new SppdResource($sppd),
        ], 200);
    }

    /**
     * DELETE /api/sppds/{id}
     * Menghapus data SPPD
     */
    public function destroy($id)
    {
        $sppd = Sppd::findOrFail($id);
        $sppd->delete();

        return response()->json([
            'message' => 'Data SPPD berhasil dihapus.',
        ], 200);
    }

    /**
     * GET /api/sppds/status-count
     * Menghitung jumlah data berdasarkan status
     */
    public function statusCount()
    {
        $counts = DB::table('sppd4') // tabel sesuai model Anda
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status');

        // agar hasil rapi (misal: {"DIAJUKAN": 5, "DISETUJUI": 3})
        $normalized = [];
        foreach ($counts as $status => $total) {
            $normalized[strtoupper($status)] = $total;
        }

        return response()->json($normalized);
    }
}
