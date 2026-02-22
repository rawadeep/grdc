<?php

namespace App\Models\Nepali;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'nepali_sections';
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
