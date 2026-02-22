<?php

namespace App\Models\Nepali;

use Illuminate\Database\Eloquent\Model;

class PublicationCategory extends Model
{
    protected $table = 'nepali_publication_categories';
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'status',
    ];

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }
}
