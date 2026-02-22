<?php

namespace App\Models\Nepali;

use Illuminate\Database\Eloquent\Model;

class MediaCoverage extends Model
{
    protected $table = 'nepali_media_coverages';
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
