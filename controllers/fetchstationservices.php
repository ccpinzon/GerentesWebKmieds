<?php 

include_once '../source/Services.php';
if(isset($_POST)){
$bd = array('hostname' => 'localhost','username' => 'root','password' => 'root','name' => 'juan_miedsV3');

	$idest = $_POST['idest']; 

	$idmay = $_POST['idmay'];
	$iddep = $_POST['iddep'];
	$servicebox = $_POST['service'];

	
$servicionEstacion = new Services($bd, $idest, $idmay, $iddep);
$listaServicios = $servicionEstacion->getServicesList();

// foreach ($listaServicios as $row) {
// 	echo $row[0]."  -  ".$row[1]."<br>";
// }

// busca en la bd los servicios que tiene la estacion 
	function existe($idserv,$listaServicios){
	if ($listaServicios != null) {	
		foreach ($listaServicios as $row) {
			if ($row[1] == $idserv) {
				return true;
			}
		}
		return false;
	}
	}

	if ($listaServicios != null ) {
		$status;
	foreach ($listaServicios as $row) {
		
		foreach ($servicebox as $rowBox) {
			if ($row[1] == $rowBox) {
				$status = true;
				break;
			}
			$status = false;
		}

		if ($status == true) {
			
		}else{
			$statusDelete = $servicionEstacion->deleteService($row[1]);
		}


	}
	}
	

	if ($servicebox !=null ) {
		foreach($servicebox as $keyservice){
	    	$existeAux = existe($keyservice,$listaServicios);
	    	// no esta en la bd entonces agrega
	    	if ($existeAux == false) {
	    		$servicionEstacion->addService($keyservice,"NULL");
	    	}
		}
	}
	
		
	echo "<meta http-equiv='refresh' content='0;URL=../editstation.php' />";

	


}
 ?>