<?php
// File: paises.php

// ─── DEBUG: mostrar errores en pantalla ────────────────────────
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// ─── Sesión y seguridad ────────────────────────────────────────
session_set_cookie_params(0, '/', '', false, true);
require_once 'proteccion.php'; // Agregado aquí
session_start();

// ─── Autenticación ─────────────────────────────────────────────
if (empty($_SESSION['verificar']) || $_SESSION['verificar'] !== true) {
    header('Location: index.php');
    exit;
}

// ─── Solo POST ─────────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Método no permitido');
}

// ─── CSRF ───────────────────────────────────────────────────────
if (
    empty($_POST['csrf_token'])
 || empty($_SESSION['csrf_token'])
 || $_POST['csrf_token'] !== $_SESSION['csrf_token']
) {
    http_response_code(400);
    exit('Error: CSRF token inválido');
}

// ─── Includes ──────────────────────────────────────────────────
require_once __DIR__ . '/excel/Classes/PHPExcel.php';
require_once __DIR__ . '/spout/src/Spout/Autoloader/autoload.php';
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;

// ─── Conexión MySQLi ────────────────────────────────────────────
$conexion = mysqli_connect('10.233.59.38','Claro','R$9v4@p!X2','live');
if (!$conexion) {
    http_response_code(500);
    exit('Error de conexión MySQL: ' . mysqli_connect_error());
}

// ─── Parámetros ─────────────────────────────────────────────────
$pais      = $_POST['pais'];
$timestamp = date('dmY_His');

// ─── Abrir CSV al navegador ─────────────────────────────────────
function start_csv($filename, $columns) {
    header('Content-Type: text/csv; charset=UTF-8');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    $writer = WriterFactory::create(Type::CSV);
    $writer->openToBrowser($filename);
    $writer->addRow($columns);
    return $writer;
}

// ─── Lógica por país ────────────────────────────────────────────
if ($pais === 'GT1') {
    $filename = "Internet_GT_{$timestamp}.csv";
    $columns  = ['value1','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype'];
    $query    = "
        SELECT value1,cpeid,cid,cid2,value2,statusService,realStatusOfService,realStatusDetails,servicetype
        FROM AXServiceTable
        WHERE serviceType='Internet' and value1 is not null
          AND cpeid IN (SELECT cpeid FROM CPEManager_CPEs WHERE cid='GT')
    ";
}
elseif ($pais === 'GT2') {
    $filename = "Voice_GT_{$timestamp}.csv";
    $columns  = ['value1','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype'];
    $query    = "
        SELECT value1,cpeid,cid,cid2,value2,statusService,realStatusOfService,realStatusDetails,servicetype
        FROM AXServiceTable
        WHERE serviceType='Voice'
          AND cpeid IN (SELECT cpeid FROM CPEManager_CPEs WHERE cid='GT')
    ";
}
elseif ($pais === 'GT3') {
    $filename = "StaticIP_GT_{$timestamp}.csv";
    $columns  = ['value3','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype'];
    $query    = "
        SELECT value3,cpeid,cid,cid2,value2,statusService,realStatusOfService,realStatusDetails,servicetype
        FROM AXServiceTable
        WHERE serviceType='StaticIP'
          AND cpeid IN (SELECT cpeid FROM CPEManager_CPEs WHERE cid='GT')
    ";
}
elseif ($pais === 'GT4') {
    $filename = "Internet_V2_GT_{$timestamp}.csv";
    $columns  = ['value1','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype','path'];
    $query    = "
        SELECT a.value1,a.cpeid,a.cid,a.cid2,a.value2,
               a.statusService,a.realStatusOfService,a.realStatusDetails,
               a.servicetype,b.path
        FROM AXServiceTable a
        JOIN CPEManager_CPEs b ON a.cpeid=b.cpeid
        WHERE serviceType='Internet' and value1 is not null
          AND a.cpeid IN (SELECT cpeid FROM CPEManager_CPEs WHERE cid='GT')
    ";
}
elseif ($pais === 'GT5') {
    $filename = "ValoresPendientes_GT_{$timestamp}.csv";
    $columns  = ['value1','value1pending','cpeid','cid','cid2','value2','servicetype','statusService','path'];
    $query    = "
        SELECT a.value1,a.value1pending,a.cpeid,a.cid,a.cid2,a.value2,a.servicetype,a.statusService,b.path
        FROM AXServiceTable a
        JOIN CPEManager_CPEs b ON a.cpeid=b.cpeid
        WHERE a.serviceType='Internet'
          AND a.cpeid IN (SELECT cpeid FROM CPEManager_CPEs WHERE cid='GT')
          AND a.value1pending IS NOT NULL
          
    ";
}
elseif ($pais === 'GT6') {
    $filename = "AxsrvInetHfcGTFW_{$timestamp}.csv";
    $columns  = ['pais','marca','modelo','firmware','mac_cm','cm_ip','cliente','virtual','velocidad','capa','seguridad','srvstat','srvrealstat'];
    $query    = "
        SELECT cpe.cid   AS pais,
               SUBSTR(TRIM(cpe.version),1,INSTR(cpe.version,'_')-1) AS firmware,
               cpe.ip    AS cm_ip,
               cpe.cpeid AS mac_cm,
               srv.cid2  AS cliente,
               srv.cid   AS virtual,
               srv.value1 AS velocidad,
               srv.value2 AS capa,
               srv.value3 AS seguridad,
               srv.statusService,
               srv.realStatusOfService,
               cpe.props
        FROM CPEManager_CPEs cpe
        LEFT JOIN AXServiceTable   srv ON cpe.cpeid=srv.cpeid
        WHERE srv.serviceType='Internet'
          AND cpe.cid='GT'
    ";
}

