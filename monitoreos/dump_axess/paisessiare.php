<?php
//	include './csv.php';
		include './bdsiare.php';
//		include './upload.php';
		
		function leercrear(){
			$archivo=str(subirarchivo());
			settype($archivo,'string');
			$fp = fopen ($archivo,"r");
			while ($data = fgetcsv ($fp, 1000, ";")) {
			$num = count ($data);
			print "";
			echo $data[0].' -> '.$data[1];
			echo '<br>';
			}
			fclose ($fp);
							}
							
		function leerborrar(){
		$fp = fopen ("./procesados/borrar.csv","r");
		while ($data = fgetcsv ($fp, 1000, ";")) {
		$num = count ($data);
		print "";
		echo $data[0].' -> '.$data[1];
		echo '<br>';
		}
		fclose ($fp);
		}

//		$pais='G';
		echo $_POST[pais];
		$pais=$_POST["pais"]; 
		
		//$conexion = oci_connect('TREMASV', 's3P_NIv9YqIs', 'oracleprd01-scan:3871/TREMASV');
		//if(!$conexion)
		//{
		//	echo "No conectado";
		//	echo "<br>";
		//}
		//else
		//{
		//	echo "Conectado";
		//	echo "<br>";
		//}	
		
		if($pais=='GT1')			
		{	//echo"<br>";
			//echo"entro al if GT1";
			//echo"<br>";
			
				insertarbdgt();
		}
		else
		{	//echo"<br>";
			//echo"no entro al if GT1";
			//echo"<br>";
		
		}
	oci_close($conexión);		
	
	if($pais=='GT2')			
		{	borrarbdgt();
			}
		else
		{ 	//echo"<br>";
			//echo"no entro al if GT2";
			//echo"<br>";
		}
	oci_close($conexión);
	
	if($pais=='SV1')			
		{	//echo"<br>";
			//echo"entro al if SV1";
			//echo"<br>";
			insertarbdsv();
		}
		else
		{	//echo"<br>";
			//echo"no entro al if SV1";
			//echo"<br>";
		
		}
		
		if($pais=='SV2')			
		{	borrarbdsv();
		//echo"<br>";
		//echo"no entro al if SV2";
		//echo"<br>";
		}
		else
		{
		//echo"<br>";
		//echo"no entro a funcion";
		//echo"<br>";
			
		}
		oci_close($conexión);
		
		if($pais=='HN1')			
		{	//echo"<br>";
			//echo"entro al if SV1";
			//echo"<br>";
			insertarbdhn();
		}
		else
		{	//echo"<br>";
			//echo"no entro al if SV1";
			//echo"<br>";
		
		}
		
		if($pais=='HN2')			
		{	borrarbdhn();
		//echo"<br>";
		//echo"no entro al if SV2";
		//echo"<br>";
		}
		else
		{
		//echo"<br>";
		//echo"no entro a funcion";
		//echo"<br>";
			
		}
		oci_close($conexión);
	if($pais=='NI1')			
		{	//echo"<br>";
			//echo"entro al if SV1";
			//echo"<br>";
			insertarbdni();
		}
		else
		{	//echo"<br>";
			//echo"no entro al if SV1";
			//echo"<br>";
		
		}
		
		if($pais=='NI2')			
		{	borrarbdni();
		//echo"<br>";
		//echo"no entro al if SV2";
		//echo"<br>";
		}
		else
		{
		//echo"<br>";
		//echo"no entro a funcion";
		//echo"<br>";
			
		}
		oci_close($conexión);
?>
