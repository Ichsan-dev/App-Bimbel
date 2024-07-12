<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
    use HasFactory;
    protected $fillable = ["nama_kursus", "harga", "deskripsi", "instruktur_id" ];

    public function instruktur()
    {
        return $this->belongsTo(Instruktur::class, 'instruktur_id');
    }
    
}
