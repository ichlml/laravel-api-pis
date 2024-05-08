<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    protected $table = 'presensis';
    protected $fillable = [
        'id_user',
        'latitude',
        'longitude',
        'tanggal',
        'masuk',
        'pulang'
    ];
}
