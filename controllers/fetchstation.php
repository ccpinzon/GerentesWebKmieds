<?php 
include_once '../source/Station.php';
if(isset($_POST)){
		// id de la estacion
// conexion bd

$bd = array('hostname' => 'localhost','username' => 'root','password' => 'root','name' => 'juan_miedsV3');

	    $idest = $_POST['idest']; 
	    $namestation = $_POST['namestation'];
	    $landLine = $_POST['telf'];
	    $mobile= $_POST['telm'];
	    $address = $_POST['direccion'];
	    $description = $_POST['descripcion'];
	    $email = $_POST['email'];

	    $station = new Station($bd,$idest);

	    //$station->set
	    $station->setStationName($namestation);
	    $station->setStationLandline($landLine);
	    $station->setStationMobile($mobile);
	    $station->setStationAddress($address);
	    $station->setStationDescription($description);
	    $station->setStationEmail($email);
	    
		
	}


 ?>