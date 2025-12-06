<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ImageAsset extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'post_id',
        'caption',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($imageAsset) {
            if ($imageAsset->path) {
                Storage::disk('public')->delete($imageAsset->path);
            }
        });
    }

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->path);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
