<?php 

	include 'database.php';

	// definimos que la página será un json
	header("Content-Type: application/json");

	// conecta con la base de datos
	$db = new DataBase();

	// trae las ultimas 10 lecturas de la tabla sensores
	$res = $db->query("SELECT * FROM botellas);

	// pasamos los registros a un vector
	while ($fila[] = $res->fetch_array(MYSQLI_ASSOC)) {
	}

	unset($fila[count($fila)-1]);

	// pasamos el vector de registros a body
	$body = $fila;

	// imprime en la página el json
	echo json_encode($body);

 ?>