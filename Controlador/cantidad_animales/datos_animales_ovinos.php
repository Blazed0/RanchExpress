<?php
header('Content-Type: application/json');  // Para que reconozca que es un archivo json para aplicar funciones

include '../../Modelo/conn.php';
include '../inicio_sesion/sesiones.php';
include '../inicio_sesion/cerrar_sesion.php';

// Consulta: total de animales caprinos
$sql = "SELECT especie, COUNT(*) AS total_animales_ovinos
        FROM animal
        WHERE especie = 'Ovino'
        GROUP BY especie
        ORDER BY especie ASC";

$resultado = $conn->query($sql);


// arreglo para almacenar los datos que se enviarán al gráfico
$datos = [];

// Contador para el eje X (puede representar el día en orden)
$contador = 0;

// bucle para recorrer los resultados y convertirlos al formato [x, y] para el grafico
while ($fila = $resultado->fetch_assoc()) {
    //array con el contador como eje X y los litros como eje Y
    $datos[] = ['label' => $fila['especie'], 'y' => (float)$fila['total_animales_ovinos']];

    $contador++;
}

// esto es para enviar los datos en formato json para el grafico
echo json_encode($datos);

$conn ->close();

?>