<?php
require("../Modelo/conn.php");

$conn->begin_transaction();

try{

    $sqlIngresos = "SELECT COUNT(*) AS totalIngresos FROM animal";
    $result = $conn->query($sqlIngresos);
    if($filasCoincidentes = $result->num_rows > 0){
        $asociarConteo = $result->fetch_assoc();
        $totalResultados = $asociarConteo['totalIngresos'];
    }
    else{
        throw new Exception("0");
    }
    /* Esto es el que define que clase de animal se va a mostrar */
    function obtenerAnimal($conn, $especie, $limite){
    $sqlAnimales = "SELECT * FROM animal WHERE especie = '$especie' LIMIT $limite ";
    $resultado = $conn->query($sqlAnimales);
    $html = ' ';
    if($resultado && $resultado->num_rows>0){
        while($fila = $resultado->fetch_assoc()){
            $html .= generarTarjetas($fila);
        }
        return $html;
    }
    else{
        throw new Exception('Error en la busqueda de entradas');
    }
}   
 /* Esto genera las tarjetas */
function generarTarjetas($filas){
    return '<div class="card" style="width: 15rem;">
            <img src="'. $filas['imagen_animal'] .'" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">'.htmlspecialchars($filas['codigo_animal']) .'</h5>
            <p class="card-text"> Nombre del animal: '.$filas['nombre'].'</p>
            <p class="card-text"> Ingresado por: '.$filas['id_usuario'].'</p>
            <a href="ver_detalles_animal.php?id= '.$filas['id_animal'].'" class="btn btn-primary">Ver informacion Detallada</a>
            </div>
            </div>';
}


$htmlOvejas = obtenerAnimal($conn, 'Ovino', 4);
$htmlCabras = obtenerAnimal($conn, 'Caprino', 4);
}
catch(Exception $e){
    $e->getMessage();
}
?>