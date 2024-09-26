<?php
	

	$con= mysqli_connect("localhost", "11991", "conejo.sauce.dados", "11991");

	if ($con->connect_error) {
    die("Conexión fallida: " . $con->connect_error);
     }
	$email=$_POST['email'];
	$contrase=$_POST['contra'];


	$ssql = "SELECT * FROM `usuarios` WHERE `email` = '$email' AND `pass` = '$contrase' ";
	$res = mysqli_query($con, $ssql);
	

	if (mysqli_num_rows($res) > 0) {
		

		$row = mysqli_fetch_array($res, MYSQLI_NUM);

		$_SESSION['email'] = $email;
		$_SESSION['id'] = $row[0];
		$_SESSION['nombre'] = $row[3];
		$_SESSION['apellido'] = $row[4];
		
		echo"<h3>Se inició sesión</h3>";
		header("Refresh: 1; URL=../index.php");//redireccionar a panel.php  y que espere 1 segundos  panel.php
		exit;
	}
	else{
		echo "<h4> Email o Contraseña Incorrecta </h4>";
		
	}

?>