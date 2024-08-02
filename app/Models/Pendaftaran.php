<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pendaftaran',
        'foto',
        'nama',
        'orangtua',
        'emailortu',
        'jk',
        'email', 
        'no_telp', 
        'alamat', 
        'kursus_id',
        'tgl_lahir', 
        'status'
    ];

    public function kursus()
    {
        return $this->belongsTo(Kursus::class, 'kursus_id');
    }


    
    public static function generateIdPendaftaran()
    {
        $prefix = 'P';
        $year = date('Y');
        $month = date('m');
        $lastRecord = self::whereYear('created_at', $year)
                            ->whereMonth('created_at', $month)
                            ->orderBy('id', 'desc')
                            ->first();

        $number = $lastRecord ? intval(substr($lastRecord->id_pendaftaran, -3)) + 1 : 1;
        return $prefix . $year . $month . str_pad($number, 3, '0', STR_PAD_LEFT);
    }

}
