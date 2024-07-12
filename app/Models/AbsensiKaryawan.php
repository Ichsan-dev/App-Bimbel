<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiKaryawan extends Model
{
    use HasFactory;

    protected $fillable = ['karyawan_id', 'tanggal', 'jam_masuk', 'jam_keluar', 'keterangan'];

    public function karyawan()
    {
        return $this->belongsTo(karyawan::class, 'karyawan_id');
    }
}
