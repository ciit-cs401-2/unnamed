<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    public $fillable = [
        "category_name",
        "slug",
        "description"
    ];

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, "post_category");
    }
}
