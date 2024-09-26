
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Register</title>
</head>

<body>

<div class="container tipo1">
    <div class="card">
    	<form action='register.php' method='POST'>
        <div class="top-row">
            <h1>Registrarse</h1>
            <p></p>
        </div>
        <div class="card-details">
            <input type="text" name="email" placeholder="Email" required>
            <i class="fa fa-envelope"></i>
        </div>
        <div class="card-details">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <i class="fa-solid fa-user"></i>
        </div>
        <div class="card-details">
            <input type="text" name="apellido" placeholder="Apellido" required>
            <i class="fa-solid fa-user"></i>
        </div>
        <div class="card-details">
            <input type="date" name="fecha_nac" placeholder="fecha de Nacimiento" required>
            
        </div>

        <div class="card-details">
            <input type="password" name="contra" id="password-input" placeholder="Contraseña" required minlength="8">
            <i class="fa fa-lock"></i>
            <span><small class="fa fa-eye-slash passcode"></small></span>
        </div>

        <div class="card-details">
            <input type="password" name="repcontra" id="password-input2" placeholder="Repetir Contraseña" required minlength="8">
            <i class="fa fa-lock"></i>
            <span><small class="fa fa-eye-slash passcode2"></small></span>
        </div>

         <input class="sign-in" type='submit' name='boton' value='Registrarte'>
     </form>
       <div class="mensaje">
        <?php

			if (isset($_POST['boton'])) {

				include("register_BD.php");
				
			}

		?>
	</div>
    <p class="sign-up">Ya estas registrado? <a href="login.php">Iniciar sesión</a></p>

    </div>
</div>
<script type="text/javascript" src="login/login.js"></script>
</body>

</html> 