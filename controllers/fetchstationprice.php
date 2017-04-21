<?php 
include_once '../source/Product.php';
if (isset($_POST)) {

	$bd = array('hostname' => 'localhost','username' => 'juan','password' => '123','name' => 'juan_miedsV4');

	$idest = $_POST["idest"];
	$pricecorriente = $_POST["corriente"];
	$priceextra = $_POST["extra"];
	$pricediesel = $_POST["diesel"];
	$pricegnv = $_POST["gnv"];


	$productoCorriente = new Product($bd,201,$idest);
	$productoCorriente->setProductPrice($pricecorriente);

	$productoExtra = new Product($bd,200,$idest);
	$productoExtra->setProductPrice($priceextra);

	$productoDiesel = new Product($bd,202,$idest);
	$productoDiesel->setProductPrice($pricediesel);

	$productoGnv = new Product($bd,203,$idest);
	$productoGnv->setProductPrice($pricegnv);

	 echo "<meta http-equiv='refresh' content='0;URL=../editstation.php' />";



}



?>