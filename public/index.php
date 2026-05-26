<?php

use App\Controllers\HomeController;
use App\Controllers\ProjectsController;
use App\Core\Env;
use App\Core\Vite;

require_once __DIR__ . '/../vendor/autoload.php';

Env::load(__DIR__ . '/../.env');

setBasePath(dirname(__DIR__));

Vite::configure([
    'dev_server' => 'http://localhost:5173',
    'build_path' => 'build',
    'manifest' => basePath('public/build/.vite/manifest.json'),
]);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

if ($uri !== '/' && substr($uri, -1) === '/') {
    $uri = rtrim($uri, '/');
    header("Location: $uri", true, 301);
    exit;
}

try {
    switch ("$method:$uri") {
        case 'GET:/':
            (new HomeController)->index();
            break;

        case 'GET:/api/projetos':
            (new ProjectsController)->index();
            break;

        case preg_match('#^GET:/api/projetos/(\d+)$#', "$method:$uri", $matches) ? true : false:
            (new ProjectsController)->show($matches[1]);
            break;

        case 'POST:/api/submit':
            # code...
            break;

        default:
            http_response_code(404);
            # code...
            break;
    }
} catch (\Throwable $e) {
    http_response_code(500);

    if (env('app_debug', true)) {
        echo $e;
    }
}
