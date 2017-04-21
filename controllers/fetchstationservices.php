<?php 

include_once '../source/Services.php';
if(isset($_POST)){

	$bd = array('hostname' => 'localhost','username' => 'juan','password' => '123','name' => 'juan_miedsV4');

	$idest = $_POST['idest']; 
	$servicebox = $_POST['service'];

	
$servicionEstacion = new Services($bd, $idest);
$listaServicios = $servicionEstacion->getServicesList();

 // foreach ($listaServicios as $row) {
 // 	echo $row[0]."  -  ".$row[1]."<br>";
 // }

// busca en la bd los servicios que tiene la estacion i
if ($servicebox === NULL) {
	echo "<meta http-equiv='refresh' content='0;URL=../editstation.php' />";
}else {

	function existe($idserv,$listaServicios){
	if ($listaServicios != null) {	
		foreach ($listaServicios as $row) {
			if ($row[1] == $idserv) {
				return true;
			}
		}
		return false;
	}
	return false;
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
	    	//echo var_dump($existeAux);
	    	//echo var_dump($keyservice);
	    	// no esta en la bd entonces agrega
	    	if ($existeAux == false) {
	    		$servicionEstacion->addService($keyservice,"NULL");
	    		//echo var_dump($servicionEstacion);
	    	}
		}
	}
	
}
		
	echo "<meta http-equiv='refresh' content='0;URL=../editstation.php' />";

	


}
 ?>