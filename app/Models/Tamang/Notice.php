<?php

namespace App\Models\Tamang;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table = 'tamang_notices';
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'short_description',
        'published_at',
        'content',
    ];
}
