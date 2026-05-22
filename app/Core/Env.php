<?php

namespace App\Core;

use RuntimeException;

class Env
{
    private static bool $loaded = false;

    /**
     * @param string $path
     *
     * @return void
     * @throws RuntimeException
     */
    public static function load(string $path): void
    {
        if (self::$loaded) {
            return;
        }

        if (!file_exists($path)) {
            throw new RuntimeException("Arquivo .env não encontrado em: {$path}");
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            if (strpos($line, '=') !== false) {
                list($name, $value) = explode('=', $line, 2);
                $name = trim($name);
                $value = trim($value);
                $value = self::stripQuotes($value);
                $value = self::parseValue($value);

                $_ENV[$name] = $value;
            }
        }

        self::$loaded = true;
    }

    /**
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        return $_ENV[$key] ?? $default;
    }

    /**
     * @param string $value
     *
     * @return string
     */
    private static function stripQuotes(string $value): string
    {
        if (
            (str_starts_with($value, '"') && str_ends_with($value, '"')) ||
            (str_starts_with($value, "'") && str_ends_with($value, "'"))
        ) {
            return substr($value, 1, -1);
        }

        return $value;
    }

    /**
     * @param string $value
     *
     * @return mixed
     */
    private static function parseValue(string $value): mixed
    {
        $lower = strtolower($value);

        return match ($lower) {
            'true', '(true)'   => true,
            'false', '(false)' => false,
            'null', '(null)'   => null,
            'empty', '(empty)' => '',
            default => self::parseNumeric($value),
        };
    }

    /**
     * @param string $value
     *
     * @return float|int|string
     */
    private static function parseNumeric(string $value): mixed
    {
        if (filter_var($value, FILTER_VALIDATE_INT) !== false) {
            return (int) $value;
        }

        if (filter_var($value, FILTER_VALIDATE_FLOAT) !== false) {
            return (float) $value;
        }

        return $value;
    }
}
