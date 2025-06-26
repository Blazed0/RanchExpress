
<?php
header('Content-Type: application/json');
include '../../Modelo/conn.php';
include '../inicio_sesion/sesiones.php';


// Validar que se envíen los campos necesarios
if (!isset($_POST['kilos']) || !isset($_POST['codigo_animal'])) {
    echo json_encode(["error" => "Faltan datos obligatorios"]);
    exit;
}

$kilos_producidos = floatval($_POST['kilos']);
$codigo_animal = $_POST['codigo_animal'];

// Buscar el ID del animal por su código
$sql_buscar = "SELECT id_animal FROM animal WHERE codigo_animal = ?";
$stmt_buscar = $conn->prepare($sql_buscar);
$stmt_buscar->bind_param("s", $codigo_animal);
$stmt_buscar->execute();
$result = $stmt_buscar->get_result();

if ($result->num_rows === 0) {
    echo json_encode(["error" => "Animal no encontrado con ese código"]);
    exit;
}

$fila = $result->fetch_assoc();
$id_animal = $fila['id_animal'];
$stmt_buscar->close();

// Calcular la producción total hasta ahora
$sql_suma = "SELECT SUM(kilos_producidos) AS total FROM lana WHERE id_animal = ?";
$stmt_suma = $conn->prepare($sql_suma);
$stmt_suma->bind_param("i", $id_animal);
$stmt_suma->execute();
$res_suma = $stmt_suma->get_result();

$produccion_total = 0;
if ($row = $res_suma->fetch_assoc()) {
    $produccion_total = floatval($row['total']);
}
$stmt_suma->close();

// Calcular nueva producción anual
$nueva_produccion = $produccion_total + $kilos_producidos;

// Insertar el nuevo registro
$sql_insert = "INSERT INTO lana (kilos_producidos, produccion_anual, id_animal) VALUES (?, ?, ?)";
$stmt_insert = $conn->prepare($sql_insert);
$stmt_insert->bind_param("ddi", $kilos_producidos, $nueva_produccion, $id_animal);

if ($stmt_insert->execute()) {
    echo json_encode(["success" => "Registro de lana guardado correctamente"]);
} else {
   echo json_encode(["error" => "Error al guardar el registro", "detalle" => $stmt_insert->error]);

}

$stmt_insert->close();
$conn->close();
?>