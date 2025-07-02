<?php
header('Content-Type: application/json');  // Para que reconozca que es un archivo json para aplicar funciones

include '../../Modelo/conn.php';
include '../inicio_sesion/sesiones.php';


// Consulta: total de kilos producidos por año(para todos los animales)
$sql = "SELECT año_produccion, SUM(kilos_producidos) AS total_kilos
        FROM lana
        GROUP BY año_produccion
        ORDER BY año_produccion ASC";

$resultado = $conn->query($sql);

// arreglo para almacenar los datos que se enviarán al gráfico
$datos = [];

// Contador para el eje X (puede representar el día en orden)


// bucle para recorrer los resultados y convertirlos al formato [x, y] para el grafico
while ($fila = $resultado->fetch_assoc()) {
    $datos[] = ['label' => $fila['año_produccion'], 'y' => (float)$fila['total_kilos']];
}

// esto es para enviar los datos en formato json para el grafico
echo json_encode($datos);

$conn ->close();

?>