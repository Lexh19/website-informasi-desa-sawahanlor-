<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class gallery extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'img'];

    protected static function boot()
    {
        parent::boot();
        static::updating(function ($model) {
            if ($model->isDirty('img') && ($model->getOriginal('img') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('img'));
            }
        });
    }
}
