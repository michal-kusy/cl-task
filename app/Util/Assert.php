<?php declare(strict_types=1);

namespace App\Util;

class Assert
{
    public static function isStringInteger($id): bool
    {
        return preg_match('/^\d+$/',$id) === 1;
    }
}