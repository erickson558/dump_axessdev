<?php
// File: log_click.php

// Inicia la sesión si no se ha iniciado
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Directorio y archivo de log
$logDir   = __DIR__ . '/logs';
$logFile  = $logDir . '/click.log';

// Asegurarse de que exista el directorio
if (!is_dir($logDir)) {
    mkdir($logDir, 0755, true);
}

// Obtener datos
$ip        = $_SERVER['REMOTE_ADDR'];
$usuario   = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'Invitado';
$pagina    = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'Desconocido';
$elemento  = isset($_POST['elemento']) ? $_POST['elemento'] : 'No especificado';
$hora      = date('Y-m-d H:i:s');

// Formatear línea
$line = "[$hora] IP: $ip | Usuario: $usuario | Página: $pagina | Elemento: $elemento" . PHP_EOL;

// Escribir
$bytes = file_put_contents($logFile, $line, FILE_APPEND | LOCK_EX);
if ($bytes === false) {
    error_log("ERROR al escribir en el log de clicks: $logFile");
}
