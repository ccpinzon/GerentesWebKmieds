<?php 

include_once 'source/Station.php';
include_once 'source/Product.php';
include_once 'source/Services.php';

// conexion bd
$bd = array('hostname' => 'localhost','username' => 'root','password' => 'root','name' => 'juan_miedsV3');


$station = new Station($bd,5004);

$nombreestacion = 
$lat = 


$tabla = $station->getStationTable();
foreach ($tabla as $row => $data) {
	
		echo $data;
	
}

$nombre = array();




// $nombre = $station->getStationName();
// echo $station->getStationName();



 ?>