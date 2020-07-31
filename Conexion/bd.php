<?php
$mysqli = new mysqli("localhost:3307","root","","jcdingeneriatermica"); 
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
?>