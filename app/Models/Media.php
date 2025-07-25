<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Media extends Model
{
    public $fillable = [
        "file_name",
        "file_type",
        "file_size",
        "url",
        "upload_date",
        "description"
    ];

    public $timestamps = false;

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, "post_id");
    }
}
