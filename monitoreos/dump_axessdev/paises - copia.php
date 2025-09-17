<?php

	require_once './excel/Classes/PHPExcel.php';
	require_once './spout/src/Spout/Autoloader/autoload.php';
	use Box\Spout\Writer\WriterFactory;
	use Box\Spout\Common\Type;
		
		$pais='G';

		$pais=$_POST["pais"]; 
		$conexion = mysqli_connect('172.17.8.149','claro','Am@rica','live');
		
		
		if($pais=='GT1')
		{
			//$_POST = array();
			//unset($_POST);
			/*if(!$conexion)
			{
				echo "No conectado";
			}
			else
			{
				echo "Conectado";
			}	*/


			$writer = WriterFactory::create(Type::CSV); 

			$hoy = date("dmY");    
			$writer->openToBrowser("Internet_GT_".$hoy.".csv"); 

			 $writer->addRow(array('value1','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype'));

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
			$result = $resultado->get_result();  			
			if($result->num_rows > 0) 
			{     
			    while ($data = $result->fetch_assoc()) 
			    {

					$writer->addRow(array($data['value1'],$data['cpeid'],$data['cid'],$data['cid2'],$data['value2'],$data['statusService'],$data['realStatusOfService'],$data['realStatusDetails'],$data['servicetype']));	    	
			    }
			}

			$writer->close();
			$conexion -> close();

			$pais='G';

		}

		if($pais=='GT2')
		{
			/*if(!$conexion)
			{
				echo "No conectado";
			}
			else
			{
				echo "Conectado";
			}	*/


			$writer = WriterFactory::create(Type::CSV); 

			$hoy = date("dmY");    
			$writer->openToBrowser("Voice_GT_".$hoy.".csv"); 

			 $writer->addRow(array('value1','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype'));

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
					 WHERE serviceType='Voice' AND cpeid IN(SELECT cpeid FROM CPEManager_CPEs WHERE cid='GT')";

 			$resultado = $conexion -> prepare($query);
        	$resultado -> execute();
			$result = $resultado->get_result();  
			$x=2;
			if($result->num_rows > 0) 
			{     
			    while ($data = $result->fetch_assoc()) 
			    {
			 $writer->addRow(array($data['value1'],$data['cpeid'],$data['cid'],$data['cid2'],$data['value2'],$data['statusService'],$data['realStatusOfService'],$data['realStatusDetails'],$data['servicetype']));			    	
					$x=$x+1;
			    }
			}

			$writer->close();

			$conexion -> close();

			$pais='G';

		}	

		if($pais=='GT3')
		{
			/*if(!$conexion)
			{
				echo "No conectado";
			}
			else
			{
				echo "Conectado";
			}	*/


			$writer = WriterFactory::create(Type::CSV); 

			$hoy = date("dmY");    
			$writer->openToBrowser("StaticIP_GT_".$hoy.".csv"); 

			 $writer->addRow(array('value3','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype'));

			$query = "SELECT value3, 
					cpeid, 
					cid, 
					cid2, 
					value2, 
					statusService, 
					realStatusOfService, 
					realStatusDetails, 
					servicetype 
					FROM AXServiceTable
					WHERE serviceType = 'StaticIP' and cpeid IN (SELECT cpeid FROM CPEManager_CPEs where cid = 'GT')";

 			$resultado = $conexion -> prepare($query);
        	$resultado -> execute();
			$result = $resultado->get_result();  
			$x=2;
			if($result->num_rows > 0) 
			{     
			    while ($data = $result->fetch_assoc()) 
			    {
			 $writer->addRow(array($data['value3'],$data['cpeid'],$data['cid'],$data['cid2'],$data['value2'],$data['statusService'],$data['realStatusOfService'],$data['realStatusDetails'],$data['servicetype']));			    	
					$x=$x+1;
			    }
			}

			$writer->close();

			$conexion -> close();

			$pais='G';

		}			
