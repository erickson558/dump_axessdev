<?php
// Protección simple contra flood de IPs (DDoS básico)

$ip = $_SERVER['REMOTE_ADDR'];
$time = time();
$limite = 60; // número de peticiones permitidas
$ventana = 60; // segundos (1 minuto)
$archivo_log = sys_get_temp_dir() . '/rate_' . md5($ip) . '.json';

// Leer datos previos
if (file_exists($archivo_log)) {
    $datos = json_decode(file_get_contents($archivo_log), true);
    if ($datos['inicio'] + $ventana < $time) {
        // Reiniciar
        $datos = ['inicio' => $time, 'conteo' => 1];
    } else {
        $datos['conteo']++;
    }
} else {
    $datos = ['inicio' => $time, 'conteo' => 1];
}

// Guardar datos
file_put_contents($archivo_log, json_encode($datos));

if ($datos['conteo'] > $limite) {
    http_response_code(429); // Too Many Requests
    echo "<h1>Demasiadas peticiones</h1><p>Inténtalo más tarde.</p>";
    exit;
}
?>
