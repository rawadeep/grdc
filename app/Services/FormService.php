<?php

namespace App\Services;

class FormService
{

    public static function maxOrder($type)
    {
        $current_language = session('language', 'english');
        if ($current_language == 'nepali') {
            return \App\Models\Nepali\ProjectDescription::where('type', $type)->max('ord') + 1;
        } else if ($current_language == 'tamang') {
            return \App\Models\Tamang\ProjectDescription::where('type', $type)->max('ord') + 1;
        } else {
            return \App\Models\Backend\ProjectDescription::where('type', $type)->max('ord') + 1;
        }
    }
}
