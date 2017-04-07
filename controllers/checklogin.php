<?php
session_start();

?>

<?php

include_once "config.php";


$username = $_POST['username'];
$password = $_POST['password'];




$sql = "SELECT * FROM estacion e
		INNER JOIN usuario u ON u.id_usuario= e.usuario_id_usuario 
		WHERE u.id_usuario = '$username'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {     
 }
 $row = $result->fetch_array(MYSQLI_ASSOC);
 //echo password_hash("user",PASSWORD_DEFAULT).'<BR>';
 //echo $password;
 if (password_verify($password, $row['pass_usuario'])) { 

 	 $_SESSION['id_estacion'] = $row['id_estacion'];
 
     $_SESSION['loggedin'] = true;
     $_SESSION['username'] = $username;     
	 $_SESSION['start'] = time();
	 $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

	    //echo "Bienvenido! " . $_SESSION['username'];
	    //echo "<br><br><a href=panel-control.php>Panel de Control</a>"; 
	  echo "<meta http-equiv='refresh' content='0;URL=../editstation.php' />";

 } else { 
   echo "Username o Password estan incorrectos.";

   echo "<br><a href='../index.php'>Volver a Intentarlo</a>";
 }



@mysqli_close($conn); 



?>