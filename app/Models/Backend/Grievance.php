<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Grievance extends Model
{
    protected $fillable = [
        'full_name',
        'contact_number',
        'email',
        'category',
        'description',
    ];
}
