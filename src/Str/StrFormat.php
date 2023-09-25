<?php

namespace Biin2013\PhpUtils\Str;

class StrFormat
{
    /**
     * @param string $value
     * @return string
     */
    public static function studly(string $value): string
    {
        $words = explode(' ', str_replace(['-', '_'], ' ', $value));

        return implode(array_map(fn($word) => ucfirst($word), $words));
    }

    /**
     * @param string $value
     * @return string
     */
    public static function camel(string $value): string
    {
        return lcfirst(static::studly($value));
    }
}