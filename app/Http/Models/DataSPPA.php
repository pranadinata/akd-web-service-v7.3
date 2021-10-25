<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class DataSPPA extends Model
{
    protected $table = 'data_sppa';
    protected $fillable = [
        'nama_lengkap',
        'alamat',
        'peserta_1',
        'foto_ktp_peserta_1',
        'peserta_2',
        'foto_ktp_peserta_2',
        'foto_tanda_tangan',
    ];
}
