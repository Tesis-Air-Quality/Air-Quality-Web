<?php
session_start();
	if(!isset($_SESSION['email'])){
		header('Location: login.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bienvenido a tu panel</title>
</head>
<body>

<?php

echo "<a href='logout.php'>Cerrar sesión</a> <br>";
echo $_SESSION['id'];
echo "<br><a href='holis.php'>comentarios</a>"

?>
<h1>Hola</h1>

</body>
</html>