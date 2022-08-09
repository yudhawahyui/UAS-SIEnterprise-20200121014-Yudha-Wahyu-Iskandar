<?php

namespace App\Models;

use App\Models\KontrakMatakuliah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = ['semester'];

    public function kontrakmatakuliah()
    {
        return $this->hasOne(KontrakMatakuliah::class);
    }
}
