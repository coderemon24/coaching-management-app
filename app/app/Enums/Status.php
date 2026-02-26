<?php

namespace App\Enums;

enum Status:string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case PENDING = 'pending';
    case SUSPENDED = 'suspended';
    case DELETED = 'deleted';

    public static function values(): string
    {
        return collect(self::cases())
            ->map(fn($type) => $type->value)
            ->implode(',');
    }
}

