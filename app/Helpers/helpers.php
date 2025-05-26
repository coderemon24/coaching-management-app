<?php

use Illuminate\Support\Str;

if(!function_exists('isJson')) {
    function isJson($string) {
        return is_string($string) && is_array(json_decode($string, true)) && (json_last_error() == JSON_ERROR_NONE);
    }
}

if(!function_exists('slugify')){
    function slugify($text, $divider = '-'){
        $slug = Str::slug($text, $divider);

        return $slug;
    }
}
