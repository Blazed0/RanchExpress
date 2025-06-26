<?php
header('Content-Type: application/json');
include '../../Modelo/conn.php';

if (!isset($_GET['token'])) {
    echo json_encode(["error" => "Falta el token"]);
    exit;
}

$codigoEncriptado = $_GET['token'];
$codigo_animal = base64_decode($codigoEncriptado);

$sql_buscar = "SELECT id_animal FROM animal WHERE codigo_animal = ?";
$stmt_buscar = $conn->prepare($sql_buscar);
$stmt_buscar->bind_param("s", $codigo_animal);
$stmt_buscar->execute();
$result = $stmt_buscar->get_result();

if ($result->num_rows === 0) {
    echo json_encode([]);
    exit;
}

$fila = $result->fetch_assoc();
$id_animal = $fila['id_animal'];
$stmt_buscar->close();

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
