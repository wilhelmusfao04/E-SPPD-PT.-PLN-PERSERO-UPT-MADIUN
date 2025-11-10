<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SppdResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama_pegawai' => $this->nama_pegawai,
            'no_trip' => $this->no_trip,
            'lokasi_dinas' => $this->lokasi_dinas,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_selesai' => $this->tanggal_selesai,
            'status' => $this->status,
        ];
    }
}
