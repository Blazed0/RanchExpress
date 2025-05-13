<?php
require("../Modelo/conn.php");
$conn->begin_transaction();

try{
    $mes = date("m");
    $año  = Date("Y");

    $sqlFechas = "SELECT COUNT(*) AS nuevosIngresos FROM animal WHERE YEAR(animal.fecha_ingreso) = $año AND MONTH(animal.fecha_ingreso) = $mes";
    $result = $conn->query($sqlFechas);
    if($filasCoincidentes = $result->num_rows > 0){
        $asociarConteo = $result->fetch_assoc();
        $totalResultados = $asociarConteo['nuevosIngresos'];
    }
    else{
        throw new Exception("0");
    }
    /* Esto genera las tarjetas */
function generarTarjetas($filas){
    return '<div class="card" style="width: 15rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">'.htmlspecialchars($filas['codigo_animal']) .'</h5>
            <p class="card-text">Peso del animal: '.$filas['peso'].'</p>
            <p class="card-text"> Proposito del animal: '.$filas['proposito'].'</p>
            <p class="card-text"> Ingresado por: '.$filas['id_usuario'].'</p>
            <p class="card-text"> Edad del animal: '.$filas['edad'].'</p>
            <a href="ver_detalles_animal.php?id= '.$filas['id_animal'].'" class="btn btn-primary">Ver informacion Detallada</a>
            </div>
            </div>';
}
/* Esto es el que define que clase de animal se va a mostrar */
function obtenerAnimal($conn, $especie, $limite){
    $sqlAnimales = "SELECT * FROM animal WHERE especie = '$especie' LIMIT $limite";
    $resultado = $conn->query($sqlAnimales);

    if($resultado && $resultado->num_rows>0){
        while($fila = $resultado->fetch_assoc()){
            $html = generarTarjetas($fila);
        }
        return $html;
    }
    else{
        throw new Exception('Error en la busqueda de entradas');
    }
}
$htmlBovinos = obtenerAnimal($conn, 'Bovino', 4);
$htmlCabras = obtenerAnimal($conn, 'cabra', 4);
$htmlGallinas = obtenerAnimal($conn, 'gallina', 4);
$htmlGallinas = obtenerAnimal($conn, 'porcino', 4);



}
catch(Exception $e){
    $e->getMessage();
}
?>