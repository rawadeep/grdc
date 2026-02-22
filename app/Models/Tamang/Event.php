<?php

namespace App\Models\Tamang;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'tamang_events';
    protected $fillable = [
        'user_id',
        'title',
        'date',
        'location',
        'status',
    ];
}
