<?php

namespace App\Core;

use RuntimeException;

class Controller
{
    /**
     * @param string $view
     * @param array  $data
     *
     * @return void
     * @throws RuntimeException
     */
    public function view(string $view, array $data = []): void
    {
        extract($data);

        $viewPath = __DIR__ . '/../../resources/views/' . $view . '.php';

        if (!file_exists($viewPath)) {
            throw new RuntimeException("View não encontrada: {$view}");
        }

        require $viewPath;
    }

    /**
     * @param mixed $data
     * @param int   $statusCode
     *
     * @return void
     */
    public function json(mixed $data, int $statusCode = 200): void
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    /**
     * @param string $url
     * @param int    $statusCode
     *
     * @return void
     */
    public function redirect(string $url, int $statusCode = 302): void
    {
        header("Location: {$url}", true, $statusCode);
        exit;
    }

    /**
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public function post(string $key, mixed $default = null): mixed
    {
        return $_POST[$key] ?? $default;
    }
}
