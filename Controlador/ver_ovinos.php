<?php
include '../Modelo/conn.php';
$contador = "SELECT COUNT(*) AS total FROM animal WHERE especie = 'Ovino' ";
$contador = $conn->query($contador);
if($conteo = $contador->num_rows > 0){
    $conteo = $contador->fetch_assoc();
    $conteoTotal = $conteo['total'];
}
else{
    $conteoTotal = 0;
}

function filtrado($conn,$sexo){
    $sql = "SELECT animal.imagen_animal, animal.nombre, animal.codigo_animal, usuario.nombre AS nombre_usuario FROM animal LEFT JOIN usuario ON animal.id_usuario = usuario.id_usuario WHERE especie = 'Ovino' AND sexo = ? AND etapa_edad = 'Adulto';";
    $resultado = $conn -> prepare($sql);
    $resultado->bind_param("s", $sexo);
    $resultado->execute();
    $result = $resultado->get_result();
    $html= '';
    if($result->num_rows > 0){
        while($filas = $result->fetch_assoc()){
            $html .= '<div class = "col-8 mb-3" style="margin:auto;">
            <div class="card h-100" style="width: 100%;">
            <img src="../Media/Uploads/' . $filas['imagen_animal'] . '" class="card-img-top" alt="Imagen del animal" style="width:100%; height:180px; object-fit:cover; object-position:center;">
            <div class="card-body">
            <h5 class="card-title">' . htmlspecialchars($filas['codigo_animal']) . '</h5>
            <p class="card-text"> Nombre del animal: ' . $filas['nombre'] . '</p>
            <p class="card-text"> Ingresado por: ' . $filas['nombre_usuario'] . '</p>
            <a href="../Vista/hoja_animales.php?token=' . base64_encode($filas['codigo_animal']) . '" class="btn btn-danger w-100 text-wrap" style = "white-space = normal;">Ver información Detallada</a>
            </div>
            </div>
            </div>';
        }
        return $html;
    }
        else {
            $html .= '<div class="card text-center">
            <div class="card-header"> Caprinos </div>
                <div class="card-body">
                <h5 class="card-title">Animales no registrados</h5>
                <p class="card-text">Ingresa un animal y prueba nuevamente.</p>
                <a href="../Vista/registro_animal.php" class="btn btn-danger w-100 text-wrap" style = "white-space = normal;">Registra un nuevo animal</a>
                </div>
                <div class="card-footer text-body-secondary">
                RanchExpress
                </div>
                </div>';
                return $html;
            }
        }
        $htmlHembra = filtrado($conn,'Hembra');
        $htmlMacho = filtrado($conn,'Macho');


    $sqlCrias = "SELECT animal.imagen_animal, animal.nombre, animal.codigo_animal, usuario.nombre AS nombre_usuario FROM animal LEFT JOIN usuario ON animal.id_usuario = usuario.id_usuario WHERE especie = 'Ovino' AND etapa_edad = 'Cria';";
    $resultado = $conn->query($sqlCrias);
    $htmlCrias = '';
    if ($resultado->num_rows>0){
        while($filas = $resultado->fetch_assoc()){
            $htmlCrias .= '<div class = "col-8 mb-3" style="margin:auto;">
            <div class="card h-100" style="width: 100%;">
            <img src="../Media/Uploads/' . $filas['imagen_animal'] . '" class="card-img-top" alt="Imagen del animal" style="width:100%; height:180px; object-fit:cover; object-position:center;">
            <div class="card-body">
            <h5 class="card-title">' . htmlspecialchars($filas['codigo_animal']) . '</h5>
            <p class="card-text"> Nombre del animal: ' . $filas['nombre'] . '</p>
            <p class="card-text"> Ingresado por: ' . $filas['nombre_usuario'] . '</p>
            <a href="../Vista/hoja_animales.php?token=' . base64_encode($filas['codigo_animal']) . '" class="btn btn-danger w-100 text-wrap" style = "white-space = normal;">Ver información Detallada</a>
            </div>
            </div>
            </div>';
        }

    }
    else{
        $htmlCrias ='<div class="card text-center">
            <div class="card-header"> Caprinos </div>
                <div class="card-body">
                <h5 class="card-title">Crias no registrados</h5>
                <p class="card-text">Ingresa un animal y prueba nuevamente.</p>
                <a href="../Vista/registro_animal.php" class="btn btn-danger w-100 text-wrap" style = "white-space = normal;">Registra un nuevo animal</a>
                </div>
                <div class="card-footer text-body-secondary">
                RanchExpress
                </div>
                </div>';
                return $htmlCrias;
    }

?>