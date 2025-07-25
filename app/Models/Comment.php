<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    public $fillable = [
        "comment_content",
        "comment_date",
        "reviewer_name",
        "reviewer_email",
        "is_hidden",
    ];

    public $timestamps = false;

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, "post_id");
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function comment(): BelongsTo
    {
        return $this->belongsTo(Comment::class, "parent_comment_id");
    }
}
