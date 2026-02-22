<?php

namespace App\Models\Nepali;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table = 'nepali_notices';
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'short_description',
        'published_at',
        'content',
    ];
}
