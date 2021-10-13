<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class DataClaiment extends Model
{
    protected $table = 'data_claiment';
    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'alamat',
    ];
}
