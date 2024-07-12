<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiSiswa extends Model
{
    use HasFactory;

    protected $fillable = ['siswa_id', 'keterangan', 'tanggal', 'catatan'];
    
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
