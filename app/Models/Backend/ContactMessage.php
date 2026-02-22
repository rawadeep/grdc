<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'full_name',
        'organization',
        'email',
        'subject',
        'message',
    ];
}
