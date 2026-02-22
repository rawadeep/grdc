<?php

namespace App\Models\Tamang;

use Illuminate\Database\Eloquent\Model;

class ProjectDescription extends Model
{
    protected $table = 'tamang_project_descriptions';
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
