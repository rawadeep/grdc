<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class ProjectDescription extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'title',
        'description',
        'icon',
        'status',
        'ord'
    ];
}
