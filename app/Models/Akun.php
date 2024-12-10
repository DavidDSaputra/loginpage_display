<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Akun extends Authenticatable
{
    use HasFactory;

    protected $table = 'akuns'; // Nama tabel di database
    protected $fillable = ['username', 'password']; // Kolom yang dapat diisi

    protected $hidden = ['password']; // Sembunyikan password saat data dikembalikan
}
