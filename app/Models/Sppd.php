<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sppd extends Model
{
    use HasFactory;

    protected $table = 'sppd4';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_pegawai',
        'no_trip',
        'lokasi_dinas',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
    ];
}
