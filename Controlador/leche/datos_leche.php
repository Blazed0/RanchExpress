<?php
header('Content-Type: application/json');  // Para que reconozca que es un archivo json para aplicar funciones

include '../../Modelo/conn.php';
include '../inicio_sesion/sesiones.php';

// Consulta: total de litros producidos por día (para todos los animales)
$sql = "SELECT fecha_produccion, SUM(litros_producidos) AS total_litros
        FROM leche
        GROUP BY fecha_produccion
        ORDER BY fecha_produccion ASC";

$resultado = $conn->query($sql);

// arreglo para almacenar los datos que se enviarán al gráfico
$datos = [];


// bucle para recorrer los resultados y convertirlos al formato [x, y] para el grafico
while ($fila = $resultado->fetch_assoc()) {
    $datos[] = ['label' => $fila['fecha_produccion'],
    'y'=>(float)$fila['total_litros']];
    
}

// esto es para enviar los datos en formato json para el grafico
echo json_encode($datos);
$conn ->close();

?>