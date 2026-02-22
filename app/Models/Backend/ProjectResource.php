<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class ProjectResource extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'icon',
        'slug',
        'type',
        'description',
        'file_path',
    ];
}
