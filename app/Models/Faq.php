<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'question',
        'answer',
    ];

    /**
     * Get the post that owns the Faq.
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
