<?php

namespace App\Models\Tamang;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'tamang_settings';
    protected $fillable = [
        'name',
        'key',
        'value',
        'type',
        'group',
        'file_path'
    ];
}
