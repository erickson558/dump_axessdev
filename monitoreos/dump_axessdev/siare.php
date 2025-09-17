<?php 
	//include './bdsiare.php';
	include './paisessiare.php';
	//include './csv.php';
	//include './paises2.php';

?>

<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
			<br>
			<head>
	  	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	  	<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Crear y Eliminar Usuarios Siare</title>
		</head>
		<h3 align="center">Crear y Eliminar Usuarios Siare</h3>
	
			<table align="center" border="3">
			<tr>
					<td width="200" align="center" height="50"  ><h4>Usuarios GT</h4></td>
					<td width="200" align="center" height="50">
						<form method="post"> <input type="hidden" name="pais" value="GT1" /><input type="submit" id="gt" name="gt" class="btn btn-primary" value="Crear Usuarios"action="http://172.17.2.175:888/dump_axes/paisessiare.php">
						</form>
					</td>
					<td width="200" align="center" height="50">
						<form method="post"> <input type="hidden" name="pais" value="GT2" /><input type="submit" id="gt" name="gt" class="btn btn-primary" value="Borrar Usuarios" action="http://172.17.2.175:888/dump_axes/paises.php"></form>
					</td>
			</tr>
			<tr>
					<td width="200" align="center" height="50"  ><h4>Usuarios SV</h4></td>
					<td width="200" align="center" height="50">
						<form method="post"> <input type="hidden" name="pais" value="SV1" /><input type="submit" id="gt" name="gt" class="btn btn-primary" value="Crear Usuarios" action="http://172.17.2.175:888/dump_axes/paises.php"></form>
					</td>
					<td width="200" align="center" height="50">
						<form method="post"> <input type="hidden" name="pais" value="SV2" /><input type="submit" id="gt" name="gt" class="btn btn-primary" value="Borrar Usuarios" action="http://172.17.2.175:888/dump_axes/paises.php"></form>
					</td>
			</tr>
			<tr>
					<td width="200" align="center" height="50"  ><h4>Usuarios HN</h4></td>
					<td width="200" align="center" height="50">
						<form method="post"> <input type="hidden" name="pais" value="HN1" /><input type="submit" id="gt" name="gt" class="btn btn-primary" value="Crear Usuarios" action="http://172.17.2.175:888/dump_axes/paises.php"></form>
					</td>
					<td width="200" align="center" height="50">
						<form method="post"> <input type="hidden" name="pais" value="HN2" /><input type="submit" id="gt" name="gt" class="btn btn-primary" value="Borrar Usuarios" action="http://172.17.2.175:888/dump_axes/paises.php"></form>
					</td>
			</tr>
			<tr>
					<td width="200" align="center" height="50"  ><h4>Usuarios NI</h4></td>
					<td width="200" align="center" height="50">
						<form method="post"> <input type="hidden" name="pais" value="NI1" /><input type="submit" id="gt" name="gt" class="btn btn-primary" value="Crear Usuarios" action="http://172.17.2.175:888/dump_axes/paises.php"></form>
					</td>
					<td width="200" align="center" height="50">
						<form method="post"> <input type="hidden" name="pais" value="NI2" /><input type="submit" id="gt" name="gt" class="btn btn-primary" value="Borrar Usuarios" action="http://172.17.2.175:888/dump_axes/paises.php"></form>
					</td>
			</tr>
			</table>
			<script src="bootstrap/js/jquery-3.3.1.js"></script>			

			<script type="text/javascript">

			</script>
	</body>
</html>
