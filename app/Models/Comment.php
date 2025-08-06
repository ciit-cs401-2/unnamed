<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    public $timestamps = false;

    protected $fillable = [
        "comment_content",
        "comment_date",
        "reviewer_name",
        "reviewer_email",
        "is_hidden",
        "post_id",
        "user_id",
        "parent_comment_id"
    ];

    protected $casts = [
        'is_hidden' => 'boolean',
        'comment_date' => 'datetime',
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_comment_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'parent_comment_id');
    }
}
