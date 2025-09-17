<?php
// procesar.php — PHP 5.4.31 compatible, sin PHPExcel

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Asegura carpetas
if (!is_dir('uploads'))    { @mkdir('uploads'); }
if (!is_dir('resultados')) { @mkdir('resultados'); }

// Validar subida
if (
    !isset($_FILES['archivo1']) || !isset($_FILES['archivo2']) ||
    $_FILES['archivo1']['error'] !== UPLOAD_ERR_OK ||
    $_FILES['archivo2']['error'] !== UPLOAD_ERR_OK
) {
    die("❌ Debes subir ambos archivos: el 'Excel' (con XML interno) y el TXT.");
}

// Guardar archivos subidos
$xls_tmp = $_FILES['archivo1']['tmp_name']; // "Excel" con XML/HTML dentro
$txt_tmp = $_FILES['archivo2']['tmp_name']; // consultaHLR.txt

$xls_name = 'uploads/xls_' . time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/','_', $_FILES['archivo1']['name']);
$txt_name = 'uploads/txt_' . time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/','_', $_FILES['archivo2']['name']);

move_uploaded_file($xls_tmp, $xls_name);
move_uploaded_file($txt_tmp, $txt_name);

// Leer contenido crudo del “xls” (en realidad texto/HTML/XML) y normalizar
$raw = file_get_contents($xls_name);
if ($raw === false) {
    die("❌ No se pudo leer el archivo de 'Excel'.");
}

// Decodificar entidades HTML (&lt; &gt; &amp; etc.) y pasar a minúsculas
$contenido_xls = html_entity_decode($raw, ENT_QUOTES, 'UTF-8');
$contenido_xls = strtolower($contenido_xls);

// Para hacer las búsquedas más robustas, removemos saltos de línea extra
$contenido_xls = preg_replace('/\s+/', ' ', $contenido_xls);

// Cargar líneas del TXT (MSISDNs), limpiar y dejar únicos
$lineas_txt = file($txt_name, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
if ($lineas_txt === false) {
    die("❌ No se pudo leer el archivo TXT.");
}
foreach ($lineas_txt as $k => $v) {
    $lineas_txt[$k] = trim($v);
}
// Eliminar vacíos
$lineas_txt = array_values(array_filter($lineas_txt, 'strlen'));
// Dejar únicos
$lineas_txt = array_values(array_unique($lineas_txt));

// Comparar: buscar cada número del TXT dentro del contenido del “xls”
$resultado = array();
$vistos = array(); // para quitar duplicados por MSISDN

foreach ($lineas_txt as $numero) {
    // Normalizamos para búsqueda
    $needle = strtolower($numero);

    // Busca aparición directa del número dentro del XML/HTML
    $encontrado = (strpos($contenido_xls, $needle) !== false);

    if (!isset($vistos[$numero])) {
        $vistos[$numero] = true;
        $resultado[] = array($numero, $encontrado ? '✅ Encontrado' : '❌ No Encontrado');
    }
}

// Guardar CSV de salida
$csv_name = 'Resultado_ConsultaGTHLR_' . date('Ymd_His') . '.csv';
$csv_path = 'resultados/' . $csv_name;

$fp = fopen($csv_path, 'w');
if ($fp === false) {
    die("❌ No se pudo crear el archivo de resultados.");
}
// Encabezado
fputcsv($fp, array('MSISDN', 'Estado'));
// Filas
foreach ($resultado as $row) {
    fputcsv($fp, $row);
}
fclose($fp);

// Redirigir a index con el CSV para mostrar grid y permitir descarga
header('Location: index.php?archivo=' . urlencode($csv_name));
exit;
