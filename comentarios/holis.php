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
	<link rel="stylesheet" type="text/css" href="../css/comentarios.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<title>Hola</title>
</head>
<body class="tipo1">
	comentarios:
	<br>
<?php 
	echo $_SESSION['email']; 	
	echo "<br>";
	echo $_SESSION['nombre'];
	echo $_SESSION['apellido'];  

?>
<div class="todo">

	 <form name="add" method="post" action="">
            <input type="submit" name="agregar" value="Agregar comentario">
        </form>
        <br>
        <?php  
        if(isset($_POST['agregar'])){
        	if (isset($_SESSION['email'])) {
        		echo"<div class='container'>
        		<h2>Comentar</h2>
        		<form name='com' id='contactForm' action='comentario_BD.php' method='POST'>

           			 <textarea id='message' name='comentario' rows='4' required></textarea>

            		<button type='submit'>Comentar</button>
        		</form>
    			</div>";
        	}
        	else{
        		include('Location: login.php');
        	}
        	
        }

        	?>
        

<div class='comentarios'>
<?php
	
	
	$con= mysqli_connect("localhost", "11991", "conejo.sauce.dados", "11991");

	if ($con->connect_error) {
    die("Conexión fallida: " . $con->connect_error);
     }

	$ssql = "SELECT comentarios.comentario, usuarios.nombre, usuarios.apellido, comentarios.fecha_hora FROM comentarios INNER JOIN usuarios ON comentarios.id_usuario = usuarios.id_usuario ORDER BY comentarios.fecha_hora DESC";
	$res = mysqli_query($con, $ssql);
	
	if (mysqli_num_rows($res) > 0) {
		

		//$row = mysqli_fetch_array($res, MYSQLI_NUM);
		while($row = $res -> fetch_assoc()){

			$comentario = $row['comentario'];
			$nombre = $row ['nombre'];
			$apellido = $row ['apellido'];
			$fecha_hora = $row['fecha_hora'];


				echo"<div class='com_exist'>
                <div class='comen'>
                    <div class='nombre_apellido grosorb t15'>
                        sofia morleo
                    </div>
                    <div class='fecha_hora gris t10'>
                        10/05
                    </div>
                    <div class='text_comentario tipo1 grosorb'>
                        omg
                    </div>
                </div>
            </div>";

			// echo "<br>comentario de ".$nombre." ". $apellido;
			// echo "<br>+" . $comentario;
		}
}

  ?>

  <!-- <div class="comentarios">
<div class="com_exist">
               
                <div class="comen">
                    <div class="nombre_apellido">
                        
                    </div>
                    <div class="fecha_hora">
                        ncbhbhjbvhb
                    </div>
                    <div class="text_comentario">
                        loremjdnchbdjhbfvhbfdhbvdfbvhjbvjhfhjfbhfbfjhbhjadj
                    </div>
                </div>

           </div>
           </div> -->

</div>
</body>
</html>