// El Salvador
elseif ($pais === 'SV1') {
    $filename = "Internet_SV_{$timestamp}.csv";
    $columns  = ['value1','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype'];
    $query    = "
        SELECT value1,cpeid,cid,cid2,value2,statusService,realStatusOfService,realStatusDetails,servicetype
        FROM AXServiceTable
        WHERE serviceType='Internet' and value1 is not null
          AND cpeid IN (SELECT cpeid FROM CPEManager_CPEs WHERE cid='SV')
    ";
}
elseif ($pais === 'SV2') {
    $filename = "Voice_SV_{$timestamp}.csv";
    $columns  = ['value1','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype'];
    $query    = "
        SELECT value1,cpeid,cid,cid2,value2,statusService,realStatusOfService,realStatusDetails,servicetype
        FROM AXServiceTable
        WHERE serviceType='Voice'
          AND cpeid IN (SELECT cpeid FROM CPEManager_CPEs WHERE cid='SV')
    ";
}
elseif ($pais === 'SV3') {
    $filename = "StaticIP_SV_{$timestamp}.csv";
    $columns  = ['value3','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype'];
    $query    = "
        SELECT value3,cpeid,cid,cid2,value2,statusService,realStatusOfService,realStatusDetails,servicetype
        FROM AXServiceTable
        WHERE serviceType='StaticIP'
          AND cpeid IN (SELECT cpeid FROM CPEManager_CPEs WHERE cid='SV')
    ";
}
elseif ($pais === 'SV4') {
    $filename = "Internet_V2_SV_{$timestamp}.csv";
    $columns  = ['value1','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype','path'];
    $query    = "
        SELECT a.value1,a.cpeid,a.cid,a.cid2,a.value2,a.statusService,a.realStatusOfService,a.realStatusDetails,a.servicetype,b.path
        FROM AXServiceTable a
        JOIN CPEManager_CPEs b ON a.cpeid=b.cpeid
        WHERE serviceType='Internet' and value1 is not null
          AND a.cpeid IN (SELECT cpeid FROM CPEManager_CPEs WHERE cid='SV')
    ";
}
elseif ($pais === 'SV5') {
    $filename = "ValoresPendientes_SV_{$timestamp}.csv";
    $columns  = ['value1','value1pending','cpeid','cid','cid2','value2','servicetype','statusService','path'];
    $query    = "
        SELECT a.value1,a.value1pending,a.cpeid,a.cid,a.cid2,a.value2,a.servicetype,a.statusService,b.path
        FROM AXServiceTable a
        JOIN CPEManager_CPEs b ON a.cpeid=b.cpeid
        WHERE a.serviceType='Internet'
          AND a.cpeid IN (SELECT cpeid FROM CPEManager_CPEs WHERE cid='SV')
          AND a.value1pending IS NOT NULL
          AND a.value1        IS  NULL
    ";
}
elseif ($pais === 'SV6') {
    $filename = "ReporteFirmwareSV_{$timestamp}.csv";
    $columns  = ['pais','marca','modelo','firmware','mac_cm','cm_ip','cliente','virtual','velocidad','capa','seguridad','srvstat','srvrealstat'];
    $query    = "
        SELECT cpe.cid   AS pais,
               SUBSTR(TRIM(cpe.version),1,INSTR(cpe.version,'_')-1) AS firmware,
               cpe.ip    AS cm_ip,
               cpe.cpeid AS mac_cm,
               srv.cid2  AS cliente,
               srv.cid   AS virtual,
               srv.value1 AS velocidad,
               srv.value2 AS capa,
               srv.value3 AS seguridad,
               srv.statusService,
               srv.realStatusOfService,
               cpe.props
        FROM CPEManager_CPEs cpe
        LEFT JOIN AXServiceTable   srv ON cpe.cpeid=srv.cpeid
        WHERE srv.serviceType='Internet'
          AND cpe.cid='SV'
    ";
}

