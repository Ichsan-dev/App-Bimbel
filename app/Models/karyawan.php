<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class karyawan extends Model
{
    use HasFactory;
    protected $fillable = ["nama", "jk", "no_telp", "email", "pend_akhir",
                         "alamat", "tanggal_lahir", "jabatan_id"];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
