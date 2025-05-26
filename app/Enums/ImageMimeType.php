<?php

namespace App\Enums;

enum ImageMimeType: string
{
    case JPEG = 'jpeg';
    case PNG = 'png';
    case JPG = 'jpg';
    case GIF = 'gif';
    case SVG = 'svg';
    case WEBP = 'webp';
    case BMP = 'bmp';
    case ICO = 'ico';
    case TIFF = 'tiff';
    case AVIF = 'avif';
    case HEIC = 'heic';

    public static function types(): string
    {
        return collect(self::cases())
            ->map(fn($type) => $type->value)
            ->implode(',');
    }
}
