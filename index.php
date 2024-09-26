<?php 
$agregar =false;
session_start();

if (isset($_POST['agregar'])) {
    if (!isset($_SESSION['email'])) {
        header("Location: comentarios/login.php");
        exit;
    }
    else{
        $agregar=true;
    }
}
// header("Location: jiji.php");
// exit;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="descriction" content="aplicacion de proyecto colibri">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/mediaqueridas.css">
    <link rel="stylesheet" type="text/css" href="css/comentarios.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <!-- es para los logos de google icons  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!--  es para el logito -->
    <title>Colibrí</title>
    <link rel="icon" href="img/colibsinfondo.png">
</head>

    <body class="tipo1">
        <!-- menu -->
        <header class="black mayuscula">
            <link rel="icon" href="img/colibsinfondo.png">
        
    <div class="logo t15 tipo1" onclick="redirigirAIndex()">     
           
    <img src="img/colibsinfondo.png" width="70px" height="70px">
            Colibrí
    </div>
        <script>
            function redirigirAIndex() {
                window.location.href = 'index.php';
           }
        </script>

        <button id="abrir" class="menu_celu_abrir"><i class="fa-solid fa-bars"></i></button>

        <div class="menu t15" id="menu">

            <button class="menu_celu_cerrar" id="cerrar"><i class="fa-solid fa-x"></i></button>
            <ul class="lista black">
                <li class="black"><a href="quienes_somos.html">¿Quiénes Somos?</a></li>
                <!-- <li><a href="#nosotras">Encargados</a></li> -->
                <li><a href="#contac">Contactanos</a></li>
                <?php 
                if (isset($_SESSION['email'])) {
                    echo "<li><a href='comentarios/logout.php'><p>Cerrar Sesión</p></a></li>";  
                }
                else{
                    echo"<li><a href='comentarios/login.php'><p>Iniciar Sesión</p></a></li>";
                }
                 ?>
                <!-- <li><a href="https://instagram.com/pro.colibri?igshid=MzRlODBiNWFlZA=="><i
                            class="fa-brands fa-instagram t20"> </i></a></li> -->
            </ul>


        </div>
    </header>
    

    <!-- inicio -->
    <div class="inicio">
        <div class="todo">
            <div class="titulo tipo1">
                <h1 class="t80 centrar tipo1">Proyecto Colibrí</h1>
                <a href="https://escuelarobertoarlt.com.ar/" class="black t20">E.E.S.T. N°3</a>
            </div>
            <!-- <img src="img/termo.png"> -->
        </div>
    </div>

    <!-- que es colibri -->
    <div class="coli white">
        <div class="info_QueEs mayuscula">
            <h2 class="t45">Colibrí</h2>
            <p class="t25">ES UNA AYUDA AL MEDIO AMBIENTE IMPLEMENTANDO LA TECNOLOGÍA. NOSOTRAS NOS ENFOCAMOS EN EL RECICLANDO DE BOTELLAS PLÁSTICAS Y LA REUTILIZACIÓN DEL MATERIAL RECUPERADO.</p>
           <a href="mas/info.html" class="white t15">más información </a>
        </div>
        <img src="img/botellas.png" alt="botella">
    </div>

    <div class="info tipo1 white">
        <div class="card">
            <div class="card_division">
                <div class="informacion_de_img centrar">
                    <h3 class="mayuscula">Contaminación</h3>
                    <p>Las botellas constituyen un grave factor de contaminación. Si se incinera el plástico, se producen vapores tóxicos que contaminan de forma muy grave el medio ambiente. Si se la tira a la basura, acaba en un vertedero. Y los compuestos con los que está fabricada pueden tardar siglos en degradarse completamente.</p>
                </div>
                    <img src="img/contaminacion.jpg" alt="botella">
            </div>

            <div class="card_division reverse">

               

                <div class="informacion_de_img centrar">
                    <h3 class="mayuscula">Botella de hierro</h3>
                    <p>Contamos con una botella de acopio de plástico, que tiene un contador. El cual va recargando los datos en esta página para así saber un aproximo de las botellas plásticas que recibió. Así recuperar el material pet para luego hacer distintos objetos con el mismo, como macetas, loncheras, entre otros.</p>
                </div>
                <img src="img/botella_hierro.png" alt="botella">

            </div>

            <div class="card_division">

                <div class="informacion_de_img centrar">
                    <h3 class="mayuscula">¿Qué vamos a hacer?</h3>
                    <p>Con el plástico recuperado, en una termoformadora haremos macetas para realizar futuros techos verdes. Los techos verdes con plantas nativas permiten moderar el exceso de temperatura, y aportan tanto para la conservación de biodiversidad como para moderar los impactos del cambio climático global.</p>
                </div>
                <img src="img/placa-plastico-recicladoo.jpg" alt="botella">

            </div>

        </div>

    </div>

    <div class="contenedorv" id="comentario">
    </div>

    <div class="seccion_comentarios" id="comentario">


        <form name="add" method="post" action="index.php#comentario">
            <input type="submit" name="agregar" value="Agregar comentario">
        </form>

        <?php  
            if ($agregar) {
                echo"<div class='container'>
                <h2>Comentar</h2>
                <form name='com' id='contactForm' action='comentarios/comentario_BD.php' method='POST'>

                     <textarea id='message' name='comentario' rows='4' required></textarea>

                    <button type='submit'>Comentar</button>
                </form>
                </div>";     
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


                echo"<div class='com_exist'>";
                echo"<div class='comen'>";
                    echo"<div class='nombre_apellido grosorb t15'>";
                    echo $nombre." ".$apellido;
                    echo "</div>";
                    echo"<div class='fecha_hora grey t10'>";
                        echo $fecha_hora;
                    echo"</div>";
                    echo"<div class='text_comentario tipo1 grosorb'>";
                        echo $comentario;
                    echo"</div>";
                echo"</div>";
            echo"</div>";

        }
}

  ?>

    
  </div>
  </div> 

    <!-- <div class="separador"></div> -->
