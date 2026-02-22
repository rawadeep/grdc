<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('date_formatter')) {
    function date_formatter($strtotime = "", $format = "")
    {
        if ($strtotime && !is_numeric($strtotime)) {
            $strtotime = strtotime($strtotime);
        } elseif (!$strtotime) {
            $strtotime = time();
        }

        if ($format == "") {
            return date('d', $strtotime) . ' ' . date('M', $strtotime) . ', ' . date('Y', $strtotime);
        }

        if ($format == 1) {
            return date('D', $strtotime) . ', ' . date('d', $strtotime) . ' ' . date('M', $strtotime) . ' ' . date('Y', $strtotime);
        }

        if ($format == 2) {
            $time_difference = time() - $strtotime;
            if ($time_difference <= 10) {
                return 'Just now';
            }
            //864000 = 10 days
            if ($time_difference > 864000) {
                return date_formatter($strtotime, 3);
            }

            $condition = array(
                12 * 30 * 24 * 60 * 60  => 'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
            );

            foreach ($condition as $secs => $str) {
                $d = $time_difference / $secs;
                if ($d >= 1) {
                    $t = round($d);
                    return $t . ' ' . $str . ($t > 1 ? 's' : '') . ' ' . 'ago';
                }
            }
        }

        if ($format == 3) {
            $date = date('d', $strtotime);
            $date .= ' ' . date('M', $strtotime);

            if (date('Y', $strtotime) != date('Y', time())) {
                $date .= date(' Y', $strtotime);
            }

            $date .= ' ' . 'at' . ' ';
            $date .= date('h:i a', $strtotime);
            return $date;
        }

        if ($format == 4) {
            return date('d', $strtotime) . ' ' . date('M', $strtotime) . ' ' . date('Y', $strtotime) . ', ' . date('h:i:s A', $strtotime);
        }
    }
}

if (!function_exists('excerpt')) {
    function excerpt($text, $length = 200)
    {
        return substr(strip_tags($text), 0, $length);
    }
}

if (!function_exists('random')) {
    function random($length_of_string = 8, $lowercase = false)
    {
        // String of all alphanumeric character
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

        // Shufle the $str_result and returns substring
        // of specified length
        $randVal = substr(str_shuffle($str_result), 0, $length_of_string);
        if ($lowercase) {
            $randVal = strtolower($randVal);
        }
        return $randVal;
    }
}

if (!function_exists('get_image')) {
    function get_image($url = null)
    {
        if (is_file($url) && file_exists($url)) {
            return asset($url);
        } elseif ($url != null) {
            return asset('assets/default.png');
        } else {
            return asset($url);
        }
    }
}

if (!function_exists('prefixed_route')) {
    function prefixed_route($routeName)
    {
        $prefix = session('language');
        return session('language') == 'en' || session('language') == 'english' ? $routeName : $prefix . '.' . $routeName;
    }
}

if (!function_exists('remove_image')) {
    function remove_image($filename, $path)
    {
        $url = $path . '/' . $filename;
        if (!is_dir($url) && $filename && file_exists($url)) {
            unlink($url);
        }
    }
}

if (!function_exists('get_phrase')) {
    function get_phrase($key)
    {
        $active_language = session()->get('language');
        if (!$active_language) {
            $active_language = 'english';
            session(['language' => $active_language]);
        }
        $query = DB::table('languages')->where('name', $active_language)->where('key', $key);
        if ($query->count() > 0) {
            $returnValue = $query->value('value');
        } else {
            // If english only then insert the value to languages to automate phrases insertion on page load or controller as well.
            DB::table('languages')->insert([
                'name' => $active_language,
                'key' => $key,
                'value' => $key
            ]);
            $returnValue = $key;
        }
        return $returnValue;
    }
}

if (!function_exists('get_settings')) {
    function get_settings($key = "", $return_type = "")
    {
        $db = session('language') == 'nepali' ? DB::table('nepali_settings') : (session('language') == 'tamang' ? DB::table('tamang_settings') : DB::table('settings'));
        $value = $db->where('key', $key)->value('value');
        if (!$value) {
            $value = "";
        }
        if ($return_type === true) {
            return json_decode($value, true);
        } elseif ($return_type === 'decode') {
            return json_decode($value, true);
        } elseif ($return_type == "object") {
            return json_decode($value);
        } else {
            return $value;
        }
    }
}

if (!function_exists('slugify')) {
    function slugify($string, $separator = '-')
    {
        // Convert the string to ASCII ignoring non-ASCII characters
        $string = transliterator_transliterate('Any-Latin; Latin-ASCII;', $string);
        // Replace non-word characters with the separator
        $string = preg_replace('~[^\p{L}\p{N}]+~u', $separator, $string);
        // Remove any remaining non-word characters
        $string = preg_replace('~[^-\w]+~', '', $string);
        // Trim separators from both ends
        $string = trim($string, $separator);
        // Lowercase the string
        $string = strtolower($string);
        // Replace spaces with the separator
        $string = str_replace(' ', $separator, $string);
        // Replace multiple consecutive separators with a single one
        $string = preg_replace('~-+~', $separator, $string);
        return $string;
    }
}
