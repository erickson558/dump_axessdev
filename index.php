<?php
/**
 * Portal interactivo con animaciones avanzadas (CSS + JS ES5)
 * PHP 5.4 compatible — tipografía SanAndreasGTA intacta.
 */
$sites = array(
  array('name'=>'Dump Cablemodems Axess','url'=>'http://172.16.68.252:888/monitoreos/dump_axess/index.php','desc'=>'Monitoreo de Dump Axess en tiempo real'),
  array('name'=>'Crear Usuarios Dump','url'=>'http://172.16.68.252:888/monitoreos/usuariosdump/index.php','desc'=>'Listado y gestión de usuarios Dump'),
  array('name'=>'Comandos EDA','url'=>'http://172.16.68.252:888/monitoreos/comandos_eda.php','desc'=>'Panel de comandos EDA y su historial'),
  array('name'=>'Verificador IMSISGT','url'=>'http://172.16.68.252:888/monitoreos/verificadorimsisgt/verificador.php','desc'=>'Herramienta de verificación IMSISGT'),
  array('name'=>'ProcLog Analyzer CENAM Timeout','url'=>'http://172.16.68.252:888/monitoreos/procloganalizer/progloganalizer.php','desc'=>'Analizador de logs de ProgLog timeout'),
  array('name'=>'ProcLog Filter CENAM ','url'=>'http://172.16.68.252:888/monitoreos/proclogfilter/proclogfilter.php','desc'=>'Analizador de logs de ProcLog'),
  array('name'=>'Volte Analyzer CENAM','url'=>'http://172.16.68.252:888/monitoreos/consultaelementosGT/voltanalizer.php','desc'=>'Inspector de elementos VoLTE'),
  array('name'=>'Monitor de Host','url'=>'http://172.16.68.252:5000/','desc'=>'Dashboard de monitor de host'),
  array('name'=>'Alarms ARH Log Analyzer','url'=>'http://172.16.68.252:888/monitoreos/alarmslogeda/alarmloganalizer.php','desc'=>'Análisis de logs de alarmas ARH'),
  array('name'=>'Crear Velocidades AXESS','url'=>'http://172.16.68.252:5555/','desc'=>'Generador de perfiles de velocidad AXESS'),
  array('name'=>'Text Compare','url'=>'http://172.16.68.252:888/monitoreos/textcompare/','desc'=>'Comparador de textos en línea'),
  array('name'=>'Abrir Casos ITS','url'=>'https://helpdesk.itsinfocom.com/front/ticket.php','desc'=>'Portal de tickets ITSINFOCOM'),
  array('name'=>'Monitor de Tquerys GAIA','url'=>'http://172.16.68.252:888/monitoreos/monitoreotquerys/monitoreotquerys.php','desc'=>'Monitoreo T-Querys GAIA'),
  array('name'=>'Crear Dump Axess las Velocidades CENAM','url'=>'http://172.16.68.252:888/monitoreos/dumpvelocidadesaxess/dumpvelocidadesaxess.php','desc'=>'Dump Axess Velocidades'),
  array('name'=>'Envío Masivo de Bajas HFC TV CENAM','url'=>'http://172.16.68.252:888/monitoreos/bajaclientesHFCTVCENAM/','desc'=>'Baja HFC TV CENAM'),
  array('name'=>'Envío Masivo Bajas HFC Internet CENAM','url'=>'http://172.16.68.252:888/monitoreos/bajaHFCInternet/','desc'=>'Bajas Internet HFC CENAM'),
  array('name'=>'Envío Masivo Bajas HFC Voz CENAM','url'=>'http://172.16.68.252:888/monitoreos/bajaHFCtelefonia/','desc'=>'Bajas Voz HFC CENAM'),
  array('name'=>'Envío Masivo Bajas HFC Voz e Internet CENAM','url'=>'http://172.16.68.252:888/monitoreos/bajaHFCtelefoniainternet/','desc'=>'Bajas Voz e Internet HFC CENAM'),
  array('name'=>'Envío Masivo Bajas Clientes DTH TV CENAM','url'=>'http://172.16.68.252:888/monitoreos/bajaclientesDTH/','desc'=>'Bajas DTH TV clientes CENAM'),
  array('name'=>'Envío Masivo Bajas de paquetes de TV DTH CENAM','url'=>'http://172.16.68.252:888/monitoreos/bajapaquetesDTH/','desc'=>'Bajas paquetes DTH TV CENAM'),
  array('name'=>'Generar Passwords aleatorios','url'=>'http://172.16.68.252:888/monitoreos/passwordgenerator/','desc'=>'Password Generator'),
  array('name'=>'Analizador de Service Model entre Ambientes','url'=>'http://172.16.68.252:888/monitoreos/comparaSM/','desc'=>'Analizador entre Versiones Service Model EDA'),
  array('name'=>'Activar Volte Prepago / Postpago SV Másivo STBY','url'=>'http://172.16.68.252:888/monitoreos/activarvolteprepostSV/','desc'=>'Activar Volte Prepago / Postpago EDA SV'),
  array('name'=>'Crear en FNR con PT3 EDA GT','url'=>'http://172.16.68.252:888/monitoreos/createfnr3GT/','desc'=>'Crear FNR PT3 EDA GT'),
  array('name'=>'Crear Prepagos EDA GT','url'=>'http://172.16.68.252:888/monitoreos/crearprepagoGT/','desc'=>'Crear prepago GT'),
  array('name'=>'Agregar nuevos Pool CMTS AXESS','url'=>'http://172.16.68.252:888/monitoreos/addpoolCMAXESS/','desc'=>'Agregar Rangos IPs CMTS'),
  array('name'=>'Suspensión, Reactivación, y Cambio de Velocidad HFC AXESS CENAM','url'=>'http://172.16.68.252:888/monitoreos/usecaseAXESSCENAM/','desc'=>'Usecase AXESS HFC CENAM'),
  array('name'=>'Activar VoLTE Prepago / Postpago NI STBY','url'=>'http://172.16.68.252:888/monitoreos/activarvolteprepostNI/','desc'=>'Activar VOLTE Prepaid / PostPaid NI STBY'),
  array('name'=>'Bloqueo Servicios ADD 92 GT / Postpago NI STBY','url'=>'http://172.16.68.252:888/monitoreos/bloquearmovilGT/','desc'=>'Bloqueo Servicios GT add service 92'),
  array('name'=>'MultiFilter Proclog CENAM','url'=>'http://172.16.68.252:888/monitoreos/filterproclog/','desc'=>'MultiFilter Proclog CENAM Filtar varios campos'),
  array('name'=>'Reset VLR GT Masivo','url'=>'http://172.16.68.252:888/monitoreos/resetVLRGT/','desc'=>'Reset VLR GT masivo'),
  array('name'=>'Resultado de Consulta Masiva GT','url'=>'http://172.16.68.252:888/monitoreos/consultaHLRGTresultado/','desc'=>'Resultado de Consulta Masiva GT'),
  array('name'=>'Monitor de Logs de Procesos Automáticos','url'=>'http://172.16.68.252:888/monitoreos/monitorlogs/','desc'=>'Monitor Logs automáticos'),
  array('name'=>'Ver los SM Instalados en cada EDA CENAM','url'=>'http://172.16.68.252:888/monitoreos/monitorEDACENAM/','desc'=>'Ver los SM Instalados EDA CENAM'),
  array('name'=>'Trim Duplicados para SERVICES EDA CENAM','url'=>'http://172.16.68.252:888/monitoreos/trimduplicados/','desc'=>'Trim Duplicados para services EDA CENAM'),
);
$aosTypes = array('fade-up','flip-left','zoom-in','slide-right','flip-right','fade-down');
?><!doctype html>
<html lang="es" data-theme="dark">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>Syn's Animated Portal Most Wanted</title>

