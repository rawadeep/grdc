<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'status',
        'parent',
        'content',
        'ord',
        'showOnMenu'
    ];

    public function ofparent()
    {
        return self::where('id', $this->parent)->first();
    }

    public function subpages()
    {
        return self::where('parent', $this->id)->orderBY('ord', 'asc')->get();
    }
}