// Honduras
elseif ($pais === 'HN1') {
    $filename = "Internet_HN_{$timestamp}.csv";
    $columns  = ['value1','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype'];
    $query    = "
        SELECT a.value1,a.cpeid,a.cid,a.cid2,a.value2,a.statusService,a.realStatusOfService,a.realStatusDetails,a.servicetype
        FROM AXServiceTable a
        JOIN CPEManager_CPEs b ON a.cpeid=b.cpeid
        WHERE serviceType='Internet' and value1 is not null
          AND a.cpeid IN (SELECT cpeid FROM CPEManager_CPEs WHERE cid='HN')
    ";
}
elseif ($pais === 'HN2') {
    $filename = "Voice_HN_{$timestamp}.csv";
    $columns  = ['value1','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype'];
    $query    = "
        SELECT value1,cpeid,cid,cid2,value2,statusService,realStatusOfService,realStatusDetails,servicetype
        FROM AXServiceTable
        WHERE serviceType='Voice'
          AND cpeid IN (SELECT cpeid FROM CPEManager_CPEs WHERE cid='HN')
    ";
}
elseif ($pais === 'HN3') {
    $filename = "StaticIP_HN_{$timestamp}.csv";
    $columns  = ['value3','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype'];
    $query    = "
        SELECT value3,cpeid,cid,cid2,value2,statusService,realStatusOfService,realStatusDetails,servicetype
        FROM AXServiceTable
        WHERE serviceType='StaticIP'
          AND cpeid IN (SELECT cpeid FROM CPEManager_CPEs WHERE cid='HN')
    ";
}
elseif ($pais === 'HN4') {
    $filename = "Internet_V2_HN_{$timestamp}.csv";
    $columns  = ['value1','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype','path'];
    $query    = "
        SELECT a.value1,a.cpeid,a.cid,a.cid2,a.value2,a.statusService,a.realStatusOfService,a.realStatusDetails,a.servicetype,b.path
        FROM AXServiceTable a
        JOIN CPEManager_CPEs b ON a.cpeid=b.cpeid
        WHERE serviceType='Internet' and value1 is not null
          AND a.cpeid IN (SELECT cpeid FROM CPEManager_CPEs WHERE cid='HN')
    ";
}
elseif ($pais === 'HN5') {
    $filename = "ValoresPendientes_HN_{$timestamp}.csv";
    $columns  = ['value1','value1pending','cpeid','cid','cid2','value2','servicetype','statusService','path'];
    $query    = "
        SELECT a.value1,a.value1pending,a.cpeid,a.cid,a.cid2,a.value2,a.servicetype,a.statusService,b.path
        FROM AXServiceTable a
        JOIN CPEManager_CPEs b ON a.cpeid=b.cpeid
        WHERE a.serviceType='Internet'
          AND a.cpeid IN (SELECT cpeid FROM CPEManager_CPEs WHERE cid='HN')
          AND a.value1pending IS NOT NULL
          AND a.value1        IS NULL
    ";
}

