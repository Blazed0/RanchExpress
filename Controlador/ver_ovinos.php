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
$sql = "SELECT animal.imagen_animal, animal.nombre, animal.codigo_animal, usuario.nombre AS nombre_usuario FROM animal LEFT JOIN usuario ON animal.id_usuario = usuario.id_usuario WHERE especie = 'Ovino';";
$result = $conn -> query($sql);
$html = '';
if($result && $result->num_rows > 0){
    while($filas = $result->fetch_assoc()){
        $html .= '<div class = "col-6 mb-3">
                <div class="card h-100" style="width: 100%;">
                <img src="../Media/Uploads/' . $filas['imagen_animal'] . '" class="card-img-top" alt="Imagen del animal" style="width:100%; height:180px; object-fit:cover; object-position:center;">
                <div class="card-body">
                <h5 class="card-title">' . htmlspecialchars($filas['codigo_animal']) . '</h5>
                <p class="card-text"> Nombre del animal: ' . $filas['nombre'] . '</p>
                <p class="card-text"> Ingresado por: ' . $filas['nombre_usuario'] . '</p>
                <a href="../Vista/hoja_animales.php?token=' . $filas['codigo_animal'] . '" class="btn btn-danger w-100 text-wrap" style = "white-space = normal;">Ver información Detallada</a>
                </div>
                </div>
                </div>';
    }
}
else{
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
}
?>