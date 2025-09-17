<?php
include('log.php');

// Cookies de sesión (ajusta secure a true si usas HTTPS)
session_set_cookie_params(0, '/', '', false, true);
require_once 'proteccion.php'; // Agregado aquí
session_start();

// Generar CSRF y recovery token si no existen
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(openssl_random_pseudo_bytes(32));
}
if (empty($_SESSION['pw_recovery_token'])) {
    $_SESSION['pw_recovery_token'] = bin2hex(openssl_random_pseudo_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Recuperar Contraseña</title>

  <!-- Fuentes y estilos -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/estilo.css">

  <style>
    .password-container {
      position: relative;
      width: 100%;
    }
    .password-container input {
      width: 100%;
      padding-right: 70px;
      box-sizing: border-box;
    }
    .toggle-password {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #007BFF;
      font-size: 0.9em;
      user-select: none;
    }
  </style>
</head>
<body>
  <!-- Botón de Modo Claro / Oscuro -->
  <button id="theme-toggle" style="position:absolute; top:10px; right:10px;">
    Modo Claro
  </button>

  <!-- Botón para regresar al inicio -->
  <div style="position: absolute; top: 10px; left: 10px;">
    <button onclick="window.location.href='index.php'" class="register btn-custom">
      Regresar al Inicio
    </button>
  </div>

  <h1>Recuperación de Contraseña</h1>
  <form name="recovery" method="post" action="update_password.php">
    <input type="hidden" name="csrf_token"
           value="<?php echo htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="recovery_token"
           value="<?php echo htmlspecialchars($_SESSION['pw_recovery_token'], ENT_QUOTES, 'UTF-8'); ?>">

    <div class="form_row">
      <label class="contact"><strong>Usuario:</strong></label>
      <input type="text"
             name="user"
             class="contact_input"
             required
             style="text-transform: lowercase;"
             oninput="this.value = this.value.toLowerCase();" />
    </div>

    <div class="form_row">
      <label class="contact"><strong>Nueva Contraseña:</strong></label>
      <div class="password-container">
        <input type="password"
               name="new_pass"
               id="new_pass"
               class="contact_input"
               required
               pattern=".{8,}"
               title="Mínimo 8 caracteres">
        <span class="toggle-password"
              id="toggleNewPass"
              onclick="togglePassword('new_pass','toggleNewPass')">Mostrar</span>
      </div>
    </div>

    <div class="form_row">
      <label class="contact"><strong>Confirmar Contraseña:</strong></label>
      <div class="password-container">
        <input type="password"
               name="confirm_pass"
               id="confirm_pass"
               class="contact_input"
               required>
        <span class="toggle-password"
              id="toggleConfirmPass"
              onclick="togglePassword('confirm_pass','toggleConfirmPass')">Mostrar</span>
      </div>
    </div>

    <div class="form_row">
      <input type="submit" class="register btn-custom" value="Actualizar Contraseña">
    </div>
  </form>

  <script>
    // Aplicar modo oscuro si ya estaba guardado
    (function() {
      var dark = localStorage.getItem('darkMode') === 'true';
      document.documentElement.classList.toggle('dark-mode', dark);
    })();

    // Toggle claro/oscuro
    const themeToggle = document.getElementById('theme-toggle');
    function updateThemeButton() {
      const isDark = document.documentElement.classList.contains('dark-mode');
      themeToggle.textContent = isDark ? 'Modo Claro' : 'Modo Oscuro';
      localStorage.setItem('darkMode', isDark);
    }
    themeToggle.addEventListener('click', function() {
      document.documentElement.classList.toggle('dark-mode');
      updateThemeButton();
    });
    updateThemeButton();

    // Mostrar / ocultar contraseña
    function togglePassword(inputId, toggleId) {
      const input = document.getElementById(inputId);
      const toggleElem = document.getElementById(toggleId);
      if (input.type === 'password') {
        input.type = 'text';
        toggleElem.textContent = 'Ocultar';
      } else {
        input.type = 'password';
        toggleElem.textContent = 'Mostrar';
      }
    }

    // Mostrar alerts de success/error
    function showAlert(message, type) {
      const div = document.createElement('div');
      div.className = 'alert ' + type;
      div.textContent = message;
      document.body.appendChild(div);
      setTimeout(() => div.remove(), 5000);
    }
    window.onload = function() {
      const params = new URLSearchParams(window.location.search);
      if (params.get('success')) {
        showAlert(params.get('success'), 'success');
        setTimeout(() => window.location.href='index.php', 3000);
      }
      if (params.get('error')) {
        showAlert(params.get('error'), 'error');
      }
    };

    // Registro de clics
    document.addEventListener('click', function(e) {
      const clickable = e.target.closest('a, button, input[type="submit"], input[type="button"]');
      if (!clickable) return;
      const name = clickable.getAttribute('data-button') || clickable.value || clickable.innerText.trim();
      const data = new URLSearchParams();
      data.append('button', name);
      if (navigator.sendBeacon) {
        navigator.sendBeacon('log_click.php', data);
      } else {
        fetch('log_click.php', {
          method: 'POST',
          headers: {'Content-Type':'application/x-www-form-urlencoded'},
          body: data.toString()
        });
      }
    });
  </script>
</body>
</html>
