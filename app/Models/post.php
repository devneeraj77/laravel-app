<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'admin_id',
        'category_id',
        'published_at',
        'is_published',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_published' => 'boolean',
    ];

    public function imageAsset()
    {
        return $this->hasOne(ImageAsset::class);
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }

    // --- Relationships ---

    /**
     * Get the author (Admin) of the Post.
     */
    public function author()
    {
        // Assuming your admins table handles the 'author' role
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    /**
     * Get the category associated with the Post.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // --- Scopes ---

    /**
     * Scope a query to only include published posts.
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                     ->whereNotNull('published_at')
                     ->where('published_at', '<=', now());
    }
}