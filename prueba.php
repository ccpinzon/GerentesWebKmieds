<?php 

include_once 'source/Station.php';
include_once 'source/Product.php';
include_once 'source/Services.php';

// conexion bd
$bd = array('hostname' => 'localhost','username' => 'root','password' => 'root','name' => 'juan_miedsV3');


$station = new Station($bd,5005);

$extra = new Product($bd,200,5005); 

$nombreestacion = $station->getStationName();


$stationId = "5094";
$stationSupplierId = "6";
$stationRegionId = "BOY";

$servicionEstacion5099 = new Services($bd, $stationId, $stationSupplierId, $stationRegionId);
$listaServicios = $servicionEstacion5099->getServicesList();


foreach ($listaServicios as $row) {
    
    foreach ($row as $value) {
        echo $value." ";
    }
    echo "<br>";
}

// $nombre = $station->getStationName();
// echo $station->getStationName();



 ?>