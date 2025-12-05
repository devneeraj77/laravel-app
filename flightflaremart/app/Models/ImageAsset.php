<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ImageAsset extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'is_url',
        'post_id',
        'caption',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($imageAsset) {
            if (!$imageAsset->is_url) {
                Storage::disk('public')->delete($imageAsset->url);
            }
        });
    }

    public function getUrlAttribute($value)
    {
        if ($this->is_url) {
            return $value;
        }

        return Storage::disk('public')->url($value);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
