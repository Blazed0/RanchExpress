<?php
header('Content-Type: application/json');  // Para que reconozca que es un archivo json para aplicar funciones

include '../../Modelo/conn.php';
include '../inicio_sesion/sesiones.php';
include '../inicio_sesion/cerrar_sesion.php';

// Este condicional verifica si el parámetro 'id_animal' fue enviado por GET
if (!isset($_GET['id_animal'])) {
    // Si no se envía, se devuelve un mensaje de error en formato json
    echo json_encode(["error" => "Falta el parámetro id_animal"]);
    exit;
}

//el  'id_animal' pasa  a entero para evitar inyecciones SQL
$id_animal = (int) $_GET['id_animal'];

// Consulta SQL para obtener la suma de litros producidos por día para el animal indicado
$sql = "SELECT fecha_produccion, SUM(litros_producidos) AS total_litros
        FROM leche
        WHERE id_animal = ?
        GROUP BY fecha_produccion
        ORDER BY fecha_produccion ASC";

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
    $datos[] = [$contador, (float)$fila['total_litros']];
    $contador++;
}

// Devolvemos los datos codificados en formato JSON
echo json_encode($datos);

// Cerramos la consulta y la conexión
$stmt->close();

$conn ->close();

?>