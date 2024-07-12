<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalSiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'kursus_id',
        'instruktur_id',
        'hari',
        'jam_mulai',
        'jam_selesai'
    ];

    // Relationship with Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    // Relationship with Kursus
    public function kursus()
    {
        return $this->belongsTo(Kursus::class, 'kursus_id');
    }
    public function instruktur()
    {
        return $this->belongsTo(Instruktur::class, 'instruktur_id');
    }
}
