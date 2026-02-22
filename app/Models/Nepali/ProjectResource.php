<?php

namespace App\Models\Nepali;

use Illuminate\Database\Eloquent\Model;

class ProjectResource extends Model
{
    protected $table = 'nepali_project_resources';
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
