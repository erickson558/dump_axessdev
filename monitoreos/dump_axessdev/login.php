<?php
// File: login.php

// ─── DEBUG ─────────────────────────────────────────────────────
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// ─── Sesión ────────────────────────────────────────────────────
session_set_cookie_params(0, '/', '', false, true);
require_once 'proteccion.php'; // Agregado aquí
session_start();

// ─── Logging de acceso ────────────────────────────────────────
require_once __DIR__ . '/log.php';

// ─── Conexión a Oracle via PDO_OCI ────────────────────────────
$tns = "
  (DESCRIPTION=
    (ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=172.16.68.252)(PORT=1521)))
    (CONNECT_DATA=(SERVICE_NAME=xexdb))
  )
";
try {
    $pdo = new PDO(
        "oci:dbname={$tns}",
        'gestion',
        '1234',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}

// ─── Recoger y validar input ───────────────────────────────────
$userInput = isset($_POST['user']) ? strtolower(trim($_POST['user'])) : '';
$passInput = isset($_POST['pass']) ? $_POST['pass'] : '';

if ($userInput === '' || $passInput === '') {
    header("Location: index.php?error=Debes llenar usuario y contraseña");
    exit;
}

// ─── Obtener registro de usuario ─────────────────────────────
$sql  = "SELECT USUARIO, CONTRASENA, PAIS, STATUS 
         FROM USUARIOSDUMP 
         WHERE LOWER(USUARIO) = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userInput]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    header("Location: index.php?error=El usuario no existe");
    exit;
}

// ─── Verificar estado ─────────────────────────────────────────
if ((int)$row['STATUS'] !== 1) {
    header("Location: index.php?error=El usuario se encuentra inactivo");
    exit;
}

// ─── Comparar contraseñas ──────────────────────────────────────
// Si la contraseña en BD es un hash SHA-256 (64 hex), lo comprobamos.
$dbPass = $row['CONTRASENA'];
if (preg_match('/^[0-9a-f]{64}$/i', $dbPass)) {
    // Generar hash de lo ingresado
    $inputHash = hash('sha256', $passInput);
    // Comparación en tiempo constante:
    $lenA = strlen($dbPass);
    $lenB = strlen($inputHash);
    $check = 0;
    if ($lenA === $lenB) {
        for ($i = 0; $i < $lenA; $i++) {
            $check |= ord($dbPass[$i]) ^ ord($inputHash[$i]);
        }
    } else {
        $check = 1;
    }
    $passOk = ($check === 0);
} else {
    // Texto plano (legacy)
    $passOk = ($passInput === $dbPass);
}

if (!$passOk) {
    header("Location: index.php?error=Usuario o Contraseña inválidos");
    exit;
}

// ─── Login exitoso ─────────────────────────────────────────────
$_SESSION['usuario']   = strtolower($row['USUARIO']);
$_SESSION['pais']      = explode(',', $row['PAIS']);
$_SESSION['verificar'] = true;

// Redirigir al dump
header("Location: dump.php");
exit;
