<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaKursus extends Model
{
    use HasFactory;

    protected $fillable = ['siswa_id', 'kursus_id'];

    public function kursus()
    {
        return $this->belongsTo(Kursus::class,'kursus_id');
    }
        public function siswa()
    {
        return $this->belongsTo(Siswa::class,'siswa_id');
    }
}


