<?php

namespace App\Models\Backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'image',
        'status'
    ];

    public function added_by()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
