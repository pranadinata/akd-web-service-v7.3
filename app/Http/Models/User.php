<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'email',
        'username',
        'password',
    ];

}
