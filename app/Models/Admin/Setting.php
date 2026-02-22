<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'name',
        'key',
        'value',
        'type',
        'group',
        'file_path'
    ];
}
