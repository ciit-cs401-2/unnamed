<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    public $fillable = [
        "title",
        "content",
        "slug",
        "publication_date",
        "last_modified_date",
        "status",
        "featured_image_url",
        "views_count",
        "user_id",
        'featured_post', 
    ];

    public $timestamps = false;

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, "post_category");
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, "post_tag");
    }

    public function media(): HasMany
    {
        return $this->hasMany(Media::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
