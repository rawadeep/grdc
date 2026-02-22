<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class CaseStudyCategory extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'icon',
        'description',
        'status',
    ];

    public function case_studies()
    {
        return $this->hasMany(CaseStudy::class);
    }
}
