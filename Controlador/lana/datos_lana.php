<?php
header('Content-Type: application/json');  // Para que reconozca que es un archivo json para aplicar funciones

include '../../Modelo/conn.php';
include '../inicio_sesion/sesiones.php';


// Consulta: total de kilos producidos por año(para todos los animales)
$sql = "SELECT produccion_anual, SUM(kilos_producidos) AS total_kilos
        FROM lana
        GROUP BY produccion_anual
        ORDER BY produccion_anual ASC";

$resultado = $conn->query($sql);

// arreglo para almacenar los datos que se enviarán al gráfico
$datos = [];

// Contador para el eje X (puede representar el día en orden)
$contador = 0;

// bucle para recorrer los resultados y convertirlos al formato [x, y] para el grafico
while ($fila = $resultado->fetch_assoc()) {
    //array con el contador como eje X y los litros como eje Y
    $datos[] = ['label' => $fila['produccion_anual'], 'y' => (float)$fila['total_kilos']];

    $contador++;
}

// esto es para enviar los datos en formato json para el grafico
echo json_encode($datos);

$conn ->close();

?>