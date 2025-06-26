<?php
include '../Modelo/conn.php';

$codigoAnimal = $_GET['token'];
$token = base64_decode($codigoAnimal);


$sqlAnimales = "SELECT proposito, sexo, especie, etapa_edad
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
if($filas != null){
  if($filas['especie'] === 'Caprino'){
    $produccion .= '
    <img src="https://cdn-icons-png.flaticon.com/512/1790/1790203.png" alt="leche" width="30" class="mb-2">
    <a class="fw-bold m-0" href="calendario.php?token='.base64_encode($token).'">
      <button class="btn btn-danger btn-sm">LECHE (LITROS) DIARIA</button>
    </a>
    <p>3 L - 21/05/2025</p>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <a href="leche.php" role="button" class="btn btn-danger btn-sm">ACTUALIZAR</a>
    ';
  }
elseif($filas['especie'] === 'Ovino'){
  $produccion .= '
  <img src="https://cdn-icons-png.flaticon.com/512/763/763812.png" alt="lana" width="30" class="mb-2">
 <a class="fw-bold m-0" href="calendario.php?token='.base64_encode($token).'">
    <button class="btn btn-warning btn-sm">LANA (KILOS) ANUAL</button>
  </a>
  <div id="chartContainerLana" style="height: 370px; width: 100%;"></div>

  <a href="lana.php?token='.base64_encode($token).'" class="btn btn-warning btn-sm mt-2">ACTUALIZAR</a>';
}
else{
  $produccion .= "No hay informacion disponible";
}
 }

 $GLOBALS['produccion'] = $produccion;



/*   <!-- Script que se ejecuta cuando se carga toda la página -->
    <div class="row g-3 mt-2">
      <div class="col-12">
        <div class="info-box text-center">

        </div>
      </div>
    </div>
*/
?>