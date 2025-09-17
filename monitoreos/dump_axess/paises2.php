<?php

	require_once './excel/Classes/PHPExcel.php';
	require_once './spout/src/Spout/Autoloader/autoload.php';
	use Box\Spout\Writer\WriterFactory;
	use Box\Spout\Common\Type;
		
		function pais_dump($pais){
		//$pais='G';

		//$pais=$_POST["pais"]; 
		$conexion = mysqli_connect('172.17.8.149','claroroot','Cl4r0DBAcc3s','live');
		
		
		if($pais=='GT')
		{
			if(!$conexion)
			{
				echo "No conectado";
			}
			else
			{
				echo "Conectado";
			}	


			$writer = WriterFactory::create(Type::XLSX); // for XLSX files
			//$writer = WriterFactory::create(Type::CSV); // for CSV files
			//$writer = WriterFactory::create(Type::ODS); // for ODS files

			//$writer->openToFile($filePath); // write data to a file or to a PHP stream
			$writer->openToBrowser("DumpGT.xlsx"); // stream data directly to the browser

			//$writer->addRow($singleRow); // add a row at a time
			//$writer->addRows($multipleRows); // add multiple rows at a time
			 $writer->addRow(array('value1','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype'));

			$writer->close();

			/*$excel = new PHPExcel();
			$excel ->setActiveSheetIndex(0)
			->setCellValue('A1','value1')
			->setCellValue('B1','cpeid')
			->setCellValue('C1','cid')
			->setCellValue('D1','cid2')
			->setCellValue('E1','value2')
			->setCellValue('F1','statusService')
			->setCellValue('G1','realStatusOfService')
			->setCellValue('H1','realStatusDetails')
			->setCellValue('I1','servicetype');*/

			$query = "SELECT value1,
					 cpeid,
					 cid,
					 cid2,
					 value2,
					 statusService,
					 realStatusOfService,
					 realStatusDetails,
					 servicetype
					 FROM AXServiceTable
					 WHERE serviceType='Internet' AND cpeid IN(SELECT cpeid FROM CPEManager_CPEs WHERE cid='GT')";

 			$resultado = $conexion -> prepare($query);
        	$resultado -> execute();
			$result = $resultado->get_result();   // You get a result object now
			$x=2;
			if($result->num_rows > 0) 
			{     // Note: change to $result->...!
			    while ($data = $result->fetch_assoc()) 
			    {
			        //echo $data['value1'];
			        //echo $data['cpeid'];
					/*$excel ->setActiveSheetIndex(0)
					->setCellValue('A'.$x,$data['value1'])
					->setCellValue('B'.$x,$data['cpeid'])
					->setCellValue('C'.$x,$data['cid'])
					->setCellValue('D'.$x,$data['cid2'])
					->setCellValue('E'.$x,$data['value2'])
					->setCellValue('F'.$x,$data['statusService'])
					->setCellValue('G'.$x,$data['realStatusOfService']);*/
					/*->setCellValue('H'.$x,$data['realStatusDetails'])
					->setCellValue('I'.$x,$data['servicetype']);*/
					$x=$x+1;
			    }
			}
						//stmt_bind_assoc($resultado, $nombre);

			$conexion -> close();

			/*$file = PHPExcel_IOFactory::createWriter($excel,'Excel2007');
			$file->save('DumpGT1.xlsx');*/
			//$pais='G';
			//exit;
			
			/*
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="01simple.xls"');
			header('Cache-Control: max-age=0');
			$file=PHPExcel_IOFactory::createWriter($excel,'Excel2007');
			$file->save('php://output');
			exit;*/



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
