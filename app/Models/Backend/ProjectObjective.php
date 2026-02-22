<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class ProjectObjective extends Model
{
    public $table = "project_descriptions";
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
