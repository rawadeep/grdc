<?php

namespace App\Models\Tamang;

use Illuminate\Database\Eloquent\Model;

class ProjectResource extends Model
{
    protected $table = 'tamang_project_resources';
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