<div class="vacio">
</div>

    <div class="contador tipo2">
        <h1 tipo1>Contador de botellas</h1>
        <div class="contenido_cont">
            <div class="pepe">
            <div id="contador" class="conta_num tipoNUM">
                <span id="botellas" class="t40">
                    <div class="cargando">Cargando..</div>
                </span>
            </div>
            <div class="botonest grosorb tipo1">
                <li><a href="Graficos/grafico.html">Ver estadísticas</a></li>
            </div>
            </div>
            <img src="img/botellas (3).png">
        </div>

    </div>

    <!-- <div class="nosotras tipo1 " id="nosotras">
        <div class="todo t45">
            <h2>NOSOTRAS</h2>
            <div class="linea"></div>
            <div class="cudri_foto">
                <img src="img/mavi.jpg">
                <img src="img/sofia.jpg">
                <img src="img/kharlyt.jpg">
            </div>
            <div class="linea"></div>
        </div>


    </div> -->

    <footer id="footer">
        <div class="participantes">
            <div class="white tipo1">
                <h3 class="t30" id="participantes">Equipo encargado</h3>
                <ul class="t20">
                    <li>Sofia Morleo</li>
                    <li>Maria Victoria Scherbin</li>
                    <li>Kharlyt Delgadillo</li>
                </ul>
                    <h3 class="t30">Contribuyentes del proyecto</h3>
                    <ul class= "t20">
                    <li>Coperativas RSU</li>
                    <li>ISFT instituto superior de formación técnica 234</li>
                    <li>Escuela Técnica N°3</li>
                    <li>Escuela Secundaria N°7</li>
                    <li>D'natalini</li>
                </ul>
                <div class="contacto">
                    <!-- <br><br> -->
                    <h3 class="t25" id="contac">Contactos</h3>
                    <p><a href="https://instagram.com/pro.colibri?igshid=MzRlODBiNWFlZA==" target="_blank"
                            class="tipo1 t19 white"><i class="fa-brands fa-instagram"></i> pro.colibri</a></p>
                    <p><a href="tel:+54 11-6867-2720" class="tipo1 t19 white"><i
                                class="fa-solid fa-phone tipo1 t19 white"></i> +54 11-6967-2720</a></p>
                </div>

            </div>
        </div>
    </footer>

    <script src="javascript/main.js"></script><!-- llamo al script para que funcione el menu -->
    <script src="javascript/QS.js"></script>
</body>

</html>