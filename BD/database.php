<?php 

	include 'credenciales.php';

	
		$conn= new mysqli(HOST, USER, PASS, DB, PORT);

		if ($conn->connect_error) {

    	die("Conexión fallida: " . $conn->connect_error);
		}
			

 ?>