<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bbm extends Model
{
    protected $table = 'bbm';

    protected $fillable = [
        'id',
        'id_karyawan',
        'id_kendaraan',
        'id_user',
        'tanggal',
        'km_awal',
        'km_akhir',
        'total_km',
        'bbm_liter',
        'bbm_liter',
        'bbm_per_liter',
        'harga_bbm',
        'konsumsi_bbm',
        'created_at',
    ];
}
