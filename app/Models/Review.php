<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'komentar', 'gambar'];
    protected static function boot()
    {
        parent::boot();
        static::updating(function ($model) {
            if ($model->isDirty('gambar') && $model->getOriginal('gambar') !== null) {
                Storage::delete('public/review/' . $model->getOriginal('gambar'));
            }
        });
    }
}
