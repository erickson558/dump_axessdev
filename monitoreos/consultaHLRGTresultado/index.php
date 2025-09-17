<?php
// index.php — UI con efectos/animaciones y grid
$archivo_csv = isset($_GET['archivo']) ? 'resultados/' . basename($_GET['archivo']) : '';
$datos = array();

// Cargar CSV si existe
if ($archivo_csv && file_exists($archivo_csv)) {
    if (($h = fopen($archivo_csv, 'r')) !== false) {
        while (($row = fgetcsv($h, 10000, ',')) !== false) {
            $datos[] = $row;
        }
        fclose($h);
    }
    // Quitar duplicados por fila completa
    $uniq = array();
    $clean = array();
    foreach ($datos as $r) {
        $key = implode('|', $r);
        if (!isset($uniq[$key])) {
            $uniq[$key] = true;
            $clean[] = $r;
        }
    }
    $datos = $clean;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Comparador Consulta HLR GT, MSISDN vs HLR (XML en XLS)</title>

<!-- Tipografías -->
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- Animaciones -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<style>
:root{
  --violet:#6a5acd;
  --violet2:#7a6aff;
  --emerald:#22c55e;
  --bg1:#0b0b12;
  --bg2:#121225;
  --glass:rgba(255,255,255,.08);
}

/* ===== Fondo con partículas ===== */
body{
  margin:0; padding:32px 16px; color:#fff; font-family:'Inter',system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;
  min-height:100vh; overflow-x:hidden; position:relative;
  background:
    radial-gradient(1200px 600px at 10% 10%, rgba(122,106,255,0.18), transparent 60%),
    radial-gradient(1200px 600px at 90% 20%, rgba(106,90,205,0.18), transparent 60%),
    linear-gradient(135deg, var(--bg1), var(--bg2));
}
.wrap{ max-width:1150px; margin:0 auto; }

/* ===== Título ===== */
h1{
  font-family:'Cinzel',serif; font-size:2.6rem; text-align:center;
  color:#fff; text-shadow:0 10px 30px rgba(122,106,255,.38);
}
h1 .accent{
  background: linear-gradient(90deg, var(--violet), var(--violet2));
  -webkit-background-clip:text; background-clip:text; color:transparent;
}
.underline{
  width:220px; height:4px; margin:12px auto 28px; border-radius:999px;
  background: linear-gradient(90deg, transparent, var(--violet), var(--violet2), transparent);
  animation: shimmer 2.2s linear infinite;
}
@keyframes shimmer { 0%{background-position:-220px} 100%{background-position:220px} }

/* ===== Card ===== */
.card{
  background:var(--glass); border-radius:18px; padding:22px;
  box-shadow:0 18px 50px rgba(0,0,0,.35);
  border:1px solid rgba(255,255,255,.12); backdrop-filter: blur(10px);
}

/* ===== FILA 1: SOLO INPUTS (alineados) ===== */
.inputs-row{
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:24px;
  align-items:start; /* asegura alineación superior exacta */
}
.inputs-row .col{
  display:flex; flex-direction:column;
}
.inputs-row label{
  margin-bottom:6px;
  min-height:24px; /* iguala la altura visual de los labels */
}
.file{
  width:100%;
  background:#1a1a2a; color:#e5e7eb;
  border:1px solid rgba(255,255,255,.12);
  border-radius:12px; padding:12px;
}

/* ===== FILA 2: textos/ayuda y ejemplo ===== */
.info-row{
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:24px;
  align-items:start;
  margin-top:12px;
}
.hint{ opacity:.85; font-size:.92rem; }
pre.example{
  margin-top:8px;
  background:#111827;
  color:#a5b4fc;
  padding:8px;
  border-radius:8px;
  font-size:.9rem;
  white-space:pre-line;
}

/* ===== Botones ===== */
.btn{
  border:none; border-radius:28px; padding:12px 22px;
  cursor:pointer; font-weight:800;
}
.btn-primary{
  background:linear-gradient(135deg, var(--violet), var(--violet2));
  color:#fff;
}
.btn-success{
  background:linear-gradient(135deg, #16a34a, var(--emerald));
  color:#05140a;
}

/* ===== Loader ===== */
.loader{ position:fixed; inset:0; background:rgba(0,0,0,.55); display:none; align-items:center; justify-content:center; z-index:9999; }
.spinner{ width:70px; height:70px; border-radius:50%; border:6px solid rgba(255,255,255,.15);
  border-top-color: var(--violet2); animation: spin .9s linear infinite; }
@keyframes spin{ to{ transform: rotate(360deg); } }

/* ===== Tabla ===== */
table{ width:100%; background:#0f172a; border-radius:14px; overflow:hidden; }
thead{ background: linear-gradient(90deg, var(--violet), var(--violet2)); color:#fff; }
td,th{ text-align:center; padding:10px 8px; }
.badge{ padding:6px 12px; border-radius:999px; font-weight:800; font-size:.82rem; }
.ok{ background:rgba(34,197,94,.12); color:#86efac; }
.no{ background:rgba(244,63,94,.12); color:#fda4af; }

/* Responsive */
@media (max-width: 900px){
  .inputs-row, .info-row{ grid-template-columns:1fr !important; }
}
</style>
</head>
<body>
<div class="wrap">
  <h1 class="animate__animated animate__fadeInDown">📊 <span class="accent">Comparador de MSISDN</span> vs HLR</h1>
  <div class="underline"></div>

  <!-- FORMULARIO -->
  <div class="card animate__animated animate__fadeIn">
    <form id="frm" action="procesar.php" method="post" enctype="multipart/form-data">

      <!-- FILA 1: SOLO INPUTS (alineados) -->
      <div class="inputs-row">
        <div class="col">
          <label>Archivo “Excel” con XML/HTML por dentro (.xls / .xlsx / export HTML):</label>
          <input type="file" name="archivo1" class="file" accept=".xls,.xlsx,.xml,.html,.htm" required>
        </div>
        <div class="col">
          <label>Archivo TXT (consultaHLR.txt) — uno por línea:</label>
          <input type="file" name="archivo2" class="file" accept=".txt" required>
        </div>
      </div>

      <!-- FILA 2: textos de ayuda y ejemplo -->
      <div class="info-row">
        <div>
          <div class="hint">Se leerá como <b>texto</b>; se buscarán coincidencias de MSISDN.</div>
        </div>
        <div>
          <div class="hint">Cada línea debe ser un número MSISDN.</div>
          <pre class="example">Ejemplo:
50258269881
50259177643
50250123456</pre>
        </div>
      </div>

      <div style="margin-top:20px; text-align:center;">
        <button type="submit" class="btn btn-primary">🔍 Comparar ahora</button>
      </div>
    </form>
  </div>

  <!-- GRID DE RESULTADOS -->
  <?php if (!empty($datos) && count($datos) > 1): ?>
  <div class="card animate__animated animate__fadeInUp" style="margin-top:24px;">
    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:14px;">
      <h3 style="margin:0">Resultados</h3>
      <a class="btn btn-success" href="<?php echo htmlspecialchars($archivo_csv); ?>" id="btnDesc">⬇ Descargar CSV</a>
    </div>
    <table id="tabla" class="display nowrap">
      <thead>
        <tr><th>MSISDN</th><th>Estado</th></tr>
      </thead>
      <tbody>
      <?php
        for ($i=1; $i<count($datos); $i++) {
          $msisdn = isset($datos[$i][0]) ? $datos[$i][0] : '';
          $estado = isset($datos[$i][1]) ? $datos[$i][1] : '';
          $badgeClass = (stripos($estado, 'Encontrado') !== false) ? 'ok' : 'no';
          echo '<tr>';
          echo '<td>'.htmlspecialchars($msisdn).'</td>';
          echo '<td><span class="badge '.$badgeClass.'">'.htmlspecialchars($estado).'</span></td>';
          echo '</tr>';
        }
      ?>
      </tbody>
    </table>
  </div>
  <?php endif; ?>
</div>

<!-- Loader -->
<div class="loader" id="loader"><div class="spinner"></div></div>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
var frm = document.getElementById('frm');
if (frm){
  frm.addEventListener('submit', function(){
    document.getElementById('loader').style.display='flex';
  });
}

$(function(){
  if($('#tabla').length){
    $('#tabla').DataTable({
      pageLength: 25,
      responsive: true,
      scrollX: true,
      language: { url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json' }
    });
  }
});
</script>
</body>
</html>
