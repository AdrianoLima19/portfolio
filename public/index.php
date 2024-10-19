<?php

session_start();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $file = __DIR__ . '/view.html';

        if (file_exists($file)) {
            token();

            ob_start();
            require $file;
            $content = ob_get_clean();
            ob_end_clean();

            response($content, 200, [
                'Content-Type' => 'text/html',
            ]);
        } else {
            response(null, 404);
        }

        break;

    case 'POST':
        response(null, 200);

        break;
}

function response(string $content = null, int $status = 200, array $headers = [])
{
    http_response_code($status);

    foreach ($headers as $name => $value) {
        header($name . ': ' . $value);
    }

    echo $content;
}

function json(array $content = [], int $status = 200, array $headers = [])
{
    $headers['Content-Type'] = 'application/json';
    response(json_encode($content), $status, $headers);
}

function token()
{
    if (empty($_SESSION['token'])) {
        $_SESSION['token'] = bin2hex(random_bytes(32));
    }
}
