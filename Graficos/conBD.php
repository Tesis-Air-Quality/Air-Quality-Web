<?php
$servername = "localhost";
$username = "11991";
$password = "conejo.sauce.dados";
$dbname = "11991";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_GET['mes'])) {
    $mesSeleccionado = $_GET['mes'];

    $sql = "SELECT * FROM botellas WHERE DATE_FORMAT(fecha, '%m') = '$mesSeleccionado' ORDER BY fecha ASC";
    $result = $conn->query($sql);

    if ($result === FALSE) {
        die("Error en la consulta: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    } else {
        echo json_encode([]);
    }
} else {
    echo "Mes no proporcionado";
}

$conn->close();
?>
