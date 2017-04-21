<?php
session_start();

?>

<?php

include_once "config.php";


$username = $_POST['username'];
$password = $_POST['password'];




$sql = "SELECT * FROM usuario WHERE nombre_usuario = '$username'";
$tipeUser = ''; 
$result = $conn->query($sql) or die(mysql_error());
echo var_dump($result);
if ($result->num_rows > 0) {     
 }
 $row = $result->fetch_array(MYSQLI_ASSOC);

 if (password_verify($password, $row['pass_usuario']) and $row['tipo_usuario'] == 'G') { 
 	// TRAER LA ESTACION DEL USUARIO LOGEUADO
 	$sqlidest = "SELECT id_estacion  
	FROM estacion e
	INNER JOIN usuario u ON u.id_usuario = e.usuario_id_usuario
	WHERE u.nombre_usuario = '$username'";
	$res = $conn->query($sqlidest) or die(mysql_error());
	if ($res->num_rows > 0) {

 	} $rowId = $res->fetch_array(MYSQLI_ASSOC);

 	 $_SESSION['id_estacion'] = $rowId['id_estacion'];
 
     $_SESSION['loggedin'] = true;
     $_SESSION['username'] = $username;     
	 $_SESSION['start'] = time();
	 $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

	    //echo "Bienvenido! " . $_SESSION['username'];
	    //echo "<br><br><a href=panel-control.php>Panel de Control</a>"; 
	  echo "<meta http-equiv='refresh' content='0;URL=../editstation.php' />";

 } 
 elseif (password_verify($password, $row['pass_usuario']) and $row['tipo_usuario'] == 'A') { 


 
     $_SESSION['loggedin'] = true;
     $_SESSION['username'] = $username;     
	 $_SESSION['start'] = time();
	 $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

	    //echo "Bienvenido! " . $_SESSION['username'];
	    //echo "<br><br><a href=panel-control.php>Panel de Control</a>"; 

	 //REDIRECIONAR A LA PAGINA DE ADMINS
	  echo "SOY ADMIN";

 } 

 else { 
  //echo "Username o Password estan incorrectos.";

   //echo "<br><a href='../index.php'>Volver a Intentarlo</a>";
 }



@mysqli_close($conn); 



?>