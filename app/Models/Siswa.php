<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Siswa extends Model
{
    use HasFactory;
       protected $fillable =['foto', 'nama', 'orangtua', 'jk', 'email', 'no_telp', 'alamat', 'kursus_id', 'tgl_lahir', 'status'];

    public function kursus()
    {
         return $this->belongsTo(Kursus::class, 'kursus_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected static function boot()
    {
        parent::boot();
        static::updating(function ($model) {
             if ($model->isDirty('foto') && $model->getOriginal('foto') !== null) {
                Storage::delete('public/fotosiswa/' . $model->getOriginal('foto'));
            }
        });
    }
}
