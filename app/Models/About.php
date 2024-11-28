<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class About extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'deskripsi1', 'deskripsi', 'image'];

      protected static function boot()
    {
        parent::boot();
        static::updating(function ($model) {
            if ($model->isDirty('image') && $model->getOriginal('image') !== null) {
                Storage::delete('public/about/' . $model->getOriginal('image'));
            }
        });
    }
}