// Nicaragua
elseif ($pais === 'NI1') {
    $filename = "Internet_NI_{$timestamp}.csv";
    $columns  = ['value1','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype'];
    $query    = "
        SELECT value1,cpeid,cid,cid2,value2,statusService,realStatusOfService,realStatusDetails,servicetype
        FROM AXServiceTable
        WHERE serviceType='Internet' and value1 is not null
          AND cpeid IN (SELECT cpeid FROM CPEManager_CPEs WHERE cid='NI')
    ";
}
elseif ($pais === 'NI2') {
    $filename = "Voice_NI_{$timestamp}.csv";
    $columns  = ['value1','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype'];
    $query    = "
        SELECT value1,cpeid,cid,cid2,value2,statusService,realStatusOfService,realStatusDetails,servicetype
        FROM AXServiceTable
        WHERE serviceType='Voice'
          AND cpeid IN (SELECT cpeid FROM CPEManager_CPEs WHERE cid='NI')
    ";
}
elseif ($pais === 'NI3') {
    $filename = "StaticIP_NI_{$timestamp}.csv";
    $columns  = ['value3','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype'];
    $query    = "
        SELECT value3,cpeid,cid,cid2,value2,statusService,realStatusOfService,realStatusDetails,servicetype
        FROM AXServiceTable
        WHERE serviceType='StaticIP'
          AND cpeid IN (SELECT cpeid FROM CPEManager_CPEs WHERE cid='NI')
    ";
}
elseif ($pais === 'NI4') {
    $filename = "Internet_V2_NI_{$timestamp}.csv";
    $columns  = ['value1','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype','path'];
    $query    = "
        SELECT a.value1,a.cpeid,a.cid,a.cid2,a.value2,a.statusService,a.realStatusOfService,a.realStatusDetails,a.servicetype,b.path
        FROM AXServiceTable a
        JOIN CPEManager_CPEs b ON a.cpeid=b.cpeid
        WHERE serviceType='Internet' and value1 is not null
          AND a.cpeid IN (SELECT cpeid FROM CPEManager_CPEs WHERE cid='NI')
    ";
}
elseif ($pais === 'NI5') {
    $filename = "ValoresPendientes_NI_{$timestamp}.csv";
    $columns  = ['value1','value1pending','cpeid','cid','cid2','value2','servicetype','statusService','path'];
    $query    = "
        SELECT a.value1,a.value1pending,a.cpeid,a.cid,a.cid2,a.value2,a.servicetype,a.statusService,b.path
        FROM AXServiceTable a
        JOIN CPEManager_CPEs b ON a.cpeid=b.cpeid
        WHERE a.serviceType='Internet'
          AND a.cpeid IN (SELECT cpeid FROM CPEManager_CPEs WHERE cid='NI')
          AND a.value1pending IS NOT NULL
          AND a.value1        IS NULL
    ";
}
else {
    exit("Código de país no soportado: {$pais}");
}

// ─── Generar y enviar CSV ──────────────────────────────────────
$writer = start_csv($filename, $columns);

$result = mysqli_query($conexion, $query);
if (!$result) {
    exit("Error en consulta: " . mysqli_error($conexion));
}
while ($data = mysqli_fetch_assoc($result)) {
    $row = [];
    foreach ($columns as $col) {
        $row[] = isset($data[$col]) ? $data[$col] : '';
    }
    $writer->addRow($row);
}
mysqli_free_result($result);
$writer->close();
mysqli_close($conexion);
exit;
