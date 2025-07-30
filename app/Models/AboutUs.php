<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AboutUs extends Model
{
    protected $fillable = [
        'title',
        'content',
    ];

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, "post_category");
    }
}