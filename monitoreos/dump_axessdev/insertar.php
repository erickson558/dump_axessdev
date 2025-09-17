
<?php

// Antes de ejecutarlo, cree la tabla:
//   CREATE TABLE MYTABLE (mid NUMBER, myd VARCHAR2(20));

$conexión = oci_connect('hr', 'welcome', 'localhost/XE');
if (!$conexión) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conexión, 'INSERT INTO MYTABLE (mid, myd) VALUES(:myid, :mydata)');

$id = 60;
$datos = 'Algunos datos';

oci_bind_by_name($stid, ':myid', $id);
oci_bind_by_name($stid, ':mydata', $datos);

$r = oci_execute($stid);  // ejecuta y consigna

if ($r) {
    print "Una fila insertada";
}

oci_free_statement($stid);
oci_close($conexión);

?>
