<?php 
include_once '../source/Station.php';
if(isset($_POST)){
		// id de la estacion
// conexion bd


	$bd = array('hostname' => 'localhost','username' => 'juan','password' => '123','name' => 'juan_miedsV4');

	    $idest = $_POST['idest']; 
	    $namestation = $_POST['namestation'];
	    $landLine = $_POST['telf'];
	    $mobile= $_POST['telm'];
	    $address = $_POST['direccion'];
	    $description = $_POST['descripcion'];
	    $email = $_POST['email'];


	    //sucursal y gremio 

	    
	    $station = new Station($bd,$idest);

	    //$station->set
	    $station->setStationName($namestation);
	    $station->setStationLandline($landLine);
	    $station->setStationMobile($mobile);
	    $station->setStationAddress($address);
	    $station->setStationDescription($description);
	    $station->setStationEmail($email);

	    echo "<meta http-equiv='refresh' content='0;URL=../editstation.php' />";
	    
		
	}
 ?>