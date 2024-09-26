<?php
	session_start();
	if(!isset($_SESSION['email'])){
		header('Location: login.php');
	}

	if(!isset($_SESSION['comentario'])){
		$con= mysqli_connect("localhost", "11991", "conejo.sauce.dados", "11991");

		$comentario=$_POST['comentario'];
		$id = $_SESSION['id'];


		$ssql = "INSERT INTO `comentarios` (`id_usuario`, `comentario`, `fecha_hora`) VALUES ('$id', '$comentario', CURRENT_TIMESTAMP)";

		if ($con->query($ssql) === TRUE) {
		   header("Refresh: 0; URL=../index.php#comentario");
		} else {
		    echo "Error: " . $ssql . "<br>" . $con->error;
		}
   		
	}
	else{
		header("Refresh: 0; URL=../index.php");
	}


?>