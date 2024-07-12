<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GajiKaryawan extends Model
{
    use HasFactory;

    protected $fillable = ['karyawan_id', 'bulan', 'tanggal', 'gaji_pokok', 
                            'tunjangan_transport', 'tunjangan_makan', 'total_gaji' ];

   
    public function karyawan()
    {
        return $this->belongsTo(karyawan::class, 'karyawan_id');
    }
    
}
