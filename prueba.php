<?php 

include_once 'source/Station.php';
include_once 'source/Product.php';
include_once 'source/Services.php';

// conexion bd
$bd = array('hostname' => 'localhost','username' => 'root','password' => 'root','name' => 'juan_miedsV3');


$station = new Station($bd,5004);

$extra = new Product($bd,200,5004); 

$nombreestacion = $station->getStationName();


echo $station->getStationName().'<br>';
echo $station->getStationId().'<br>';
echo $station->getStationLatitude().'<br>';
echo $station->getStationLongitude().'<br>';
echo $station->getStationType().'<br>';
echo $station->getStationPay().'<br>';
echo $station->getStationState().'<br>';
echo $station->getStationUserId().'<br>';
echo $station->getStationDescription().'<br>';
echo $station->getStationRegionId().'<br>';









// $nombre = $station->getStationName();
// echo $station->getStationName();



 ?>