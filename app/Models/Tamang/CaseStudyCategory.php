<?php

namespace App\Models\Tamang;

use Illuminate\Database\Eloquent\Model;

class CaseStudyCategory extends Model
{
    protected $table = 'tamang_case_study_categories';
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
