<?php  
	session_start();
	if(isset($_SESSION['email'])){
		header("URL= ../index.php");
	}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   
    <title>Login</title>
</head>

<body>

<div class="container tipo1">
    <div class="card">
    	<form action='login.php' method='POST'>
        <div class="top-row">
            <h1>Iniciar sesión</h1>
            <p></p>
        </div>
        <div class="card-details">
            <input type="text" name="email" placeholder="Ingrese su email" required>
            <i class="fa fa-envelope"></i>
        </div>
        <div class="card-details">
            <input type="password" name="contra" id="password-input" placeholder="Ingrese su contraseña" required minlength="8">
            <i class="fa fa-lock"></i>
            <span><small class="fa-regular fa-eye-slash passcode"></small></span>

        </div>

         <input class="sign-in" type='submit' name='boton' value='Continuar'>
     </form>
        <div class="mensaje">
        <?php

			if (isset($_POST['boton'])) {

				include("login_BD.php");
				
			}

		?>
        </div>

        <p class="sign-up">¿No estás registrado?<a href="register.php"> Registrate</a></p>
        <p></p>
    </div>
</div>
<script type="text/javascript" src="login/login.js"></script>
</body>

</html> 