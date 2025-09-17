<?php
// Seguridad: cabeceras HTTP
header('X-Frame-Options: DENY');
header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: no-referrer');

// Cookies de sesión seguras
session_set_cookie_params([
    'lifetime' => 0,
    'path'     => '/',
    'domain'   => '',
    'secure'   => true,
    'httponly' => true,
    'samesite' => 'Strict',
]);
require_once 'proteccion.php'; // Agregado aquí
session_start();
require 'log.php';

session_unset();
session_destroy();

header('Location: index.php');
exit;
