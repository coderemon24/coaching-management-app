<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ImageUpload
{
    public static function upload($path = 'uploads', $file)
    {
        try {
            $uploadPath = public_path($path);
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $fullPath = $uploadPath . '/' . $fileName;

            // Copy the file from tmp to public path
            copy($file->getRealPath(), $fullPath);

            // Return relative path to store in DB
            return $path . '/' . $fileName;
        } catch (\Exception $e) {
            // Log error or handle as needed
            Log::error('Image Upload Failed: ' . $e->getMessage());
            return null;
        }
    }

    public static function uploadConvertedImage($path = "uploads", $file)
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
