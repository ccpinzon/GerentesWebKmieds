<?php

session_start();
unset ($SESSION['username']);
session_destroy();

//header('Location: login.html');
 echo "<meta http-equiv='refresh' content='0;URL=../index.php' />";


?>