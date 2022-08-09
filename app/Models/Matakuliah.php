<?php

namespace App\Models;

use App\Models\Absen;
use App\Models\Jadwal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matakuliah extends Model
{
    use HasFactory;

    protected $fillable = ['nama_matkul', 'sks'];

    public function jadwal()
    {
        return $this->hasOne(Jadwal::class);
    }

    public function absen(){
        return $this->hasOne(Absen::class);
    }
}
