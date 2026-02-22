<?php

namespace App\Models\Nepali;

use Illuminate\Database\Eloquent\Model;

class ProjectObjective extends Model
{
    public $table = "nepali_project_descriptions";
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