<!-- Font local GTA (NO se toca tipografía) -->
<style>
@font-face{
  font-family:'SanAndreasGTA';
  src:url('fonts/san-andreas.ttf') format('truetype');
  font-weight:normal; font-style:normal; font-display:swap;
}
</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet"/>
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

<style>
:root{
  --accent:#6a5acd; --accent2:#06b6d4;
  --bg:#0f1117; --text:#eef1f8; --muted:#a7b1c2; --card:rgba(22,26,38,.75);
  --shadow:rgba(0,0,0,.9); --url:#c5d2e3; --mark:rgba(255,238,0,.55);
  --ribbon1:#7c6aff; --ribbon2:#00d0ff; --particle:#6a5acd;
  --title-fill:#fff; --title-stroke:#000; --subtitle-fill:#fff;
}

/* Light */
html[data-theme="light"]{
  --bg:#f6f8ff; --text:#0b1121; --muted:#4b5567; --card:rgba(255,255,255,.78);
  --shadow:rgba(0,0,0,.25); --url:#2e4a86; --mark:rgba(255,210,0,.45);
  --ribbon1:#4f46e5; --ribbon2:#06b6d4; --particle:#4f46e5;
  --title-fill:#0b1121; --title-stroke:#fff; --subtitle-fill:#0b1121;
}

/* ===== Fondo animado con morph ===== */
body{
  margin:0; overflow-x:hidden; color:var(--text);
  background:
    radial-gradient(1200px 600px at 90% -10%, rgba(106,90,205,.18), transparent 50%),
    conic-gradient(from 0deg at 10% 10%, rgba(106,90,205,.12), transparent 35%, rgba(6,182,212,.12), transparent 70%, rgba(106,90,205,.12));
  background-size:cover, 200% 200%;
  animation:bgShift 18s ease-in-out infinite alternate;
  font-family:'Segoe UI',system-ui,Roboto,Arial,sans-serif;
  opacity:0; transform:translateY(10px);
}
@keyframes bgShift{0%{background-position: center, 0% 0%}100%{background-position: center, 100% 100%}}
body.ready{ opacity:1; transform:none; transition:opacity .6s ease, transform .6s ease }

#particles-js,#overlay{position:fixed; inset:0; pointer-events:none}
#particles-js{z-index:-2}
#overlay{z-index:-1;background:
  radial-gradient(1200px 700px at 10% 110%, rgba(6,182,212,.10), transparent 50%),
  radial-gradient(1000px 420px at 100% 0%, rgba(106,90,205,.15), transparent 60%);
}

/* ===== Barra progreso superior (scroll + AJAX) ===== */
#topProgress{position:fixed; top:0; left:0; height:3px; width:0; background:linear-gradient(90deg,var(--accent),var(--accent2));
  box-shadow:0 0 14px rgba(106,90,205,.6); z-index:2000; transition:width .25s ease, opacity .35s ease; opacity:0}

/* ===== Header ===== */
.header-wrap{perspective:1200px; opacity:0; transform:translateY(-10px)}
body.ready .header-wrap{opacity:1; transform:none; transition:opacity .6s .12s, transform .6s .12s}
h1.portal-header{
  font-family:'SanAndreasGTA',serif; text-align:center; margin:18px 0 6px; font-size:3.2rem;
  color:var(--title-fill); -webkit-text-fill-color:var(--title-fill); -webkit-text-stroke:2px var(--title-stroke);
  text-shadow:0 2px 0 rgba(0,0,0,.55), 0 6px 14px rgba(0,0,0,.35); transform:translateZ(30px);
}
p.subheader{
  font-family:'SanAndreasGTA',serif; text-align:center; margin:0 0 18px; font-size:1.05rem;
  color:var(--subtitle-fill); -webkit-text-fill-color:var(--subtitle-fill);
  text-shadow:0 1px 0 rgba(0,0,0,.35), 0 3px 10px rgba(0,0,0,.25);
  position:relative; display:inline-block; left:50%; transform:translateX(-50%);
}
p.subheader::after{
  content:""; position:absolute; inset:0; background:linear-gradient(100deg, transparent 20%, rgba(255,255,255,.35) 50%, transparent 80%);
  transform:translateX(-120%); animation:subShine 6s ease-in-out infinite; mix-blend-mode:soft-light; border-radius:6px;
}
@keyframes subShine{0%{transform:translateX(-120%)}60%{transform:translateX(120%)}100%{transform:translateX(120%)}}

