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

/*****
 *
 * Image convert to webp
 *=======================================
 * If you wanna upload converted image.
 * You must use file_put_contents() method
 * Because convertToWebp will give you binary data
 *=======================================
 * @FILE UPLOADING SYSTEM IN LARAVEL
 *=======================================
 * $webp = convertToWebp($file);
 * $filename = Str::uuid() . '.webp';
 * $path = public_path('uploads/' . $filename);
 * file_put_contents($path, $webp);
 *
 *****/

if(!function_exists('convertToWebp'))
{
    function convertToWebp($file, $quality = 80)
    {
        if (!$file || !method_exists($file, 'getMimeType')) {
            return null;
        }

        $mime = $file->getMimeType(); # Get image mime type

        # Convert image to image resource

        switch ($mime) {
            case 'image/jpeg':
            case 'image/jpg':
                $image = imagecreatefromjpeg($file);
                break;
            case 'image/png':
                $image = imagecreatefrompng($file);
                imagepalettetotruecolor($image);
                imagealphablending($image, true);
                imagesavealpha($image, true);
                break;
            case 'image/gif':
                $image = imagecreatefromgif($file);
                break;
            case 'image/webp':
                $image = imagecreatefromwebp($file);
                break;
            case 'image/bmp':
                $image = imagecreatefrombmp($file);
                break;
            case 'image/x-ms-bmp':
                $image = imagecreatefrombmp($file);
                break;
            case 'image/tiff':
            case 'image/tif':
                return null; # Not supported
            default:
                return null;
        }

        # Convert image to webp
        # keep image into buffer

        ob_start();

        imagewebp($image, null, $quality);
        $webpData = ob_get_clean();

        imagedestroy($image);

        return $webpData;
    }



}
