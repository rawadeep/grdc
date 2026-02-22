<?php

namespace App\Models\Tamang;

use Illuminate\Database\Eloquent\Model;

class CaseStudy extends Model
{
    protected $table = 'tamang_case_studies';
    protected $fillable = [
        'user_id',
        'case_study_category_id',
        'title',
        'slug',
        'content',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(CaseStudyCategory::class, 'case_study_category_id');
    }
}