if($pais=='GT4')
		{
			/*if(!$conexion)
			{
				echo "No conectado";
			}
			else
			{
				echo "Conectado";
			}	*/


			$writer = WriterFactory::create(Type::CSV); 

			$hoy = date("dmY");    
			$writer->openToBrowser("Internet_NI_".$hoy.".csv"); 

			 $writer->addRow(array('value1','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype','path'));

			$query = "SELECT a.value1,
        a.cpeid, 
        a.cid, 
        a.cid2, 
        a.value2, 
		a.statusService,
		a.realStatusOfService,
		a.realStatusDetails,
		a.servicetype,
        b.path 
		from AXServiceTable a 
		join CPEManager_CPEs b
		on a.cpeid= b.cpeid
		where serviceType = 'Internet' 
		and a.cpeid in (select cpeid from CPEManager_CPEs where cid = 'GT')";

 			$resultado = $conexion -> prepare($query);
        	$resultado -> execute();
			$result = $resultado->get_result();  
			$x=2;
			if($result->num_rows > 0) 
			{     
			    while ($data = $result->fetch_assoc()) 
			    {
			 $writer->addRow(array($data['value1'],$data['cpeid'],$data['cid'],$data['cid2'],$data['value2'],$data['statusService'],$data['realStatusOfService'],$data['realStatusDetails'],$data['servicetype'],$data['path']));			    	
					$x=$x+1;
			    }
			}

			$writer->close();

			$conexion -> close();

			$pais='G';

		}
		if($pais=='SV1')
		{
			/*if(!$conexion)
			{
				echo "No conectado";
			}
			else
			{
				echo "Conectado";
			}	*/


			$writer = WriterFactory::create(Type::CSV); 

			$hoy = date("dmY");    
			$writer->openToBrowser("Internet_SV_".$hoy.".csv"); 

			 $writer->addRow(array('value1','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype'));

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
					 WHERE serviceType='Internet' AND cpeid IN(SELECT cpeid FROM CPEManager_CPEs WHERE cid='SV')";

 			$resultado = $conexion -> prepare($query);
        	$resultado -> execute();
			$result = $resultado->get_result();  
			$x=2;
			if($result->num_rows > 0) 
			{     
			    while ($data = $result->fetch_assoc()) 
			    {
			 $writer->addRow(array($data['value1'],$data['cpeid'],$data['cid'],$data['cid2'],$data['value2'],$data['statusService'],$data['realStatusOfService'],$data['realStatusDetails'],$data['servicetype']));			    	
					$x=$x+1;
			    }
			}

			$writer->close();

			$conexion -> close();

			$pais='G';

		}

		if($pais=='SV2')
		{
			/*if(!$conexion)
			{
				echo "No conectado";
			}
			else
			{
				echo "Conectado";
			}	*/


			$writer = WriterFactory::create(Type::CSV); 

			$hoy = date("dmY");    
			$writer->openToBrowser("Voice_SV_".$hoy.".csv"); 

			 $writer->addRow(array('value1','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype'));

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
					 WHERE serviceType='Voice' AND cpeid IN(SELECT cpeid FROM CPEManager_CPEs WHERE cid='SV')";

 			$resultado = $conexion -> prepare($query);
        	$resultado -> execute();
			$result = $resultado->get_result();  
			$x=2;
			if($result->num_rows > 0) 
			{     
			    while ($data = $result->fetch_assoc()) 
			    {
			 $writer->addRow(array($data['value1'],$data['cpeid'],$data['cid'],$data['cid2'],$data['value2'],$data['statusService'],$data['realStatusOfService'],$data['realStatusDetails'],$data['servicetype']));			    	
					$x=$x+1;
			    }
			}

			$writer->close();

			$conexion -> close();

			$pais='G';

		}	


		if($pais=='SV3')
		{
			/*if(!$conexion)
			{
				echo "No conectado";
			}
			else
			{
				echo "Conectado";
			}	*/


			$writer = WriterFactory::create(Type::CSV); 

			$hoy = date("dmY");    
			$writer->openToBrowser("StaticIP_SV_".$hoy.".csv"); 

			 $writer->addRow(array('value3','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype'));

			$query = "SELECT value3, 
					cpeid, 
					cid, 
					cid2, 
					value2, 
					statusService, 
					realStatusOfService, 
					realStatusDetails, 
					servicetype 
					FROM AXServiceTable
					WHERE serviceType = 'StaticIP' and cpeid IN (SELECT cpeid FROM CPEManager_CPEs where cid = 'SV')";

 			$resultado = $conexion -> prepare($query);
        	$resultado -> execute();
			$result = $resultado->get_result();  
			$x=2;
			if($result->num_rows > 0) 
			{     
			    while ($data = $result->fetch_assoc()) 
			    {
			 $writer->addRow(array($data['value3'],$data['cpeid'],$data['cid'],$data['cid2'],$data['value2'],$data['statusService'],$data['realStatusOfService'],$data['realStatusDetails'],$data['servicetype']));			    	
					$x=$x+1;
			    }
			}

			$writer->close();

			$conexion -> close();

			$pais='G';

		}	
