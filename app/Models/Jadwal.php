<?php

namespace App\Models;

use App\Models\Matakuliah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = ['jadwal', 'matakuliah_id'];
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class);
    }
    
}
