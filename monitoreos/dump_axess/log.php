<?php
// File: log.php

// Inicia la sesión si aún no se ha iniciado
if (session_status() === PHP_SESSION_NONE) {
	require_once 'proteccion.php'; // Agregado aquí
    session_start();
}

// Directorio y archivo de log
$logDir  = __DIR__ . '/logs';
$logFile = $logDir . '/access.log';

// Asegurarse de que exista el directorio
if (!is_dir($logDir)) {
    mkdir($logDir, 0755, true);
}

function logAccess() {
    global $logFile;

    // Obtener la IP del usuario
    $ip = $_SERVER['REMOTE_ADDR'];

    // Nombre del usuario en sesión o Invitado
    $nombre = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'Invitado';

    // Sistema operativo a partir del User-Agent
    $ua = $_SERVER['HTTP_USER_AGENT'];
    if (stripos($ua, 'Windows') !== false) {
        $so = 'Windows';
    } elseif (stripos($ua, 'Mac') !== false) {
        $so = 'Mac OS';
    } elseif (stripos($ua, 'Linux') !== false) {
        $so = 'Linux';
    } else {
        $so = 'Desconocido';
    }

    // Página visitada
    $pagina = $_SERVER['REQUEST_URI'];

    // Fecha y hora
    $hora = date('Y-m-d H:i:s');

    // Línea de log
    $line = "[$hora] IP: $ip | Usuario: $nombre | SO: $so | Página: $pagina" . PHP_EOL;

    // Escribir con FILE_APPEND y bloqueo
    $bytes = file_put_contents($logFile, $line, FILE_APPEND | LOCK_EX);
    if ($bytes === false) {
        error_log("ERROR al escribir en el log de accesos: $logFile");
    }
}

// Llamar a la función
logAccess();
