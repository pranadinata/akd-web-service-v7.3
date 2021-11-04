<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class DataSPPA extends Model
{
    protected $table = 'data_sppa';
    protected $fillable = [
        'id_data_klaiment',
        'peserta_1',
        'peserta_2',
        'foto_ktp_peserta',
        'foto_tanda_tangan',
        'jumlah_premi',
    ];
}
