<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalSiswa extends Model
{
    use HasFactory;

     protected $fillable = [
         
        'siswa_id',
        'namakursus',
        'namainstruktur',
        'hari',
        'jam_mulai',
        'jam_selesai'
    ];

    // Relationship with Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
    public function instruktur()
    {
        return $this->belongsTo(Instruktur::class);
    }
}
