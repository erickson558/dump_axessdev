<?php
// File: update_password.php

// ─── DEBUG: mostrar errores ───────────────────────────────────
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// ─── Seguridad: cabeceras ─────────────────────────────────────
header("Content-Security-Policy: default-src 'self';");
header('X-Frame-Options: DENY');
header('X-Content-Type-Options: nosniff');

// ─── Sesión ─────────────────────────────────────────────────────
session_set_cookie_params(0, '/', '', false, true);
require_once 'proteccion.php'; // Agregado aquí
session_start();

// ─── Incluir logging ────────────────────────────────────────────
require_once __DIR__ . '/log.php';

try {
    // 1) Solo POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Método no permitido', 405);
    }

    // 2) CSRF
    if (
        empty($_POST['csrf_token']) ||
        empty($_SESSION['csrf_token']) ||
        $_POST['csrf_token'] !== $_SESSION['csrf_token']
    ) {
        throw new Exception('CSRF token inválido', 400);
    }

    // 3) Recovery token
    if (
        empty($_POST['recovery_token']) ||
        empty($_SESSION['pw_recovery_token']) ||
        $_POST['recovery_token'] !== $_SESSION['pw_recovery_token']
    ) {
        throw new Exception('Recovery token inválido', 400);
    }

    // 4) Recoger y validar campos
    $user         = isset($_POST['user'])         ? strtolower(trim($_POST['user'])) : '';
    $new_pass     = isset($_POST['new_pass'])     ? $_POST['new_pass']                : '';
    $confirm_pass = isset($_POST['confirm_pass']) ? $_POST['confirm_pass']            : '';

    if ($user === '' || $new_pass === '' || $confirm_pass === '') {
        throw new Exception('Todos los campos son requeridos');
    }
    if ($new_pass !== $confirm_pass) {
        throw new Exception('Las contraseñas no coinciden');
    }
    if (strlen($new_pass) < 8) {
        throw new Exception('La contraseña debe tener al menos 8 caracteres');
    }

    // 5) Hashear la contraseña (SHA-256 aquí; cambia a password_hash si actualizas PHP)
    $hashed_pass = hash('sha256', $new_pass);

    // 6) Conectar a Oracle
    $tns = "
    (DESCRIPTION=
      (ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=172.16.68.252)(PORT=1521)))
      (CONNECT_DATA=(SERVICE_NAME=xexdb))
    )";
    $pdo = new PDO(
        "oci:dbname={$tns}",
        'gestion',
        '1234',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    // 7) Actualizar usando placeholders posicionales
    $pdo->beginTransaction();
    $sql  = "UPDATE USUARIOSDUMP
             SET CONTRASENA = ?
             WHERE LOWER(USUARIO) = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$hashed_pass, $user]);

    if ($stmt->rowCount() === 0) {
        $pdo->rollBack();
        throw new Exception('Usuario no encontrado');
    }

    $pdo->commit();
    $msg    = 'Contraseña actualizada exitosamente';
    $status = 'success';

} catch (PDOException $e) {
    if (isset($pdo) && $pdo->inTransaction()) {
        $pdo->rollBack();
    }
    $msg    = 'Error de base de datos: ' . $e->getMessage();
    $status = 'error';

} catch (Exception $e) {
    $msg    = $e->getMessage();
    $status = 'error';
}

// 8) Redirigir de vuelta con mensaje
header("Location: recuperar.php?{$status}=" . urlencode($msg));
exit;
