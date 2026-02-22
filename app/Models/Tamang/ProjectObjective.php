<?php

namespace App\Models\Tamang;

use Illuminate\Database\Eloquent\Model;

class ProjectObjective extends Model
{
    public $table = "tamang_project_descriptions";
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
