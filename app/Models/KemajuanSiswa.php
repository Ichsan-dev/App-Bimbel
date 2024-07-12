<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KemajuanSiswa extends Model
{
    use HasFactory;

    protected $fillable = ['siswa_id', 'kursus', 'nilai', 'keterangan', 'tanggal'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
