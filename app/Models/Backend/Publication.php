<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $fillable = [
        'user_id',
        'publication_category_id',
        'title',
        'slug',
        'icon',
        'description',
        'file_path',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(PublicationCategory::class, 'publication_category_id');
    }
}
