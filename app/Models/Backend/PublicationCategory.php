<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class PublicationCategory extends Model
{
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
