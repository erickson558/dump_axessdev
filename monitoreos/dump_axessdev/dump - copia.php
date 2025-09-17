<?php 
	include './BD.php';
	include './paises.php';
	//include './paises2.php';
?>

<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<head>
	  	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	  	<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Dump AXESS</title>
	</head>

	<body>
		<h3 align="center">Generación Dump AXESS</h3>
		<!-- <div align="center"> -->
			<table>
				<tr>
					<td width="100" align="center" height="50"><h4>Guatemala</h4></td>
					<td width="80" align="center" height="50">
						<form method="post"> <input type="hidden" name="pais" value="GT1" /><input type="submit" id="gt" name="gt" class="btn btn-primary" value="Internet" action="http://172.17.2.175:888/dump_axes/paises.php"></form>
					</td>
					<td width="80" align="center" height="50">
						<form method="post"> <input type="hidden" name="pais" value="GT4" /><input type="submit" id="ni" name="ni" class="btn btn-primary" value="Internet v2" action="http://172.17.2.175:888/dump_axes/paises.php"></form>
					</td>					
					<td width="80" align="center" height="50">
						<form method="post"> <input type="hidden" name="pais" value="GT2" /><input type="submit" id="gt" name="gt" class="btn btn-primary" value="Voz" action="http://172.17.2.175:888/dump_axes/paises.php"></form>
					</td>
					<td width="80" align="center" height="50">
						<form method="post"> <input type="hidden" name="pais" value="GT3" /><input type="submit" id="gt" name="gt" class="btn btn-primary" value="IP Pública" action="http://172.17.2.175:888/dump_axes/paises.php"></form>
					</td>										
				</tr>
				<tr>
					<td width="100" align="center" height="50"><h4>El Salvador</h4></td>
					<td width="80" align="center" height="50">
						<form method="post"> <input type="hidden" name="pais" value="SV1" /><input type="submit" id="sv" name="sv" class="btn btn-primary" value="Internet" action="http://172.17.2.175:888/dump_axes/paises.php"></form>
					</td>
					<td width="80" align="center" height="50">
						<form method="post"> <input type="hidden" name="pais" value="SV4" /><input type="submit" id="ni" name="ni" class="btn btn-primary" value="Internet v2" action="http://172.17.2.175:888/dump_axes/paises.php"></form>
					</td>					
					<td width="80" align="center" height="50">
						<form method="post"> <input type="hidden" name="pais" value="SV2" /><input type="submit" id="sv" name="sv" class="btn btn-primary" value="Voz" action="http://172.17.2.175:888/dump_axes/paises.php"></form>						
					</td>
					<td width="80" align="center" height="50">
						<form method="post"> <input type="hidden" name="pais" value="SV3" /><input type="submit" id="sv" name="sv" class="btn btn-primary" value="IP Pública" action="http://172.17.2.175:888/dump_axes/paises.php"></form>
					</td>	
				</tr>
				<tr>
					<td width="100" align="center" height="50"><h4>Honduras</h4></td>
					<td width="80" align="center" height="50">
						<form method="post"> <input type="hidden" name="pais" value="HN1" /><input type="submit" id="sv" name="sv" class="btn btn-primary" value="Internet" action="http://172.17.2.175:888/dump_axes/paises.php"></form>
					</td>
					<td width="80" align="center" height="50">
						<form method="post"> <input type="hidden" name="pais" value="HN4" /><input type="submit" id="ni" name="ni" class="btn btn-primary" value="Internet v2" action="http://172.17.2.175:888/dump_axes/paises.php"></form>
					</td>					
					<td width="80" align="center" height="50">
						<form method="post"> <input type="hidden" name="pais" value="HN2" /><input type="submit" id="sv" name="sv" class="btn btn-primary" value="Voz" action="http://172.17.2.175:888/dump_axes/paises.php"></form>						
					</td>
					<td width="80" align="center" height="50">
						<form method="post"> <input type="hidden" name="pais" value="HN3" /><input type="submit" id="hn" name="hn" class="btn btn-primary" value="IP Pública" action="http://172.17.2.175:888/dump_axes/paises.php"></form>
					</td>	
				</tr>
				<tr>
					<td width="100" align="center" height="50"><h4>Nicaragua</h4></td>
					<td width="80" align="center" height="50">
						<form method="post"> <input type="hidden" name="pais" value="NI1" /><input type="submit" id="ni" name="ni" class="btn btn-primary" value="Internet" action="http://172.17.2.175:888/dump_axes/paises.php"></form>
					</td>
					<td width="80" align="center" height="50">
						<form method="post"> <input type="hidden" name="pais" value="NI4" /><input type="submit" id="ni" name="ni" class="btn btn-primary" value="Internet v2" action="http://172.17.2.175:888/dump_axes/paises.php"></form>
					</td>					
					<td width="80" align="center" height="50">
						<form method="post"> <input type="hidden" name="pais" value="NI2" /><input type="submit" id="ni" name="ni" class="btn btn-primary" value="Voz" action="http://172.17.2.175:888/dump_axes/paises.php"></form>						
					</td>
					<td width="80" align="center" height="50">
						<form method="post"> <input type="hidden" name="pais" value="NI3" /><input type="submit" id="ni" name="ni" class="btn btn-primary" value="IP Pública" action="http://172.17.2.175:888/dump_axes/paises.php"></form>
					</td>	
				</tr>								
			</table>	
			<script src="bootstrap/js/jquery-3.3.1.js"></script>			

			<script type="text/javascript">

			</script>
	</body>
</html>
