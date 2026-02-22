<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class ProjectComponent extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'featured_image',
        'short_description',
        'content',
        'icon',
        'project_framework_description',
        'project_outcomes',
        'project_outputs',
        'status',
    ];

    public function getOutcomesAttribute()
    {
        return json_decode($this->project_outcomes);
    }

    public function getOutputsAttribute()
    {
        return json_decode($this->project_outputs);
    }
}