if($pais=='SV4')
		{
			/*if(!$conexion)
			{
				echo "No conectado";
			}
			else
			{
				echo "Conectado";
			}	*/


			$writer = WriterFactory::create(Type::CSV); 

			$hoy = date("dmY");    
			$writer->openToBrowser("Internet_NI_".$hoy.".csv"); 

			 $writer->addRow(array('value1','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype','path'));

			$query = "SELECT a.value1,
        a.cpeid, 
        a.cid, 
        a.cid2, 
        a.value2, 
		a.statusService,
		a.realStatusOfService,
		a.realStatusDetails,
		a.servicetype,
        b.path 
		from AXServiceTable a 
		join CPEManager_CPEs b
		on a.cpeid= b.cpeid
		where serviceType = 'Internet' 
		and a.cpeid in (select cpeid from CPEManager_CPEs where cid = 'SV')";

 			$resultado = $conexion -> prepare($query);
        	$resultado -> execute();
			$result = $resultado->get_result();  
			$x=2;
			if($result->num_rows > 0) 
			{     
			    while ($data = $result->fetch_assoc()) 
			    {
			 $writer->addRow(array($data['value1'],$data['cpeid'],$data['cid'],$data['cid2'],$data['value2'],$data['statusService'],$data['realStatusOfService'],$data['realStatusDetails'],$data['servicetype'],$data['path']));			    	
					$x=$x+1;
			    }
			}

			$writer->close();

			$conexion -> close();

			$pais='G';

		}
		if($pais=='HN1')
		{
			/*if(!$conexion)
			{
				echo "No conectado";
			}
			else
			{
				echo "Conectado";
			}	*/


			$writer = WriterFactory::create(Type::CSV); 

			$hoy = date("dmY");    
			$writer->openToBrowser("Internet_HN_".$hoy.".csv"); 

			 $writer->addRow(array('value1','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype'));

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
					 WHERE serviceType='Internet' AND cpeid IN(SELECT cpeid FROM CPEManager_CPEs WHERE cid='HN')";

 			$resultado = $conexion -> prepare($query);
        	$resultado -> execute();
			$result = $resultado->get_result();  
			$x=2;
			if($result->num_rows > 0) 
			{     
			    while ($data = $result->fetch_assoc()) 
			    {
			 $writer->addRow(array($data['value1'],$data['cpeid'],$data['cid'],$data['cid2'],$data['value2'],$data['statusService'],$data['realStatusOfService'],$data['realStatusDetails'],$data['servicetype']));			    	
					$x=$x+1;
			    }
			}

			$writer->close();

			$conexion -> close();

			$pais='G';

		}

		if($pais=='HN2')
		{
			/*if(!$conexion)
			{
				echo "No conectado";
			}
			else
			{
				echo "Conectado";
			}	*/


			$writer = WriterFactory::create(Type::CSV); 

			$hoy = date("dmY");    
			$writer->openToBrowser("Voice_HN_".$hoy.".csv"); 

			 $writer->addRow(array('value1','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype'));

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
					 WHERE serviceType='Voice' AND cpeid IN(SELECT cpeid FROM CPEManager_CPEs WHERE cid='HN')";

 			$resultado = $conexion -> prepare($query);
        	$resultado -> execute();
			$result = $resultado->get_result();  
			$x=2;
			if($result->num_rows > 0) 
			{     
			    while ($data = $result->fetch_assoc()) 
			    {
			 $writer->addRow(array($data['value1'],$data['cpeid'],$data['cid'],$data['cid2'],$data['value2'],$data['statusService'],$data['realStatusOfService'],$data['realStatusDetails'],$data['servicetype']));			    	
					$x=$x+1;
			    }
			}

			$writer->close();

			$conexion -> close();

			$pais='G';

		}


		if($pais=='HN3')
		{
			/*if(!$conexion)
			{
				echo "No conectado";
			}
			else
			{
				echo "Conectado";
			}	*/


			$writer = WriterFactory::create(Type::CSV); 

			$hoy = date("dmY");    
			$writer->openToBrowser("StaticIP_HN_".$hoy.".csv"); 

			 $writer->addRow(array('value3','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype'));

			$query = "SELECT value3, 
					cpeid, 
					cid, 
					cid2, 
					value2, 
					statusService, 
					realStatusOfService, 
					realStatusDetails, 
					servicetype 
					FROM AXServiceTable
					WHERE serviceType = 'StaticIP' and cpeid IN (SELECT cpeid FROM CPEManager_CPEs where cid = 'HN')";

 			$resultado = $conexion -> prepare($query);
        	$resultado -> execute();
			$result = $resultado->get_result();  
			$x=2;
			if($result->num_rows > 0) 
			{     
			    while ($data = $result->fetch_assoc()) 
			    {
			 $writer->addRow(array($data['value3'],$data['cpeid'],$data['cid'],$data['cid2'],$data['value2'],$data['statusService'],$data['realStatusOfService'],$data['realStatusDetails'],$data['servicetype']));			    	
					$x=$x+1;
			    }
			}

			$writer->close();

			$conexion -> close();

			$pais='G';

		}	
