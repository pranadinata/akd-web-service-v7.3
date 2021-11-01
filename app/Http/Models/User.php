<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'nama_lengkap',
        'email',
        'username',
        'password',
        'group_user',
    ];

}
