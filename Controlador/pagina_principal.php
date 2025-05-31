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
<<<<<<< HEAD
    $sqlAnimales = "SELECT imagen_animal,codigo_animal,animal.nombre,usuario.id_usuario, id_animal, usuario.nombre AS nombre_usuario FROM animal LEFT JOIN usuario ON animal.id_usuario = usuario.id_usuario WHERE especie = '$especie' LIMIT $limite ";
=======
    $sqlAnimales = "SELECT * FROM animal WHERE especie = '$especie' LIMIT $limite ";
>>>>>>> 5c0306bf5443da2d237602eb785568085674806a
    $resultado = $conn->query($sqlAnimales);
    $html = ' ';
    if($resultado && $resultado->num_rows>0){
        while($fila = $resultado->fetch_assoc()){
            $html .= generarTarjetas($fila);
        }
<<<<<<< HEAD
        //Lo mismo aca, se devuelve el html al usuario para que lo visualice
        return $html;
    }
    else{
        $html.= '<div class="card text-center">
        <div class="card-header">'
        .$especie.
        '</div>
        <div class="card-body">
        <h5 class="card-title">Animales no registrados</h5>
        <p class="card-text">Ingresa un animal y prueba nuevamente.</p>
        <a href="../Vista/registro_animal.php" class="btn btn-primary">Registra un nuevo animal</a>
        </div>
        <div class="card-footer text-body-secondary">
        RanchExpress
        </div>
        </div>';
        //Aca devuelve el html para mostrarlo al usuario
        return $html;
=======
        return $html;
    }
    else{
        throw new Exception('Error en la busqueda de entradas');
>>>>>>> 5c0306bf5443da2d237602eb785568085674806a
    }
}   
 /* Esto genera las tarjetas */
function generarTarjetas($filas){
<<<<<<< HEAD
    return '<div class = "col-6 mb-3">
            <div class="card h-100" style="width: 100 %;">
            <img src="../Media/Uploads/Adultos/'.$filas['imagen_animal'].'" class="card-img-top" alt="Imagen del animal" style="width:100% ; height:180px ; object-fit:cover ; object-position:center ;">
            <div class="card-body">
            <h5 class="card-title">'.htmlspecialchars($filas['codigo_animal']) .'</h5>
            <p class="card-text"> Nombre del animal: '.$filas['nombre'].'</p>
            <p class="card-text"> Ingresado por: '.$filas['nombre_usuario'].'</p>
            <a href="ver_detalles_animal.php?id= '.$filas['id_animal'].'" class="btn btn-primary">Ver informacion Detallada</a>
            </div>
            </div>
            </div>';
}

=======
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


>>>>>>> 5c0306bf5443da2d237602eb785568085674806a
$htmlOvejas = obtenerAnimal($conn, 'Ovino', 4);
$htmlCabras = obtenerAnimal($conn, 'Caprino', 4);
}
catch(Exception $e){
    $e->getMessage();
}
?>