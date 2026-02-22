<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class MediaCoverage extends Model
{
    protected $fillable = [
        'user_id',
        'featured_image',
        'title',
        'slug',
        'short_description',
        'content',
        'published_at',
        'source',
        'status',
    ];
}
