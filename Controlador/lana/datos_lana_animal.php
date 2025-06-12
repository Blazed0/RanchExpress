<?php
header('Content-Type: application/json');

include '../../Modelo/conn.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include '../inicio_sesion/sesiones.php';
include '../inicio_sesion/cerrar_sesion.php';

if (!isset($_POST['kilos']) || !isset($_POST['codigo_animal'])) {
    echo json_encode(["error" => "Faltan datos obligatorios"]);
    exit;
}

// Obtener los datos del formulario
$kilos_producidos = floatval($_POST['kilos']);
$codigo_animal = $_POST['codigo_animal'];

// Obtener el id_animal a partir del código
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

// Consultar la producción acumulada hasta ahora
$consulta_suma = $conn->prepare("SELECT SUM(kilos_producidos) AS total FROM lana WHERE id_animal = ?");
$consulta_suma->bind_param("i", $id_animal);
$consulta_suma->execute();
$res = $consulta_suma->get_result();

$produccion_total = 0;
if ($fila = $res->fetch_assoc()) {
    $produccion_total = floatval($fila['total']);
}
$consulta_suma->close();

// Calcular la nueva producción anual
$produccion_anual = $produccion_total + $kilos_producidos;

// Insertar nuevo registro
$insert = $conn->prepare("INSERT INTO lana (kilos_producidos, produccion_anual, id_animal) VALUES (?, ?, ?)");
$insert->bind_param("ddi", $kilos_producidos, $produccion_anual, $id_animal);
$insert->execute();
$insert->close();
// Consulta SQL para obtener la suma de kilos producidos por animal por añ
$sql = "SELECT produccion_anual, SUM(kilos_producidos) AS total_kilos
        FROM lana
        WHERE id_animal = ?
        GROUP BY produccion_anual
        ORDER BY produccion_anual ASC";

// se prepara la  sentencia SQL para evitar inyección de código
$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $id_animal);

$stmt->execute();


$resultado = $stmt->get_result();

//array para almacenar los datos que se devolverán en formato JSON
$datos = [];
$contador = 0;

// bucle para recorrer los resultados y convertirlos al formato [x, y] para el grafico
while ($fila = $resultado->fetch_assoc()) {
    //array con el contador como eje X y los litros como eje Y
    $datos[] = [$contador, (float)$fila['total_kilos']];
    $contador++;
}

// Devolvemos los datos codificados en formato JSON
echo json_encode($datos);

// Cerramos la consulta y la conexión
$stmt->close();

$conn ->close();

?>