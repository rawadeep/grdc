<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'parentId',
        'user_id',
        'title',
        'description',
        'buttonTitle',
        'linkTo',
        'showOnFront'
    ];

    public function page()
    {
        return $this->belongsTo(Page::class, 'linkTo');
    }
}