if($pais=='HN4')
		{
			/*if(!$conexion)
			{
				echo "No conectado";
			}
			else
			{
				echo "Conectado";
			}	*/


			$writer = WriterFactory::create(Type::CSV); 

			$hoy = date("dmY");    
			$writer->openToBrowser("Internet_NI_".$hoy.".csv"); 

			 $writer->addRow(array('value1','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype','path'));

			$query = "SELECT a.value1,
        a.cpeid, 
        a.cid, 
        a.cid2, 
        a.value2, 
		a.statusService,
		a.realStatusOfService,
		a.realStatusDetails,
		a.servicetype,
        b.path 
		from AXServiceTable a 
		join CPEManager_CPEs b
		on a.cpeid= b.cpeid
		where serviceType = 'Internet' 
		and a.cpeid in (select cpeid from CPEManager_CPEs where cid = 'HN')";

 			$resultado = $conexion -> prepare($query);
        	$resultado -> execute();
			$result = $resultado->get_result();  
			$x=2;
			if($result->num_rows > 0) 
			{     
			    while ($data = $result->fetch_assoc()) 
			    {
			 $writer->addRow(array($data['value1'],$data['cpeid'],$data['cid'],$data['cid2'],$data['value2'],$data['statusService'],$data['realStatusOfService'],$data['realStatusDetails'],$data['servicetype'],$data['path']));			    	
					$x=$x+1;
			    }
			}

			$writer->close();

			$conexion -> close();

			$pais='G';

		}

		if($pais=='NI1')
		{
			/*if(!$conexion)
			{
				echo "No conectado";
			}
			else
			{
				echo "Conectado";
			}	*/


			$writer = WriterFactory::create(Type::CSV); 

			$hoy = date("dmY");    
			$writer->openToBrowser("Internet_NI_".$hoy.".csv"); 

			 $writer->addRow(array('value1','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype'));

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
					 WHERE serviceType='Internet' AND cpeid IN(SELECT cpeid FROM CPEManager_CPEs WHERE cid='NI')";

 			$resultado = $conexion -> prepare($query);
        	$resultado -> execute();
			$result = $resultado->get_result();  
			$x=2;
			if($result->num_rows > 0) 
			{     
			    while ($data = $result->fetch_assoc()) 
			    {
			 $writer->addRow(array($data['value1'],$data['cpeid'],$data['cid'],$data['cid2'],$data['value2'],$data['statusService'],$data['realStatusOfService'],$data['realStatusDetails'],$data['servicetype']));			    	
					$x=$x+1;
			    }
			}

			$writer->close();

			$conexion -> close();

			$pais='G';

		}

		if($pais=='NI4')
		{
			/*if(!$conexion)
			{
				echo "No conectado";
			}
			else
			{
				echo "Conectado";
			}	*/


			$writer = WriterFactory::create(Type::CSV); 

			$hoy = date("dmY");    
			$writer->openToBrowser("Internet_NI_".$hoy.".csv"); 

			 $writer->addRow(array('value1','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype','path'));

			$query = "SELECT a.value1,
        a.cpeid, 
        a.cid, 
        a.cid2, 
        a.value2, 
		a.statusService,
		a.realStatusOfService,
		a.realStatusDetails,
		a.servicetype,
        b.path 
		from AXServiceTable a 
		join CPEManager_CPEs b
		on a.cpeid= b.cpeid
		where serviceType = 'Internet' 
		and a.cpeid in (select cpeid from CPEManager_CPEs where cid = 'NI')";

 			$resultado = $conexion -> prepare($query);
        	$resultado -> execute();
			$result = $resultado->get_result();  
			$x=2;
			if($result->num_rows > 0) 
			{     
			    while ($data = $result->fetch_assoc()) 
			    {
			 $writer->addRow(array($data['value1'],$data['cpeid'],$data['cid'],$data['cid2'],$data['value2'],$data['statusService'],$data['realStatusOfService'],$data['realStatusDetails'],$data['servicetype'],$data['path']));			    	
					$x=$x+1;
			    }
			}

			$writer->close();

			$conexion -> close();

			$pais='G';

		}

		if($pais=='NI2')
		{
			/*if(!$conexion)
			{
				echo "No conectado";
			}
			else
			{
				echo "Conectado";
			}	*/


			$writer = WriterFactory::create(Type::CSV); 

			$hoy = date("dmY");    
			$writer->openToBrowser("Voice_NI_".$hoy.".csv"); 

			 $writer->addRow(array('value1','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype'));

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
					 WHERE serviceType='Voice' AND cpeid IN(SELECT cpeid FROM CPEManager_CPEs WHERE cid='NI')";

 			$resultado = $conexion -> prepare($query);
        	$resultado -> execute();
			$result = $resultado->get_result();  
			$x=2;
			if($result->num_rows > 0) 
			{     
			    while ($data = $result->fetch_assoc()) 
			    {
			 $writer->addRow(array($data['value1'],$data['cpeid'],$data['cid'],$data['cid2'],$data['value2'],$data['statusService'],$data['realStatusOfService'],$data['realStatusDetails'],$data['servicetype']));			    	
					$x=$x+1;
			    }
			}

			$writer->close();

			$conexion -> close();

			$pais='G';

		}						

		if($pais=='NI3')
		{
			/*if(!$conexion)
			{
				echo "No conectado";
			}
			else
			{
				echo "Conectado";
			}	*/


			$writer = WriterFactory::create(Type::CSV); 

			$hoy = date("dmY");    
			$writer->openToBrowser("StaticIP_NI_".$hoy.".csv"); 

			 $writer->addRow(array('value3','cpeid','cid','cid2','value2','statusService','realStatusOfService','realStatusDetails','servicetype'));

			$query = "SELECT value3, 
					cpeid, 
					cid, 
					cid2, 
					value2, 
					statusService, 
					realStatusOfService, 
					realStatusDetails, 
					servicetype 
					FROM AXServiceTable
					WHERE serviceType = 'StaticIP' and cpeid IN (SELECT cpeid FROM CPEManager_CPEs where cid = 'NI')";

 			$resultado = $conexion -> prepare($query);
        	$resultado -> execute();
			$result = $resultado->get_result();  
			$x=2;
			if($result->num_rows > 0) 
			{     
			    while ($data = $result->fetch_assoc()) 
			    {
			 $writer->addRow(array($data['value3'],$data['cpeid'],$data['cid'],$data['cid2'],$data['value2'],$data['statusService'],$data['realStatusOfService'],$data['realStatusDetails'],$data['servicetype']));			    	
					$x=$x+1;
			    }
			}

			$writer->close();

			$conexion -> close();

			$pais='G';

		}	


?>
