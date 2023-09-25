<?php

namespace Biin2013\PhpUtils\Str;

class StrValidate
{
    public const SYMBOL = '!@#$%^&*_-,.?:';

    /**
     * @param string $value
     * @return int
     */
    public static function hasCombine(string $value): int
    {
        $result = 0;

        static::hasLowercase($value) && $result++;

        static::hasUppercase($value) && $result++;

        static::hasNumeric($value) && $result++;

        static::hasSymbol($value) && $result++;

        return $result;
    }

    /**
     * @param string $value
     * @return bool
     */
    public static function hasLowercase(string $value): bool
    {
        return preg_match('/[a-z]+/', $value);
    }

    /**
     * @param string $value
     * @return bool
     */
    public static function hasUppercase(string $value): bool
    {
        return preg_match('/[A-Z]+/', $value);
    }

    /**
     * @param string $value
     * @return bool
     */
    public static function hasNumeric(string $value): bool
    {
        return preg_match('/\d+/', $value);
    }

    /**
     * @param string $value
     * @param string|null $symbol
     * @return bool
     */
    public static function hasSymbol(string $value, ?string $symbol = self::SYMBOL): bool
    {
        if (is_null($symbol)) {
            $symbol = static::SYMBOL;
        }

        $symbol = mb_str_split($symbol);

        foreach ($symbol as $v) {
            if (str_contains($value, $v)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param string $value
     * @return bool
     */
    public static function hasAlpha(string $value): bool
    {
        return static::hasLowercase($value) || static::hasUppercase($value);
    }

    /**
     * @param string $value
     * @return bool
     */
    public static function onlyLowercase(string $value): bool
    {
        return preg_match('/^[a-z]+$/', $value);
    }

    /**
     * @param string $value
     * @return bool
     */
    public static function onlyUppercase(string $value): bool
    {
        return preg_match('/^[A-Z]+$/', $value);
    }

    /**
     * @param string $value
     * @return bool
     */
    public static function onlyNumeric(string $value): bool
    {
        return preg_match('/^\d+$/', $value);
    }

    /**
     * @param string $value
     * @param string|null $symbol
     * @return bool
     */
    public static function onlySymbol(string $value, ?string $symbol = self::SYMBOL): bool
    {
        if (is_null($symbol)) {
            $symbol = static::SYMBOL;
        }

        $value = mb_str_split($value);

        foreach ($value as $v) {
            if (!str_contains($symbol, $v)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param string $value
     * @return bool
     */
    public static function onlyAlpha(string $value): bool
    {
        return preg_match('/^[a-zA-Z]+$/', $value);
    }
}