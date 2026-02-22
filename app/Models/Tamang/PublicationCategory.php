<?php

namespace App\Models\Tamang;

use Illuminate\Database\Eloquent\Model;

class PublicationCategory extends Model
{
    protected $table = 'tamang_publication_categories';
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
