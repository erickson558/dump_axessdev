<?php
require_once 'proteccion.php'; // Agregado aquí
session_start(); // Iniciar sesión

// Verificar si el usuario está autenticado
if (!isset($_SESSION['verificar']) || $_SESSION['verificar'] !== true) {
    header("Location: index.php");
    exit;
}

$paisesUsuario    = $_SESSION['pais'];
$usuarioConectado = $_SESSION['usuario'];

if (empty($_SESSION['csrf_token']) || !is_string($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrfToken = htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8');

function mostrarFila($codigo, $paisesUsuario) {
    if (in_array('CENAM', $paisesUsuario, true)) {
        return true;
    }
    return in_array($codigo, $paisesUsuario, true);
}
?>
<!DOCTYPE html>
<html lang="es" class="dark-mode">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dump AXESS</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/estilo.css">
  <style>
    #session-timer {
      position: fixed;
      top: 10px;
      left: 10px;
      background: #f8f8f8;
      color: #000;
      padding: 5px 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-family: Arial, sans-serif;
      font-size: 14px;
      z-index: 1000;
    }
    .dark-mode #session-timer {
      background: #333;
      color: #fff;
      border: 1px solid #555;
    }
    #usuario-conectado {
      text-align: center;
      font-family: Arial, sans-serif;
      font-size: 18px;
      color: #000;
      margin: 20px 0;
    }
    .dark-mode #usuario-conectado {
      color: #fff;
    }
    .btn-custom {
      padding: 8px 12px;
      margin: 2px;
    }
  </style>
  <script>
    (function() {
      document.documentElement.classList.add('dark-mode');
      localStorage.setItem('darkMode', 'true');
    })();
  </script>
</head>
<body>
  <button id="theme-toggle">Modo Claro</button>
  <form method="post" action="logout.php" style="position: absolute; top: 10px; right: 10px;">
    <input type="submit" class="btn-logout" value="Logout">
  </form>

  <div id="usuario-conectado">
    Usuario: <?php echo htmlspecialchars($usuarioConectado, ENT_QUOTES, 'UTF-8'); ?>
  </div>

  <div id="session-timer">Tiempo para que expire la sesión: 5m 00s</div>

  <h3 align="center">Generación Dump AXESS</h3>
  <table align="center" border="3" cellpadding="10">

    <?php
    $bloques = [
      'GT' => ['GT4' => 'Internet v2', 'GT2' => 'Voz', 'GT3' => 'IP Pública', 'GT5' => 'Valores Pendientes', 'GT6' => 'Reporte VOC GT'],
      'SV' => ['SV4' => 'Internet v2', 'SV2' => 'Voz', 'SV3' => 'IP Pública', 'SV5' => 'Valores Pendientes', 'SV6' => 'Reporte Firmware SV'],
      'HN' => ['HN4' => 'Internet v2', 'HN2' => 'Voz', 'HN3' => 'IP Pública', 'HN5' => 'Valores Pendientes'],
      'NI' => ['NI4' => 'Internet v2', 'NI2' => 'Voz', 'NI3' => 'IP Pública', 'NI5' => 'Valores Pendientes']
    ];
    foreach ($bloques as $codigo => $botones) {
      if (mostrarFila($codigo, $paisesUsuario)) {
        echo "<tr><td width='100' align='center' height='50'><h4>" . htmlspecialchars($codigo) . "</h4></td>";
        foreach ($botones as $code => $label) {
          echo "<td width='160' align='center' height='50'>
                  <form method='post' action='paises.php' data-label=\"$label\">
                    <input type='hidden' name='csrf_token' value='$csrfToken'>
                    <input type='hidden' name='pais' value='$code'>
                    <input type='submit' class='btn-custom' value='$label'>
                  </form>
                </td>";
        }
        echo "</tr>";
      }
    }
    ?>
  </table>

  <script src="bootstrap/js/jquery-3.3.1.js"></script>
  <script>
    var remaining = 300;
    function updateTimerDisplay() {
      var m = Math.floor(remaining/60),
          s = ('0' + (remaining % 60)).slice(-2);
      document.getElementById('session-timer').textContent =
        'Tiempo para que expire la sesión: ' + m + 'm ' + s + 's';
    }
    function resetTimer() {
      remaining = 300;
      updateTimerDisplay();
    }
    var timerId = setInterval(function() {
      remaining--;
      if (remaining <= 0) {
        clearInterval(timerId);
        window.location.href = 'logout.php';
      } else {
        updateTimerDisplay();
      }
    }, 1000);
    ['mousemove','keydown','scroll','touchstart']
      .forEach(evt => document.addEventListener(evt, resetTimer, false));
    updateTimerDisplay();

    var themeToggle = document.getElementById('theme-toggle'),
        html        = document.documentElement;
    function updateTheme() {
      themeToggle.textContent = html.classList.contains('dark-mode')
        ? 'Modo Claro' : 'Modo Oscuro';
    }
    themeToggle.addEventListener('click', function() {
      html.classList.toggle('dark-mode');
      updateTheme();
    });
    updateTheme();

    // Logging de clics antes de envío de formulario
    document.querySelectorAll("form[data-label]").forEach(form => {
      form.addEventListener("submit", function (e) {
        e.preventDefault();
        const label = form.getAttribute("data-label");
        fetch('log_click.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
          body: 'elemento=' + encodeURIComponent(label)
        }).finally(() => {
          setTimeout(() => form.submit(), 150);
        });
      });
    });
  </script>
</body>
</html>