/* ===== Toolbar ===== */
.toolbar{position:sticky; top:0; z-index:1030; background:linear-gradient(180deg, rgba(20,22,32,.75), rgba(20,22,32,.55));
  border-bottom:1px solid rgba(255,255,255,.08); backdrop-filter:blur(10px); opacity:0; transform:translateY(-8px)}
html[data-theme="light"] .toolbar{background:linear-gradient(180deg, rgba(255,255,255,.85), rgba(255,255,255,.65)); border-bottom:1px solid rgba(0,0,0,.06)}
body.ready .toolbar{opacity:1; transform:none; transition:opacity .5s .2s, transform .5s .2s}

.toolbar .form-control{background:linear-gradient(180deg,#151a26,#121624); color:#e6edf3; border:1px solid #2a3145; border-radius:12px 0 0 12px}
html[data-theme="light"] .toolbar .form-control{background:linear-gradient(180deg,#eef2f8,#e8eef9); color:#0c1020; border:1px solid #c9d3e3}
.toolbar .form-control:focus{box-shadow:0 0 0 .2rem rgba(106,90,205,.25), 0 0 20px rgba(106,90,205,.25)}
.input-group-text{border-radius:12px 0 0 12px; border:1px solid #2a3145}
.toolbar .btn{border-radius:12px; border-color:var(--accent); color:var(--accent); background:transparent; transition:.25s}
html[data-theme="dark"] .toolbar .btn{color:#efeaff; border-color:var(--accent)}
html[data-theme="light"] .toolbar .btn{color:#2e2a80; border-color:var(--accent)}
.toolbar .btn:hover{background:var(--accent); color:#000; transform:translateY(-1px); box-shadow:0 8px 20px rgba(106,90,205,.35)}
.counter-pill{display:inline-flex; align-items:center; gap:.35rem; padding:.35rem .6rem; border-radius:999px; font-size:.85rem; font-weight:700;
  background:rgba(106,90,205,.15); color:var(--text); border:1px solid rgba(106,90,205,.35); margin-left:8px}

/* ===== Cards ===== */
.card-portal{position:relative; background:var(--card); border:1px solid rgba(255,255,255,.06); border-radius:18px;
  box-shadow:0 34px 70px -30px var(--shadow); transition:transform .22s ease, box-shadow .25s ease, border-color .25s ease, filter .25s ease;
  will-change:transform, box-shadow, filter; overflow:hidden; backdrop-filter: blur(6px); animation:floaty 6s ease-in-out infinite}
@keyframes floaty{0%,100%{transform:translateY(0)}50%{transform:translateY(-4px)}}
.card-portal::before{content:""; position:absolute; inset:-1px; border-radius:20px; z-index:0;
  background:conic-gradient(from 140deg, rgba(106,90,205,.45), rgba(6,182,212,.45), rgba(106,90,205,.45));
  filter:blur(12px); opacity:.30; transition:opacity .25s ease, filter .25s ease}
.card-portal::after{content:""; position:absolute; top:-120%; left:-50%; width:220%; height:220%;
  background:linear-gradient(120deg, transparent 45%, rgba(255,255,255,.10) 50%, transparent 55%); transform:rotate(8deg); opacity:0; transition:.6s}
.card-portal:hover{transform:translateY(-8px) scale(1.012); box-shadow:0 50px 120px -40px var(--shadow), 0 0 12px rgba(106,90,205,.45); border-color:rgba(255,255,255,.14)}
.card-portal:hover::before{opacity:.6; filter:blur(10px)}
.card-portal:hover::after{transform:translateX(10%) rotate(8deg); opacity:1}
.card-portal.press{animation:cardPress .2s ease}
@keyframes cardPress{0%{transform:scale(.99)}70%{transform:translateY(-3px) scale(1.01)}100%{transform:translateY(-1px) scale(1)}}

/* Destellos en hover */
.card-portal .sparkles{position:absolute; inset:0; pointer-events:none; opacity:0; transition:.2s}
.card-portal:hover .sparkles{opacity:.9}
.sparkles::before,.sparkles::after{content:""; position:absolute; width:180%; height:2px; top:-10%; left:-40%;
  background:repeating-linear-gradient(90deg, rgba(255,255,255,.28) 0 10px, transparent 10px 20px);
  filter:blur(.6px); animation:sparkMove 2.6s linear infinite}
.sparkles::after{top:auto; bottom:-10%; animation-direction:reverse}
@keyframes sparkMove{from{transform:rotate(15deg) translateX(-10%)}to{transform:rotate(15deg) translateX(10%)}}

.tilt{transform-style:preserve-3d}
.tilt-inner{transform:translateZ(22px)}
.card-title{font-family:'SanAndreasGTA',serif; font-size:1.25rem; letter-spacing:.2px; text-shadow:0 0 6px rgba(106,90,205,.35); color:var(--text); transition:letter-spacing .2s ease}
.card-portal:hover .card-title{letter-spacing:.6px}
.card-url{color:var(--url); font-size:.9rem; word-break:break-all; opacity:.95}
.card-desc{color:var(--muted); line-height:1.35}

.ribbon{display:none; position:absolute; top:12px; right:-42px; transform:rotate(35deg);
  background:linear-gradient(90deg, var(--ribbon1), var(--ribbon2)); color:#fff; padding:2px 52px; font-size:.72rem; font-weight:800;
  letter-spacing:.35px; box-shadow:0 6px 14px -6px rgba(0,0,0,.6); z-index:5; border-radius:4px}
.matched .ribbon{display:block; animation:rbVibe 2.6s ease-in-out infinite}
@keyframes rbVibe{0%,100%{transform:rotate(35deg) translateY(0)}50%{transform:rotate(35deg) translateY(-1px)}}

.compact .card-body{padding:1rem !important}
.compact .card-title{font-size:1.1rem}
.compact .btn-go{padding:.45rem 1rem}

/* ===== Botón Ir al sitio ===== */
.btn-go{position:relative; display:inline-flex; align-items:center; justify-content:center; gap:.5rem; font-weight:900; text-transform:uppercase; letter-spacing:.25px;
  padding:.65rem 1.2rem; border-radius:.75rem; border:0; background:transparent; color:#fff !important; -webkit-text-fill-color:#fff;
  isolation:isolate; z-index:1; line-height:1.15; box-shadow:0 0 10px rgba(106,90,205,.55), 0 0 26px rgba(106,90,205,.35); transition:transform .15s ease, filter .2s ease}
.btn-go::before{content:""; position:absolute; inset:0; border-radius:.75rem; z-index:0; background:linear-gradient(135deg, var(--accent), var(--accent2)); transition:.18s}
.btn-go:hover::before,.btn-go:focus::before{transform:translateY(-1px); box-shadow:0 10px 24px rgba(90,80,210,.35), 0 0 24px rgba(6,182,212,.25)}
.btn-go:hover,.btn-go:focus{transform:translateY(-1px) scale(1.02)}
.btn-go.tap{animation:btnTap .18s ease}
.btn-go > *{position:relative; z-index:2}
.btn-go .ripple{position:absolute; border-radius:50%; transform:scale(0); opacity:.55; background:rgba(255,255,255,.5); mix-blend-mode:screen; pointer-events:none; z-index:1}
@keyframes rippleAnim{to{transform:scale(16); opacity:0}}

/* ===== Snack/Toast stack ===== */
.toast-stack{position:fixed; right:16px; bottom:16px; display:flex; flex-direction:column; gap:10px; z-index:1600}
.toast-item{display:flex; align-items:center; gap:8px; padding:10px 12px; border-radius:12px; font-weight:700; border:1px solid rgba(106,90,205,.25);
  background:rgba(20,24,38,.9); color:#fff; box-shadow:0 14px 30px rgba(0,0,0,.35); transform:translateY(10px); opacity:0; animation:toastIn .35s ease forwards}
html[data-theme="light"] .toast-item{background:#111827; color:#fff}
@keyframes toastIn{to{transform:translateY(0); opacity:1}}
.toast-item.hide{animation:toastOut .25s ease forwards}
@keyframes toastOut{to{transform:translateY(10px); opacity:0}}

/* ===== Resaltado del buscador ===== */
mark{background:var(--mark); padding:0 .2rem; border-radius:.25rem}

/* ===== Botón Arriba ===== */
#toTop{box-shadow:0 10px 26px rgba(0,0,0,.25)}
#toTop.pulse{animation:ttPulse 1.4s ease-in-out infinite}
@keyframes ttPulse{0%,100%{transform:translateY(0); box-shadow:0 10px 26px rgba(0,0,0,.25)}50%{transform:translateY(-2px); box-shadow:0 16px 32px rgba(0,0,0,.32)}}

/* No bloquear clics de overlays */
.card-portal::before,.card-portal::after,.btn-go::before,.btn-go .ripple{pointer-events:none}
</style>
</head>
<body>

<div id="particles-js"></div>
<div id="overlay"></div>
<div id="topProgress"></div>
<canvas id="confetti" style="position:fixed; inset:0; pointer-events:none; z-index:1500;"></canvas>

<div class="header-wrap">
  <h1 class="portal-header">Syn's Portal</h1>
  <p class="subheader">Haz clic en “Ir al sitio” o usa el buscador (con resaltado)</p>
</div>

<!-- Toolbar -->
<div class="toolbar py-2">
  <div class="container">
    <div class="row g-2 align-items-center">
      <div class="col-12 col-md-6">
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-search"></i></span>
          <input id="search" type="text" class="form-control" placeholder="Buscar por nombre, URL o descripción…">
          <button id="btnClear" class="btn btn-outline-primary" type="button" title="Limpiar">Limpiar</button>
          <span id="countPill" class="counter-pill d-none"><i class="bi bi-collection"></i><span id="countText">0/0</span></span>
        </div>
      </div>
      <div class="col-12 col-md-6 text-md-end">
        <div class="btn-group me-2" role="group" aria-label="Orden">
          <button id="btnAZ"  class="btn btn-outline-primary" type="button" title="Orden A→Z"><i class="bi bi-sort-alpha-down"></i></button>
          <button id="btnZA"  class="btn btn-outline-primary" type="button" title="Orden Z→A"><i class="bi bi-sort-alpha-up"></i></button>
        </div>
        <div class="btn-group me-2" role="group" aria-label="Densidad">
          <button id="btnComfort" class="btn btn-outline-primary" type="button" title="Densidad confort">Confort</button>
          <button id="btnCompact" class="btn btn-outline-primary" type="button" title="Densidad compacta">Compacta</button>
        </div>
        <div class="btn-group me-2" role="group" aria-label="Tema">
          <button id="btnTheme" class="btn btn-outline-primary" type="button" title="Cambiar tema">
            <i class="bi bi-moon-stars"></i> / <i class="bi bi-brightness-high"></i>
          </button>
        </div>
        <button id="btnReload" class="btn btn-outline-primary" type="button" title="Recargar lista (AJAX)">
          <i class="bi bi-arrow-repeat"></i> Recargar (AJAX)
        </button>
      </div>
    </div>
  </div>
</div>

<main class="container my-4">
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4" id="cards">
    <?php foreach ($sites as $i => $site): $type = $aosTypes[$i % count($aosTypes)]; ?>
    <div class="col" data-aos="<?php echo $type; ?>" data-aos-delay="<?php echo 160 + $i * 75; ?>">
      <div class="card h-100 card-portal tilt position-relative" tabindex="0" data-index="<?php echo $i; ?>">
        <div class="sparkles"></div>
        <div class="ribbon">MATCH</div>
        <div class="card-body p-4 d-flex flex-column tilt-inner">
          <h5 class="card-title mb-2"><?php echo htmlspecialchars($site['name'],ENT_QUOTES,'UTF-8'); ?></h5>
          <div class="card-url mb-1"><?php echo htmlspecialchars($site['url'],ENT_QUOTES,'UTF-8'); ?></div>
          <div class="card-desc mb-3"><?php echo htmlspecialchars($site['desc'],ENT_QUOTES,'UTF-8'); ?></div>
          <div class="mt-auto">
            <a class="btn-go btn-sm magnet" href="<?php echo htmlspecialchars($site['url'],ENT_QUOTES,'UTF-8'); ?>" target="_blank" rel="noopener">
              <i class="bi bi-box-arrow-up-right"></i> <span>Ir al sitio</span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</main>

<!-- Toast stack -->
<div class="toast-stack" id="toastStack" aria-live="polite" aria-atomic="true"></div>

<button id="toTop" class="btn btn-primary rounded-pill" style="position:fixed;right:16px;bottom:16px;z-index:1040;display:none" title="Ir arriba">
  <i class="bi bi-chevron-up"></i>
</button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
/* ===== Helpers ===== */
function debounce(fn,ms){ var t; return function(){ var c=this,a=arguments; clearTimeout(t); t=setTimeout(function(){ fn.apply(c,a); }, ms||160); }; }
function normalize(s){ return (s||'').toString().toLowerCase(); }
function setLS(k,v){ try{ localStorage.setItem(k,v); }catch(e){} }
function getLS(k){ try{ return localStorage.getItem(k); }catch(e){ return null; } }

/* ===== Ready ===== */
document.addEventListener('DOMContentLoaded', function(){
  document.body.className += (document.body.className?' ':'') + 'ready';
  showToast('✨ Portal listo');
});

/* ===== Partículas según tema ===== */
function initParticles(){
  var color = getComputedStyle(document.documentElement).getPropertyValue('--particle').trim() || '#6a5acd';
  if (window.pJSDom && window.pJSDom.length){ try{ window.pJSDom[0].pJS.fn.vendors.destroypJS(); window.pJSDom = []; }catch(e){} }
  if (window.particlesJS){
    particlesJS('particles-js',{
      particles:{ number:{value:70}, color:{value:color}, shape:{type:'circle'},
        opacity:{value:0.22}, size:{value:3},
        line_linked:{enable:true,distance:150,color:color,opacity:0.12,width:1},
        move:{enable:true,speed:1.4}},
      interactivity:{events:{onhover:{enable:true,mode:'repulse'}}},
      retina_detect:true
    });
  }
}
initParticles();

/* ===== AOS ===== */
if (window.AOS){
  AOS.init({ offset:80, duration:720, easing:'ease-out', once:true, startEvent:'DOMContentLoaded' });
  setTimeout(function(){ try{ AOS.refresh(); AOS.refreshHard(); }catch(e){} }, 250);
}

/* ===== Fallback revelar ===== */
(function(){
  var items = Array.prototype.slice.call(document.querySelectorAll('[data-aos]'));
  function reveal(el){ if ((' '+el.className+' ').indexOf(' aos-animate ') === -1){ el.className += ' aos-animate'; } }
  function prewarm(){ var vh=(window.innerHeight||document.documentElement.clientHeight)*2; for(var i=0;i<items.length;i++){ var r=items[i].getBoundingClientRect(); if(r.top<vh) reveal(items[i]); } }
  if ('IntersectionObserver' in window){
    var io=new IntersectionObserver(function(entries){ for(var i=0;i<entries.length;i++){ if(entries[i].isIntersecting) reveal(entries[i].target); } }, {root:null, rootMargin:'120px 0px', threshold:0.01});
    for (var j=0;j<items.length;j++) io.observe(items[j]); prewarm();
  }else{
    function inView(el){ var r=el.getBoundingClientRect(); var vh=(window.innerHeight||document.documentElement.clientHeight); return (r.top<vh+120); }
    function tick(){ for (var i=0;i<items.length;i++) if (inView(items[i])) reveal(items[i]); }
    window.addEventListener('scroll',tick,false); window.addEventListener('resize',tick,false); prewarm(); tick();
  }
})();

/* ===== Tilt 3D ===== */
(function(){
  function bindTilt(scope){
    var cards=(scope||document).querySelectorAll('.tilt');
    for (var i=0;i<cards.length;i++){
      (function(card){
        function onMove(e){ var r=card.getBoundingClientRect(), cx=r.left+r.width/2, cy=r.top+r.height/2, dx=(e.clientX-cx)/r.width, dy=(e.clientY-cy)/r.height; card.style.transform='perspective(1000px) rotateX('+(dy*8)+'deg) rotateY('+(-dx*10)+'deg)'; }
        function reset(){ card.style.transform='perspective(1000px) rotateX(0) rotateY(0)'; }
        card.addEventListener('mousemove',onMove,false); card.addEventListener('mouseleave',reset,false);
      })(cards[i]);
    }
  }
  bindTilt(document);
})();

/* ===== Magnético para botones ===== */
(function(){
  var magnets=document.getElementsByClassName('magnet');
  function move(e,btn){
    var r=btn.getBoundingClientRect(), x=e.clientX - (r.left + r.width/2), y=e.clientY - (r.top + r.height/2);
    btn.style.transform='translate('+(x*0.06)+'px,'+(y*0.06)+'px)'; // leve
  }
  function reset(btn){ btn.style.transform=''; }
  for (var i=0;i<magnets.length;i++){
    (function(btn){
      btn.addEventListener('mousemove', function(e){ move(e,btn); }, false);
      btn.addEventListener('mouseleave', function(){ reset(btn); }, false);
    })(magnets[i]);
  }
})();

/* ===== Confetti ligero ===== */
(function(){
  var cv=document.getElementById('confetti'), ctx=cv.getContext('2d');
  var w,h,parts=[],tid;
  function resize(){ w=cv.width=window.innerWidth; h=cv.height=window.innerHeight; }
  function rnd(a,b){ return Math.random()*(b-a)+a; }
  function burst(x,y){
    for (var i=0;i<30;i++){
      parts.push({x:x,y:y, vx:rnd(-3,3), vy:rnd(-4,-1), g:.08, s:rnd(2,4), a:1, r:Math.random()*Math.PI*2, vr:rnd(-.2,.2), col:'hsl('+Math.floor(rnd(200,260))+',85%,70%)'});
    }
    if(!tid) loop();
  }
  function loop(){
    tid = requestAnimationFrame(loop);
    ctx.clearRect(0,0,w,h);
    for (var i=parts.length-1;i>=0;i--){
      var p=parts[i]; p.vy+=p.g; p.x+=p.vx; p.y+=p.vy; p.r+=p.vr; p.a-=.015;
      if (p.a<=0 || p.y>h+20){ parts.splice(i,1); continue; }
      ctx.globalAlpha=p.a; ctx.fillStyle=p.col; ctx.save(); ctx.translate(p.x,p.y); ctx.rotate(p.r);
      ctx.fillRect(-p.s/2,-p.s/2,p.s,p.s); ctx.restore(); ctx.globalAlpha=1;
    }
    if(parts.length===0){ cancelAnimationFrame(tid); tid=null; }
  }
  resize(); window.addEventListener('resize', resize, false);
  // Hook en los botones
  document.addEventListener('click', function(e){
    var t=e.target;
    while(t && t!==document.body && !(/\bbtn-go\b/.test(t.className||''))){ t=t.parentNode; }
    if(t && t.className && t.className.indexOf('btn-go')>-1){
      burst(e.clientX, e.clientY);
      showToast('🚀 Abriendo: '+(t.getAttribute('href')||''));
    }
  }, false);
})();

/* ===== Toast stack ===== */
function showToast(msg){
  var stack=document.getElementById('toastStack'); if(!stack) return;
  var el=document.createElement('div');
  el.className='toast-item';
  el.innerHTML='<i class="bi bi-lightning-charge-fill"></i><span>'+escapeHtml(msg)+'</span>';
  stack.appendChild(el);
  setTimeout(function(){ el.className+=' hide'; setTimeout(function(){ if(el.parentNode) stack.removeChild(el); }, 260); }, 1800);
}
function escapeHtml(s){ return (s+'').replace(/[&<>"']/g,function(c){ return {'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;'}[c]||c; }); }

/* ===== Scroll progress top ===== */
(function(){
  var bar=document.getElementById('topProgress');
  function onScroll(){ var s=window.scrollY||document.documentElement.scrollTop, h=document.documentElement.scrollHeight-document.documentElement.clientHeight; var p=Math.max(0, Math.min(1, s/h)); bar.style.opacity='1'; bar.style.width=(p*100)+'%'; if(p===0||p===1){ setTimeout(function(){ bar.style.opacity='0'; }, 400); } }
  window.addEventListener('scroll', onScroll, false); onScroll();
})();

/* ===== Buscador con ribbon + resaltado + contador + atajos ===== */
(function(){
  var input=document.getElementById('search'), btnClear=document.getElementById('btnClear');
  var countPill=document.getElementById('countPill'), countText=document.getElementById('countText');
  var savedPlaceholder = input ? input.getAttribute('placeholder') : '';
  if (input){
    input.addEventListener('focus', function(){ input.setAttribute('placeholder',''); }, false);
    input.addEventListener('blur', function(){ if(!input.value){ input.setAttribute('placeholder', savedPlaceholder); } }, false);
  }

  function updateCounter(){
    var total = document.querySelectorAll('#cards .col').length;
    var visible = document.querySelectorAll('#cards .col:not(.d-none)').length;
    if (countPill){ countPill.className = countPill.className.replace(/\bd-none\b/g,''); }
    if (countText){ countText.textContent = visible+'/'+total; }
  }

  var run=debounce(function(){
    var term=normalize(input.value.replace(/^\s+|\s+$/g,'')); 
    var cols=document.querySelectorAll('#cards .col'); var shown=0;
    for(var i=0;i<cols.length;i++){
      var col=cols[i], card=col.querySelector('.card-portal');
      var t=col.querySelector('.card-title'), u=col.querySelector('.card-url'), d=col.querySelector('.card-desc');
      if(t) t.innerHTML=t.textContent; if(u) u.innerHTML=u.textContent; if(d) d.innerHTML=d.textContent;
      var txt=((t?t.textContent:'')+' '+(u?u.textContent:'')+' '+(d?d.textContent:'')).toLowerCase();
      var ok=!term || (txt.indexOf(term)>-1);
      if (ok){ col.className=col.className.replace(/\bd-none\b/g,''); shown++; } else if (col.className.indexOf('d-none')===-1){ col.className+=' d-none'; }
      if (card){ if (ok && term){ if (col.className.indexOf('matched')===-1) col.className+=' matched'; } else { col.className=col.className.replace(/\bmatched\b/g,''); } }
      if (ok && term){
        var rx=new RegExp('('+term.replace(/[-\/\\^$*+?.()|[\]{}]/g,'\\$&')+')','gi');
        if(t) t.innerHTML=t.textContent.replace(rx,'<mark>$1</mark>');
        if(u) u.innerHTML=u.textContent.replace(rx,'<mark>$1</mark>');
        if(d) d.innerHTML=d.textContent.replace(rx,'<mark>$1</mark>');
      }
    }
    updateCounter();
    try{ AOS.refresh(); }catch(e){}
  }, 100);

  if(input){
    input.addEventListener('input', function(){ run(); }, false);
    // Atajos / y f para enfoque rápido
    window.addEventListener('keydown', function(e){
      var tag=(e.target&&e.target.tagName)||'';
      if ((e.key==='/' || e.key==='f') && tag!=='INPUT' && tag!=='TEXTAREA'){
        e.preventDefault(); input.focus();
      }
    }, false);
  }
  if(btnClear){ btnClear.addEventListener('click', function(){ input.value=''; run(); input.focus(); showToast('Filtro limpiado'); }, false); }

  // inicial
  updateCounter();
})();

/* ===== Orden ===== */
(function(){
  function sortCards(reverse){
    var row=document.getElementById('cards'); if(!row) return;
    var nodes=row.children, arr=[]; for(var i=0;i<nodes.length;i++){ arr.push(nodes[i]); }
    arr.sort(function(a,b){ var ta=a.querySelector('.card-title'), tb=b.querySelector('.card-title'); var A=(ta?ta.textContent:'').toLowerCase(), B=(tb?tb.textContent:'').toLowerCase(); return A<B ? (reverse?1:-1) : A>B ? (reverse?-1:1) : 0; });
    // Stagger suave al reinsertar
    for(var j=0;j<arr.length;j++){ (function(el,idx){ setTimeout(function(){ row.appendChild(el); el.style.transition='transform .2s ease, opacity .2s ease'; el.style.opacity='0.6'; setTimeout(function(){ el.style.opacity='1'; }, 120); }, idx*20); })(arr[j], j); }
    setLS('portal-order', reverse?'ZA':'AZ');
    showToast('Orden '+(reverse?'Z→A':'A→Z'));
    try{ AOS.refresh(); }catch(e){}
  }
  var btnAZ=document.getElementById('btnAZ'), btnZA=document.getElementById('btnZA');
  if(btnAZ) btnAZ.addEventListener('click', function(){ sortCards(false); }, false);
  if(btnZA) btnZA.addEventListener('click', function(){ sortCards(true);  }, false);

  // restaurar orden previo
  var lastOrder=getLS('portal-order');
  if(lastOrder==='ZA'){ sortCards(true); }
})();

/* ===== Densidad (persistente) ===== */
(function(){
  var root=document.body, btnComfort=document.getElementById('btnComfort'), btnCompact=document.getElementById('btnCompact');
  function setDensity(compact){
    root.className = root.className.replace(/\bcompact\b/g,'');
    if(compact){ root.className += ' compact'; }
    setLS('portal-density', compact?'compact':'comfort');
    showToast('Densidad: '+(compact?'Compacta':'Confort'));
  }
  if(btnComfort) btnComfort.addEventListener('click', function(){ setDensity(false); }, false);
  if(btnCompact) btnCompact.addEventListener('click', function(){ setDensity(true);  }, false);

  var last=getLS('portal-density');
  if(last==='compact'){ setDensity(true); }
})();

/* ===== Botón Arriba ===== */
(function(){
  var btn=document.getElementById('toTop');
  function vis(){ var y=(window.scrollY||document.documentElement.scrollTop); var show=y>260; btn.style.display = show ? 'block':'none'; if(show){ btn.classList.add('pulse'); }else{ btn.classList.remove('pulse'); } }
  window.addEventListener('scroll', vis, false); vis();
  btn.addEventListener('click', function(){ window.scrollTo({top:0,left:0,behavior:'smooth'}); }, false);
})();

/* ===== Tema persistente ===== */
(function(){
  var root=document.documentElement, btn=document.getElementById('btnTheme');
  var saved=getLS('portal-theme');
  if(saved==='light'||saved==='dark'){ root.setAttribute('data-theme', saved); initParticles(); }
  if(btn){ btn.addEventListener('click', function(){ var current=root.getAttribute('data-theme')||'dark'; var next=(current==='dark')?'light':'dark'; root.setAttribute('data-theme', next); setLS('portal-theme', next); initParticles(); showToast('Tema: '+(next==='dark'?'Oscuro 🌙':'Claro ☀️')); }, false); }
  // Atajo: t
  window.addEventListener('keydown', function(e){ if(e.key==='t' && (document.activeElement.tagName!=='INPUT')){ btn.click(); } }, false);
})();

/* ===== Ripple + press + teclado + menú contextual ===== */
(function(){
  // Ripple + confetti ya conectado en listeners globales
  var btns=document.getElementsByClassName('btn-go');
  for (var i=0;i<btns.length;i++){
    (function(btn){
      btn.addEventListener('click', function(e){
        var rect=btn.getBoundingClientRect(); var x=(e.clientX || (rect.left+rect.width/2)) - rect.left; var y=(e.clientY || (rect.top+rect.height/2)) - rect.top;
        var r=document.createElement('span'); r.className='ripple'; r.style.left=(x-10)+'px'; r.style.top=(y-10)+'px'; r.style.width=r.style.height='20px';
        btn.appendChild(r); r.offsetWidth; r.style.animation='rippleAnim 650ms ease-out forwards'; setTimeout(function(){ try{ btn.removeChild(r); }catch(ex){} }, 700);
      }, false);
    })(btns[i]);
  }
  // Cards: press + teclado + menú contextual copia
  var cards=document.getElementsByClassName('card-portal');
  function rm(el,c){ el.className = el.className.replace(new RegExp('\\b'+c+'\\b','g'),''); }
  for (var j=0;j<cards.length;j++){
    (function(card){
      card.addEventListener('mousedown', function(){ if(card.className.indexOf('press')===-1) card.className+=' press'; }, false);
      card.addEventListener('mouseup',   function(){ rm(card,'press'); }, false);
      card.addEventListener('mouseleave',function(){ rm(card,'press'); }, false);
      card.addEventListener('touchstart',function(){ if(card.className.indexOf('press')===-1) card.className+=' press'; }, false);
      card.addEventListener('touchend',  function(){ rm(card,'press'); }, false);
      // Enter abre
      card.addEventListener('keydown', function(ev){ if (ev.key === 'Enter'){ var cta = card.querySelector('.btn-go'); if (cta){ cta.click(); } } }, false);
      // Contextual copiar
      card.addEventListener('contextmenu', function(ev){
        ev.preventDefault();
        var title = (card.querySelector('.card-title')||{}).textContent || '';
        var urlEl = card.querySelector('.btn-go'), url = urlEl ? urlEl.getAttribute('href') : '';
        var pick = prompt('Clic derecho: 1=Nombre, 2=URL, 3=Nombre + URL', '3');
        if (pick==='1'){ copyText(title); showToast('📋 Nombre copiado'); }
        else if (pick==='2'){ copyText(url); showToast('📋 URL copiada'); }
        else if (pick==='3'){ copyText(title+' — '+url); showToast('📋 Nombre + URL copiados'); }
      }, false);
    })(cards[j]);
  }
  // Navegar con flechas
  window.addEventListener('keydown', function(ev){
    var focus = document.activeElement;
    var list = document.querySelectorAll('.card-portal');
    if(!list.length) return;
    function focusAt(idx){ if (idx<0) idx=0; if (idx>=list.length) idx=list.length-1; list[idx].focus(); list[idx].scrollIntoView({behavior:'smooth', block:'center'}); }
    var idx = -1; for(var i=0;i<list.length;i++){ if(list[i]===focus){ idx=i; break; } }
    if (ev.key==='ArrowRight' || ev.key==='ArrowDown'){ focusAt(idx+1); }
    if (ev.key==='ArrowLeft'  || ev.key==='ArrowUp'){   focusAt(idx-1); }
  }, false);

  function copyText(text){
    if (navigator.clipboard && navigator.clipboard.writeText){ navigator.clipboard.writeText(text); }
    else { var ta = document.createElement('textarea'); ta.value = text; document.body.appendChild(ta); ta.select(); document.execCommand('copy'); ta.remove(); }
  }
})();

/* ===== AJAX (sites.json) con barra de progreso ===== */
(function(){
  var bar=document.getElementById('topProgress');
  function progStart(){ bar.style.opacity='1'; bar.style.width='10%'; var i=10, id=setInterval(function(){ i+=5; if(i<90) bar.style.width=i+'%'; else clearInterval(id); }, 120); return id; }
  function progEnd(id){ try{ clearInterval(id); }catch(e){} bar.style.width='100%'; setTimeout(function(){ bar.style.opacity='0'; bar.style.width='0%'; }, 400); }
  function loadJSON(cb){
    try{
      var xhr=new XMLHttpRequest(); xhr.open('GET','sites.json',true);
      xhr.onreadystatechange=function(){
        if(xhr.readyState===4){
          if(xhr.status>=200 && xhr.status<300){ try{ var data=JSON.parse(xhr.responseText); cb(null,data); }catch(e){ cb(e); } }
          else{ cb(new Error('HTTP '+xhr.status)); }
        }
      }; xhr.send();
    }catch(err){ cb(err); }
  }
  var btn=document.getElementById('btnReload');
  if(btn){ btn.addEventListener('click', function(){
    var pid=progStart();
    loadJSON(function(err,data){
      if(err){ showToast('⚠️ Error al recargar'); progEnd(pid); return; }
      if(data && data.length){
        var row=document.getElementById('cards'); if(!row) return; row.innerHTML='';
        var aos=<?php echo json_encode($aosTypes); ?>;
        for(var i=0;i<data.length;i++){
          var s=data[i]; var name=(s.name||'').replace(/</g,'&lt;'), url=(s.url||'').replace(/</g,'&lt;'), desc=(s.desc||'').replace(/</g,'&lt;');
          var type=aos[i % aos.length];
          row.innerHTML += ''
           +'<div class="col" data-aos="'+type+'" data-aos-delay="'+(160 + i*75)+'">'
           +  '<div class="card h-100 card-portal tilt position-relative" tabindex="0" data-index="'+i+'">'
           +    '<div class="sparkles"></div>'
           +    '<div class="ribbon">MATCH</div>'
           +    '<div class="card-body p-4 d-flex flex-column tilt-inner">'
           +      '<h5 class="card-title mb-2">'+name+'</h5>'
           +      '<div class="card-url mb-1">'+url+'</div>'
           +      '<div class="card-desc mb-3">'+desc+'</div>'
           +      '<div class="mt-auto"><a class="btn-go btn-sm magnet" href="'+url+'" target="_blank" rel="noopener">'
           +      '<i class="bi bi-box-arrow-up-right"></i> <span>Ir al sitio</span></a></div>'
           +    '</div>'
           +  '</div>'
           +'</div>';
        }
        // marcar animadas
        var items=row.querySelectorAll('[data-aos]'); for (var k=0;k<items.length;k++){ items[k].className+=' aos-animate'; }
        showToast('🔄 Lista recargada ('+data.length+')');
        try{ AOS.refresh(); }catch(e){}
      } else {
        showToast('⚠️ Lista vacía');
      }
      progEnd(pid);
    });
  }, false); }
})();

/* ===== Particles y tema ===== */
(function(){
  // Reinicia partículas al cambiar tema desde LS (ya manejado), nada extra por ahora
})();

/* ===== Utils menores ===== */
(function(){
  // Foco inicial suave
  var s=document.getElementById('search'); setTimeout(function(){ if(s){ s.focus(); } }, 200);
})();
</script>
</body>
</html>
