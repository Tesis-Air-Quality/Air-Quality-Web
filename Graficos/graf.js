<?php
// Establecer la conexión a la base de datos (pueden variar los datos de conexión)
$servername = "localhost";
$username = "11991";
$password = "conejo.sauce.dados";
$dbname = "11991";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el mes desde la petición
if (isset($_GET['mes'])) {
    $mesSeleccionado = $_GET['mes'];

    // Realizar la consulta filtrada por el mes seleccionado
    $sql = "SELECT * FROM botellas WHERE DATE_FORMAT(fecha, '%m') = '$mesSeleccionado'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = array();
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        // Devolver los datos en formato JSON
        echo json_encode($data);
    } else {
        echo json_encode([]);
    }
} else {
    echo "Mes no proporcionado";
}

$conn->close();
?>
