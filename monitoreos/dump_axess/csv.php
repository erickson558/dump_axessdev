<?php
function leercrear(){
$fp = fopen ("./procesados/crear.csv","r");
while ($data = fgetcsv ($fp, 1000, ";")) {
$num = count ($data);
print "";
echo $data[0].' -> '.$data[1];
echo '<br>';
}
 fclose ($fp);
}

function leerborrar(){
$fp = fopen ("/procesados/borrar.csv","r");
while ($data = fgetcsv ($fp, 1000, ";")) {
$num = count ($data);
print "";
echo $data[0].' -> '.$data[1];
echo '<br>';
}
 fclose ($fp);
}
//leercrear();
//echo '<br>';
//leerborrar();
?>
