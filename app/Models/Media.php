<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'name',
        'slug',
        'filename',
        'status'
    ];
}
