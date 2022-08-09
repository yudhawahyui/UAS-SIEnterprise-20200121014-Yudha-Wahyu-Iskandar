<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = ['nama_mahasiswa', 'email', 'no_tlp', 'alamat'];

    public function kontrakmatakuliah()
    {
        return $this->hasOne(KontrakMatakuliah::class);
    }

    public function absen()
    {
        return $this->hasOne(Absen::class);
    }
}
