<?php
include '../Modelo/conn.php';

$codigoAnimal = $_GET['token'];
$token = base64_decode($codigoAnimal);

// Consulta para obtener los datos del animal
$sqlAnimales = "SELECT id_animal,proposito, sexo, especie, etapa_edad
FROM animal
WHERE codigo_animal = ?
  AND ((proposito = 'leche'
  AND sexo = 'Hembra'
  AND especie = 'Caprino'
  AND etapa_edad = 'Adulto') OR especie = 'Ovino');";

$filtroAnimales = $conn->prepare($sqlAnimales);
$filtroAnimales->bind_param("s", $token);
$filtroAnimales->execute();
$coincidencia = $filtroAnimales->get_result();
$filas = $coincidencia->fetch_assoc();

$produccion = '';

if ($filas != null) {
  $idAnimal = $filas['id_animal'];
  if ($filas['especie'] === 'Caprino') {
    // Producción de leche
    $produccion .= '
  <div class="d-flex align-items-center mb-3 gap-3">
    <img src="../Media/icons/leche.png" alt="leche" width="150">
    <a class="fw-bold m-0" href="calendario.php?token=' . base64_encode($idAnimal) . '">
      <button class="btn btn-danger btn-sm" style="margin-left: 225px">Calendario De Producción</button>
    </a>
  </div>

      <div id="chartContainer" style="height: 370px; width: 100%;"></div>
      <a href="leche.php?token='. base64_encode($token) .'" role="button" class="btn btn-danger btn-sm mt-2">ACTUALIZAR</a>
    ';
  } elseif ($filas['especie'] === 'Ovino') {
    // Producción de lana (mismos estilos)
    $produccion .= '
       <div class="d-flex align-items-center mb-3 gap-3">
    <img src="../Media/icons/lana.png" alt="lana" width="150">
    <a class="fw-bold m-0" href="estadisticaovinos.php">
      <button class="btn btn-danger btn-sm" style="margin-left: 225px">Estadísticas De Producción</button>
    </a>
  </div>
      <div id="chartContainerLana" style="height: 370px; width: 100%;"></div>
      <a href="lana.php?token=' . base64_encode($token) . '" class="btn btn-danger btn-sm mt-2">ACTUALIZAR</a>
    ';
  } else {
    $produccion .= "<h2>No hay información disponible</h2>";
  }
}

$GLOBALS['produccion'] = $produccion;
?>
