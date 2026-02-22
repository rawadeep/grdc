<?php

namespace App\Models\Nepali;

use Illuminate\Database\Eloquent\Model;

class CaseStudyCategory extends Model
{
    protected $table = 'nepali_case_study_categories';
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
