<?php
// File: index.php

// ── Polyfill random_bytes() para PHP < 7 ────────────────────────
if (!function_exists('random_bytes')) {
    function random_bytes($length) {
        if (function_exists('openssl_random_pseudo_bytes')) {
            return openssl_random_pseudo_bytes($length);
        }
        $bytes = '';
        for ($i = 0; $i < $length; $i++) {
            $bytes .= chr(mt_rand(0, 255));
        }
        return $bytes;
    }
}

// ── Security headers (permitimos inline para que tu JS/CSS funcione) ──
header("Content-Security-Policy: "
     . "default-src 'self'; "
     . "script-src 'self' 'unsafe-inline' https://fonts.googleapis.com; "
     . "style-src  'self' 'unsafe-inline' https://fonts.googleapis.com; "
     . "frame-ancestors 'none';"
);
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");
header("Referrer-Policy: no-referrer");

// ── Cookies de sesión seguras (firma PHP < 7) ─────────────────────
session_set_cookie_params(
    0,    // hasta cerrar navegador
    '/',  // path
    '',   // domain
    true, // secure
    true  // httponly
);
require_once 'proteccion.php'; // Agregado aquí
session_start();

// ── Logger de accesos ────────────────────────────────────────────
include('log.php');

// ── CSRF token (si no existe o no es string) ─────────────────────
if (!isset($_SESSION['csrf_token']) || !is_string($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf_token'];
?>
<!DOCTYPE html>
<html lang="es" class="dark-mode">
<head>
  <meta charset="utf-8">
  <title>DUMPS AXESS REGIONAL</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/estilo.css">
  <style>
    /* Estilos para el input de texto */
    .contact_input {
      width: 100%;
      padding: 10px;
      font-size: 1em;
      box-sizing: border-box;
      background-color: #fff;
      color: #333;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    /* Autofill Webkit */
    input:-webkit-autofill,
    input:-webkit-autofill:focus,
    input:-webkit-autofill:hover {
      background-color: #ccc !important;
      -webkit-box-shadow: 0 0 0px 1000px #ccc inset;
      -webkit-text-fill-color: #333 !important;
    }
    /* Contenedor de la contraseña */
    .password-wrapper {
      position: relative;
      display: flex;
      align-items: center;
    }
    .password-wrapper input.contact_input {
      padding-right: 100px;
    }
    /* Botón Mostrar/Ocultar */
    .toggle-password {
      position: absolute;
      right: 10px;
      background: transparent;
      border: none;
      cursor: pointer;
      font-size: 0.9em;
      z-index: 2;
      color: #000;
    }
    .dark-mode .toggle-password {
      color: #fff;
    }
    /* Notificación */
    #notification {
      position: fixed;
      top: 80px;
      right: 10px;
      background-color: #f44336;
      color: white;
      padding: 10px;
      border-radius: 5px;
      display: none;
    }
  </style>
  <script>
    // Forzar modo oscuro siempre
    (function() {
      document.documentElement.classList.add('dark-mode');
      localStorage.setItem('darkMode', 'true');
    })();
  </script>
</head>
<body>
  <!-- Notificaciones -->
  <div id="notification"></div>

  <!-- Botón de tema -->
  <button id="theme-toggle">Modo Claro</button>

  <h1>DUMPS AXESS REGIONAL</h1>
  <form name="register" method="post" action="login.php">
    <!-- CSRF token oculto -->
    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token, ENT_QUOTES, 'UTF-8'); ?>" />

    <div class="form_row">
      <label class="contact"><strong>Username:</strong></label>
      <input
        type="text"
        name="user"
        class="contact_input"
        style="text-transform: lowercase;"
        oninput="this.value = this.value.toLowerCase();"
      />
    </div>

    <div class="form_row">
      <label class="contact"><strong>Password:</strong></label>
      <div class="password-wrapper">
        <input type="password" id="pass" name="pass" class="contact_input" />
        <button type="button" class="toggle-password" onclick="togglePassword()">Mostrar</button>
      </div>
    </div>

    <div class="form_row">
      <div class="terms">
        <input type="checkbox" name="terms" /> Recordarme
      </div>
    </div>

    <div class="form_row">
      <input type="submit" class="register btn-custom" value="login">
    </div>

    <div class="form_row">
      <a href="recuperar.php" class="forgot-password">¿Ha Olvidado su Contraseña?</a>
    </div>
  </form>

  <img src="assets/images/logoclaro.png" alt="Logo" class="logo">
  <footer>
    <p class="footer-text">Copyright© 2025 By Albert Osorio</p>
  </footer>

  <script>
    // Alternar contraseña
    function togglePassword() {
      const passInput = document.getElementById('pass');
      const toggleBtn = document.querySelector('.toggle-password');
      if (passInput.type === "password") {
        passInput.type = "text";
        toggleBtn.innerText = "Ocultar";
      } else {
        passInput.type = "password";
        toggleBtn.innerText = "Mostrar";
      }
    }

    // Delegación de eventos para registrar clics
    document.addEventListener('click', function(e) {
      const clickable = e.target.closest('a, button, input[type="submit"], input[type="button"]');
      if (clickable) {
        let elementName = clickable.getAttribute('data-button') || clickable.value || clickable.innerText.trim();
        const data = new URLSearchParams();
        data.append('button', elementName);
        if (navigator.sendBeacon) {
          navigator.sendBeacon('log_click.php', data);
        } else {
          fetch('log_click.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: data.toString()
          }).catch(error => console.error('Error al registrar el clic:', error));
        }
      }
    });

    // Mostrar notificación de error
    (function() {
      const urlParams = new URLSearchParams(window.location.search);
      const error = urlParams.get('error');
      if (error) {
        const notification = document.getElementById('notification');
        notification.textContent = error;
        notification.style.display = 'block';
        setTimeout(() => {
          notification.style.display = 'none';
        }, 5000);
      }
    })();

    // Actualizar tema
    const themeToggle = document.getElementById('theme-toggle');
    const htmlElement = document.documentElement;
    function updateTheme() {
      const isDarkMode = htmlElement.classList.contains('dark-mode');
      themeToggle.textContent = isDarkMode ? 'Modo Claro' : 'Modo Oscuro';
      localStorage.setItem('darkMode', isDarkMode);
    }
    themeToggle.addEventListener('click', () => {
      htmlElement.classList.toggle('dark-mode');
      updateTheme();
    });
    updateTheme();
  </script>
</body>
</html>
