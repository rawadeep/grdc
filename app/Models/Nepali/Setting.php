<?php

namespace App\Models\Nepali;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'nepali_settings';
    protected $fillable = [
        'name',
        'key',
        'value',
        'type',
        'group',
        'file_path'
    ];
}
