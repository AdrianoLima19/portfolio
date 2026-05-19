<?php

function debug(mixed ...$var): void
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}

function env(string $key, mixed $default = null)
{
    return App\Core\Env::get($key, $default);
}

function projects(): array
{
    return  require __DIR__ . '/../../config/projects.php';
}
