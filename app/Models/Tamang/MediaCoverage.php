<?php

namespace App\Models\Tamang;

use Illuminate\Database\Eloquent\Model;

class MediaCoverage extends Model
{
    protected $table = 'tamang_media_coverages';
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
