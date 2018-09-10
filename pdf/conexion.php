<?php 
	$mysqli = new mysqli("localhost", "root", "", "zonasport");
	if(mysqli_connect_errno())
	{
		echo 'Conexión fallida: ', mysqli_connect_errno();
		exit();
	}
?>