<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaModel extends Model
{
    use HasFactory;
    protected $table = 'anggota';
    protected $primaryKey = 'kode_anggota';
    protected $fillable = ['nm_anggota', 'tmp_lahir', 'tgl_lahir', 'alamat', 'no_hp'];
}
