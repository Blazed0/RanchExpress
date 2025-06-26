<?php
include '../Modelo/conn.php';

$token = $_GET['token'];


$sqlAnimales = "SELECT proposito, sexo, especie, etapa_edad FROM animal WHERE codigo_animal = ? AND proposito = 'leche' AND sexo = 'Hembra' AND (especie = 'Caprino' OR especie = 'Ovino') AND etapa_edad = 'Adulto'";
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
    <a  class="fw-bold m-0" href="calendario.php?token='.base64_encode($token).'">
    <button class="btn btn-danger btn-sm">LECHE (LITROS) DIARIA</button></a>
    <p>3 L - 21/05/2025</p>
    
    
    <!-- Contenedor donde se mostrará el gráfico -->
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    
    <!-- Librería de jQuery requerida para el gráfico -->
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    
    <!-- Librería de CanvasJS que permite renderizar el gráfico -->
    <script src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>
    
    
    <a href="leche.php" role = "button" class="btn btn-danger btn-sm">ACTUALIZAR</a>';
  }
  elseif($filas['especie'] === 'Ovino'){
    $produccion .= 'Produccion Ovina';
  }
}
else{
  $produccion .= "No hay informacion disponible";
}



/*   <!-- Script que se ejecuta cuando se carga toda la página -->
    <div class="row g-3 mt-2">
      <div class="col-12">
        <div class="info-box text-center">

        </div>
      </div>
    </div>
*/
?>