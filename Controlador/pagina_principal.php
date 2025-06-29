<?php
require("../Modelo/conn.php");

$conn->begin_transaction();

try {

    $sqlIngresos = "SELECT COUNT(*) AS totalIngresos FROM animal";
    $result = $conn->query($sqlIngresos);
    if ($filasCoincidentes = $result->num_rows > 0) {
        $asociarConteo = $result->fetch_assoc();
        $totalResultados = $asociarConteo['totalIngresos'];
    } else {
        throw new Exception("0");
    }

    // Esto es el que define qué clase de animal se va a mostrar
    function obtenerAnimal($conn, $especie, $limite) {
        $sqlAnimales = "SELECT imagen_animal, codigo_animal, animal.nombre, usuario.id_usuario, id_animal, usuario.nombre AS nombre_usuario 
        FROM animal 
        LEFT JOIN usuario 
        ON animal.id_usuario = usuario.id_usuario 
        WHERE especie = ? 
        ORDER BY `animal`.`id_animal` DESC
        LIMIT ?";
        $stmt = $conn->prepare($sqlAnimales);
        $stmt->bind_param("si", $especie, $limite); 
        $stmt->execute();
        $resultado = $stmt->get_result();
        $html = '';
        if ($resultado && $resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $html .= generarTarjetas($fila);
            }
            $stmt->close(); 
            return $html;
        } else {
            $html .= '<div class="card text-center">
                <div class="card-header">' . $especie . '</div>
                <div class="card-body">
                <h5 class="card-title">Animales no registrados</h5>
                <p class="card-text">Ingresa un animal y prueba nuevamente.</p>
                <a href="../Vista/registro_animal.php" class="btn btn-olive w-100 text-wrap" style="white-space: normal;">Registra un nuevo animal</a>
                </div>
                <div class="card-footer text-body-secondary">
                RanchExpress
                </div>
                </div>';
            return $html;
        }
    }

    // Esto genera las tarjetas
    function generarTarjetas($filas) {
        return '<div class="col-6 mb-3">
                <div class="card h-100" style="width: 100%;">
                <img src="../Media/Uploads/' . $filas['imagen_animal'] . '" class="card-img-top" alt="Imagen del animal" style="width:100%; height:180px; object-fit:cover; object-position:center;">
                <div class="card-body">
                <h5 class="card-title">' . htmlspecialchars($filas['codigo_animal']) . '</h5>
                <p class="card-text"> Nombre del animal: ' . $filas['nombre'] . '</p>
                <p class="card-text"> Ingresado por: ' . $filas['nombre_usuario'] . '</p>
                <a href="../Vista/hoja_animales.php?token=' . base64_encode($filas['codigo_animal']) . '" class="btn btn-olive w-100 text-wrap" style="white-space: normal;">Ver información Detallada</a>
                </div>
                </div>
                </div>';
    }

    $htmlOvejas = obtenerAnimal($conn, 'Ovino', 4);
    $htmlCabras = obtenerAnimal($conn, 'Caprino', 4);

} catch (Exception $e) {
    $e->getMessage();
}
?>
