<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class ImageUpload
{
    public static function upload($path="uploads", $file)
    {
        $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($path), $fileName);

        return $path . '/' . $fileName;
    }

    public static function uploadConvertedImage($path="uploads", $file)
    {
        $fileName = Str::uuid() . '.webp';
        $path = public_path($path . '/' . $fileName);
        file_put_contents($path, $file);

        return $path;
    }

    public static function delete($path)
    {
        if (file_exists(public_path($path))) {
            unlink(public_path($path));
        }
    }
}
