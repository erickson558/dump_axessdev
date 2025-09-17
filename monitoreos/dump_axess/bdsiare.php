<?php

function bdlecturasv(){
	$conexión = oci_connect('TREMASV', 's3P_NIv9YqIs', 'oracleprd01-scan:3871/TREMASV');
if (!$conexión) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
$stid = oci_parse($conexión, 'SELECT * FROM siare_users where rownum<10');
if (!$stid) {
    $e = oci_error($conexión);
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Realizar la lógica de la consulta
$r = oci_execute($stid);
if (!$r) {
    $e = oci_error($stid);
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Obtener los resultados de la consulta
print "<table border='1'>\n";
while ($fila = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    print "<tr>\n";
    foreach ($fila as $elemento) {
        print "    <td>" . ($elemento !== null ? htmlentities($elemento, ENT_QUOTES) : "") . "</td>\n";
    }
    print "</tr>\n";
}
print "</table>\n";

oci_free_statement($stid);
oci_close($conexión);
}

function insertarbdsv(){
	
		$conexión = oci_connect('TREMASV', 's3P_NIv9YqIs', 'oracleprd01-scan:3871/TREMASV');
			if (!$conexión) {
				$e = oci_error();
				trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
			}

		$fp = fopen ("./procesados/crearsv.csv","r");
			while ($data = fgetcsv ($fp, 1000, ",")) {
			$num = count ($data);
			print "";
			$stid = oci_parse($conexión, 'INSERT INTO siare_users (u_name,u_password,u_description) VALUES(:usuario,:pass,:usuario)');
			$stid2 = oci_parse($conexión, 'INSERT INTO  siare_groupmembers (g_name,g_member) VALUES(:perfil,:usuario2)');
			//echo '<br>';
			$usuario = $data[0];
			$usuario2 = $data[0];
			$pass = 'claro123';
			$perfil = $data[1];
			oci_bind_by_name($stid, ':usuario', $usuario);
			oci_bind_by_name($stid, ':pass', $pass);
			oci_bind_by_name($stid2, ':perfil', $perfil);
			oci_bind_by_name($stid2, ':usuario2', $usuario2);
			$r = oci_execute($stid);  // ejecuta y consigna
			$r = oci_execute($stid2);  // ejecuta y consigna
			echo '<br>';
			if ($r) {
				print "Una fila insertada";
			}
			//oci_free_statement($stid);
			oci_free_statement($stid2);
	}
			fclose ($fp);
			oci_close($conexión);
}
function insertarbdgt(){
	
		$conexión = oci_connect('TREMAGT', 's3P_NIv9YqIs', 'oracleprd01-scan:3873/TREMAGT');
			if (!$conexión) {
				$e = oci_error();
				trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
			}

		$fp = fopen ("./procesados/creargt.csv","r");
			while ($data = fgetcsv ($fp, 1000, ",")) {
			$num = count ($data);
			print "";
			$stid = oci_parse($conexión, 'INSERT INTO siare_users (u_name,u_password,u_description) VALUES(:usuario,:pass,:usuario)');
			$stid2 = oci_parse($conexión, 'INSERT INTO  siare_groupmembers (g_name,g_member) VALUES(:perfil,:usuario2)');
			//echo '<br>';
			$usuario = $data[0];
			$usuario2 = $data[0];
			$pass = 'claro123';
			$perfil = $data[1];
			oci_bind_by_name($stid, ':usuario', $usuario);
			oci_bind_by_name($stid, ':pass', $pass);
			oci_bind_by_name($stid2, ':perfil', $perfil);
			oci_bind_by_name($stid2, ':usuario2', $usuario2);
			$r = oci_execute($stid);  // ejecuta y consigna
			$r = oci_execute($stid2);  // ejecuta y consigna
			echo '<br>';
			if ($r) {
				print "Una fila insertada";
			}
			//oci_free_statement($stid);
			oci_free_statement($stid2);
	}
			fclose ($fp);
			oci_close($conexión);
}

function borrarbdsv(){
			$conexión = oci_connect('TREMASV', 's3P_NIv9YqIs', 'oracleprd01-scan:3871/TREMASV');
			if (!$conexión) {
				$e = oci_error();
				trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
			}
		$fp = fopen ("./procesados/borrarsv.csv","r");
			while ($data = fgetcsv ($fp, 1000, ",")) {
			
			$stid = oci_parse($conexión, 'delete from siare_users where u_name in (:usuario)');
			$stid2 = oci_parse($conexión, 'delete from siare_groupmembers where g_member in (:usuario2)');
			$usuario = $data[0];
			$usuario2 = $data[0];
			//$pass = 'claro123';
			oci_bind_by_name($stid, ':usuario', $usuario);
			oci_bind_by_name($stid2, ':usuario2', $usuario2);
			//oci_bind_by_name($stid, ':pass', $pass);
			$r = oci_execute($stid);  // ejecuta y consigna
			$r = oci_execute($stid2);  // ejecuta y consigna
			echo $data[0];
			echo '<br>';
			if ($r) {
				print "Una fila borrada";
			}
			echo '<br>';
			oci_free_statement($stid);
		}
		fclose ($fp);
			oci_close($conexión);
		}
		
function borrarbdgt(){
		$conexión = oci_connect('TREMAGT', 's3P_NIv9YqIs', 'oracleprd01-scan:3873/TREMAGT');
		if (!$conexión) {
				$e = oci_error();
				trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
			}
		$fp = fopen ("./procesados/borrarsv.csv","r");
			while ($data = fgetcsv ($fp, 1000, ",")) {
			
			$stid = oci_parse($conexión, 'delete from siare_users where u_name in (:usuario)');
			$stid2 = oci_parse($conexión, 'delete from siare_groupmembers where g_member in (:usuario2)');
			$usuario = $data[0];
			$usuario2 = $data[0];
			//$pass = 'claro123';
			oci_bind_by_name($stid, ':usuario', $usuario);
			oci_bind_by_name($stid2, ':usuario2', $usuario2);
			//oci_bind_by_name($stid, ':pass', $pass);
			$r = oci_execute($stid);  // ejecuta y consigna
			$r = oci_execute($stid2);  // ejecuta y consigna
			echo $data[0];
			echo '<br>';
			if ($r) {
				print "Una fila borrada";
			}
			echo '<br>';
			oci_free_statement($stid);
		}
		fclose ($fp);
			oci_close($conexión);
		}
		
		
function insertarbdhn(){
	
		$conexión = oci_connect('TREMAHN', 'moyShtwQO9w', 'oracleprd01-scan:3872/TREMAHN');
			if (!$conexión) {
				$e = oci_error();
				trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
			}

		$fp = fopen ("./procesados/crearhn.csv","r");
			while ($data = fgetcsv ($fp, 1000, ",")) {
			$num = count ($data);
			print "";
			$stid = oci_parse($conexión, 'INSERT INTO siare_users (u_name,u_password,u_description) VALUES(:usuario,:pass,:usuario)');
			$stid2 = oci_parse($conexión, 'INSERT INTO  siare_groupmembers (g_name,g_member) VALUES(:perfil,:usuario2)');
			//echo '<br>';
			$usuario = $data[0];
			$usuario2 = $data[0];
			$pass = 'claro123';
			$perfil = $data[1];
			oci_bind_by_name($stid, ':usuario', $usuario);
			oci_bind_by_name($stid, ':pass', $pass);
			oci_bind_by_name($stid2, ':perfil', $perfil);
			oci_bind_by_name($stid2, ':usuario2', $usuario2);
			$r = oci_execute($stid);  // ejecuta y consigna
			$r = oci_execute($stid2);  // ejecuta y consigna
			echo '<br>';
			if ($r) {
				print "Una fila insertada";
			}
			//oci_free_statement($stid);
			oci_free_statement($stid2);
	}
			fclose ($fp);
			oci_close($conexión);
}

function borrarbdhn(){
		$conexión = oci_connect('TREMAHN', 'moyShtwQO9w', 'oracleprd01-scan:3872/TREMAHN');
		if (!$conexión) {
				$e = oci_error();
				trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
			}
		$fp = fopen ("./procesados/borrarhn.csv","r");
			while ($data = fgetcsv ($fp, 1000, ",")) {
			
			$stid = oci_parse($conexión, 'delete from siare_users where u_name in (:usuario)');
			$stid2 = oci_parse($conexión, 'delete from siare_groupmembers where g_member in (:usuario2)');
			$usuario = $data[0];
			$usuario2 = $data[0];
			//$pass = 'claro123';
			oci_bind_by_name($stid, ':usuario', $usuario);
			oci_bind_by_name($stid2, ':usuario2', $usuario2);
			//oci_bind_by_name($stid, ':pass', $pass);
			$r = oci_execute($stid);  // ejecuta y consigna
			$r = oci_execute($stid2);  // ejecuta y consigna
			echo $data[0];
			echo '<br>';
			if ($r) {
				print "Una fila borrada";
			}
			echo '<br>';
			oci_free_statement($stid);
		}
		fclose ($fp);
			oci_close($conexión);
		}
		
function insertarbdni(){
	
		$conexión = oci_connect('TREMANI', 's3P_NIv9YqIs', 'oracleprd01-scan:3874/TREMANI');
			if (!$conexión) {
				$e = oci_error();
				trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
			}

		$fp = fopen ("./procesados/crearni.csv","r");
			while ($data = fgetcsv ($fp, 1000, ",")) {
			$num = count ($data);
			print "";
			$stid = oci_parse($conexión, 'INSERT INTO siare_users (u_name,u_password,u_description) VALUES(:usuario,:pass,:usuario)');
			$stid2 = oci_parse($conexión, 'INSERT INTO  siare_groupmembers (g_name,g_member) VALUES(:perfil,:usuario2)');
			//echo '<br>';
			$usuario = $data[0];
			$usuario2 = $data[0];
			$pass = 'claro123';
			$perfil = $data[1];
			oci_bind_by_name($stid, ':usuario', $usuario);
			oci_bind_by_name($stid, ':pass', $pass);
			oci_bind_by_name($stid2, ':perfil', $perfil);
			oci_bind_by_name($stid2, ':usuario2', $usuario2);
			$r = oci_execute($stid);  // ejecuta y consigna
			$r = oci_execute($stid2);  // ejecuta y consigna
			echo '<br>';
			if ($r) {
				print "Una fila insertada";
			}
			//oci_free_statement($stid);
			oci_free_statement($stid2);
	}
			fclose ($fp);
			oci_close($conexión);
}
function borrarbdni(){
		$conexión = oci_connect('TREMANI', 's3P_NIv9YqIs', 'oracleprd01-scan:3874/TREMANI');
		if (!$conexión) {
				$e = oci_error();
				trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
			}
		$fp = fopen ("./procesados/borrarni.csv","r");
			while ($data = fgetcsv ($fp, 1000, ",")) {
			
			$stid = oci_parse($conexión, 'delete from siare_users where u_name in (:usuario)');
			$stid2 = oci_parse($conexión, 'delete from siare_groupmembers where g_member in (:usuario2)');
			$usuario = $data[0];
			$usuario2 = $data[0];
			//$pass = 'claro123';
			oci_bind_by_name($stid, ':usuario', $usuario);
			oci_bind_by_name($stid2, ':usuario2', $usuario2);
			//oci_bind_by_name($stid, ':pass', $pass);
			$r = oci_execute($stid);  // ejecuta y consigna
			$r = oci_execute($stid2);  // ejecuta y consigna
			echo $data[0];
			echo '<br>';
			if ($r) {
				print "Una fila borrada";
			}
			echo '<br>';
			oci_free_statement($stid);
		}
		fclose ($fp);
			oci_close($conexión);
		}
?>
