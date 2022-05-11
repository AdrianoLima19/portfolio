<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
  exit();
}

session_start();

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

$token = $post['token'];

if (!$token || $token !== $_SESSION['token']) {
  header($_SERVER['SERVER_PROTOCOL'] . ' 403 Forbidden');
  exit();
}

$from = "contato@adriano-lima.dev.br";
$to = "adrianolima.dev@gmail.com";
$subject = "Mensagem enviado do Portfólio";
$message = html_entity_decode($post['message']) . "\n\r Enviado por {$post['name']}, email de contato {$post['email']}";
$headers = "From:" . $from;

if (mail($to, $subject, $message, $headers) === true) {
  header($_SERVER['SERVER_PROTOCOL'] . ' 200 Ok');
} else {
  header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
}
