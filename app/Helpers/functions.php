<?php

/**
 * @param string $key
 * @param mixed $default
 *
 * @return mixed
 */
function env(string $key, mixed $default = null): mixed
{
    return App\Core\Env::get(strtoupper($key), $default);
}

/**
 * @return array
 */
function projects(): array
{
    return  require __DIR__ . '/../../config/projects.php';
}

/**
 * @param string $path
 *
 * @return void
 */
function setBasePath(string $path): void
{
    if (defined('BASE_PATH')) {
        return;
    }

    define('BASE_PATH', rtrim($path, '\/'));
}

/**
 * @param string $path
 *
 * @return string
 * @throws Exception
 */
function basePath(string $path = ''): string
{
    if (!defined('BASE_PATH')) {
        throw new Exception('root não foi definido.');
    }

    $root = BASE_PATH;

    if (!empty($path)) {
        $root .= DIRECTORY_SEPARATOR . ltrim($path, '\/');
    }

    return $root;
}

/**
 * @param string $entry
 *
 * @return string
 */
function vite(string $entry): string
{
    return App\Core\Vite::assets($entry);
}

/**
 * @param mixed[] $var
 *
 * @return void
 */
function debug(mixed ...$var): void
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}
