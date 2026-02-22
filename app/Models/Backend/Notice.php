<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'short_description',
        'published_at',
        'content',
    ];
}
