<?php

						if($_POST['contra'] == $_POST['repcontra']){
						$con= mysqli_connect("localhost", "11991", "conejo.sauce.dados", "11991");

						$email=$_POST['email'];
						$contrase=$_POST['contra'];
						$nombre=$_POST['nombre'];
						$apellido=$_POST['apellido'];
						$fecha_nac=$_POST['fecha_nac'];


						$ssql = "SELECT * FROM `usuarios` WHERE `email` = '$email'";
						$res = mysqli_query($con, $ssql);
				   		
						if (mysqli_num_rows($res) > 0) {

								echo"<h4> Email ya registrado </h4>"; 
						}
						else{
							
							$ssql ="INSERT INTO `usuarios` (`email`, `nombre`, `apellido`, `pass`, `fecha_nac`) VALUES ('$email','$nombre','$apellido','$contrase','$fecha_nac')";
							$respu = mysqli_query($con, $ssql);

							echo "<h3> Se creó el usuario </h3>";
							header("Refresh: 1; URL=login.php");
							exit;
						}
						}
						else{
							echo"<h4> Contraseñas Diferentes </h4>";
						}



?>