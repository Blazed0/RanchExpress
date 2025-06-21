<?php
header('Content-Type: application/json');

include '../../Modelo/conn.php';
include '../inicio_sesion/sesiones.php';


// Validar que se enviaron los datos por POST
if (!isset($_POST['fecha_produccion']) || !isset($_POST['litros']) || !isset($_POST['codigo_animal'])) {
    echo json_encode(["error" => "Faltan datos obligatorios"]);
    exit;
}

// Obtener los datos del formulario
$fecha_produccion = $_POST['fecha_produccion'];
$litros_producidos = $_POST['litros'];
$codigo_animal = $_POST['codigo_animal'];

$sql_buscar = "SELECT id_animal FROM animal WHERE codigo_animal = ?";
$stmt_buscar = $conn->prepare($sql_buscar);
$stmt_buscar->bind_param("i", $codigo_animal);
$stmt_buscar->execute();
$result = $stmt_buscar->get_result();

if ($result->num_rows === 0) {
    echo json_encode(["error" => "No se encontró el animal con el código ingresado"]);
    exit;
}

$fila = $result->fetch_assoc();
$id_animal = $fila['id_animal'];
$stmt_buscar->close();


$insert = $conn->prepare("INSERT INTO leche (fecha_produccion, litros_producidos, id_animal) VALUES (?, ?, ?)");
$insert->bind_param("sii", $fecha_produccion, $litros_producidos, $id_animal);
$insert->execute();
$insert->close();
// Ahora obtener el total de litros por día para ese animal
$sql = "SELECT fecha_produccion, SUM(litros_producidos) AS total_litros
        FROM leche
        WHERE id_animal = ?
        GROUP BY fecha_produccion
        ORDER BY fecha_produccion ASC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_animal);
$stmt->execute();
$resultado = $stmt->get_result();

$datos = [];
$contador = 0;

while ($fila = $resultado->fetch_assoc()) {
    $datos[] = [$contador, (float)$fila['total_litros']];
    $contador++;
}

echo json_encode($datos);

$stmt->close();
$conn->close();


?>
