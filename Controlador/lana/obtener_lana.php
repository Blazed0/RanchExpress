<?php
header('Content-Type: application/json');
include '../../Modelo/conn.php';

// Validamos que haya un token
if (!isset($_GET['token'])) {
    echo json_encode(["error" => "No se recibió el código del animal"]);
    exit;
}

$codigoEncriptado = $_GET['token'];
$codigo_animal = base64_decode($codigoEncriptado);

// Buscar el id_animal
$sql = "SELECT id_animal FROM animal WHERE codigo_animal = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $codigo_animal);
$stmt->execute();
$res = $stmt->get_result();

if ($res->num_rows === 0) {
    echo json_encode(["error" => "Animal no encontrado"]);
    exit;
}

$fila = $res->fetch_assoc();
$id_animal = $fila['id_animal'];
$stmt->close();

// Consulta de datos para el gráfico
$sql = "SELECT produccion_anual, SUM(kilos_producidos) AS total_kilos
        FROM lana
        WHERE id_animal = ?
        GROUP BY produccion_anual
        ORDER BY produccion_anual ASC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_animal);
$stmt->execute();
$resultado = $stmt->get_result();

$datos = [];
$contador = 0;

while ($fila = $resultado->fetch_assoc()) {
    $datos[] = [$contador, (float)$fila['total_kilos']];
    $contador++;
}

echo json_encode($datos);

$stmt->close();
$conn->close();
?>
