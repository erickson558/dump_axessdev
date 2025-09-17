<?php

	require_once './excel/Classes/PHPExcel.php';

	function excel($pais)
	{

		$conexion = mysqli_connect('10.233.59.38','Claro','R$9v4@p!X2','live');
		
		if(!$conexion)
		{
			echo "No conectado";
		}
		else
		{
			echo "Conectado";
		}	
		
		if($pais=='SV')
		{
			$excel = new PHPExcel();
			$excel ->setActiveSheetIndex(0)
			->setCellValue('A1','Hola')
			->setCellValue('B1','Mundo');

			$file = PHPExcel_IOFactory::createWriter($excel,'Excel2007');
			$file->save('DumpSV.xlsx');
		}

	}
?>
