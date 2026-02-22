<?php

namespace App\Models\Nepali;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'nepali_events';
    protected $fillable = [
        'user_id',
        'title',
        'date',
        'location',
        'status',
    ];
}
