<?php
include '../Controlador/mostrar_info_animales.php';
include '../Controlador/inicio_sesion/sesiones.php';
include 'header.html';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registro Animal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../public/hojanimales.css">
</head>
<body>
<main class="container my-3">
  <div class="main-box p-3">

    <!-- Fila 1: Imagen + Estado -->
    <div class="row g-3 align-items-stretch">
      <div class="col-md-6">
        <div class="img-box h-100">
          <?php
           echo '<img src="../Media/Uploads/'.$imagen.'" class="img-fluid w-100 h-100 object-fit-cover rounded" alt="Animal">'
          ?>
        </div>
      </div>
      <div class="col-md-6">
        <div class="info-box h-100 d-flex flex-column justify-content-between">
          <div>
            <div class="d-flex justify-content-between align-items-center mb-2">
              <h6 class="m-0">ESTADO</h6>
              <span id = "estado"> <?php echo $html ?></span>
            </div>
            <p class="mb-1">Padre: <a href= "hoja_animales.php?token=<?=$nombrePadre?>"><?php echo $nombrePadre ?></a></p>
            <p class="mb-1">Madre:<a href = "hoja_animales.php?token=<?=$nombreMadre?>"><?php echo $nombreMadre ?></a></p>
            <p class="mb-1">Codigo: <?php echo $codigo ?></p>
            <p class="mb-1">Raza: <?php echo $raza ?></p>
            <p class="mb-1">Raza Del Padre: <?php echo $padreRaza?></p>
            <p class="mb-1">Raza De La Madre: <?php echo $madreRaza?></p>
            <p class="mb-2">Sexo: <?php echo $sexo ?></p>
          </div>
          <a class="btn btn-danger btn-sm mt-2" href="#">ACTUALIZAR</a>
        </div>
      </div>
    </div>

    <!-- Fila 2: Propósito + Peso -->
    <div class="row g-3 mt-2">
      <div class="col-md-6">
        <div class="info-box text-center h-100">
          <p class="fw-bold mb-0">Propósito</p>
          <p class="fs-5"><?php echo $proposito ?></p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="info-box text-center h-100">
          <img src="https://cdn-icons-png.flaticon.com/512/5270/5270995.png" alt="peso" width="30" class="mb-2">
          <a class="fw-bold m-0 hola"  href="tabla.php?token=<?= $id_animal ?>">
            <button class="btn btn-danger btn-sm">
              Peso En Kilogramos
            </button>
            </a>
          <p>Ultimo Pesaje: <?php echo $peso ?>  <br>
          Fecha del Pesaje: <?php echo $fechaPesaje ?></p>
          <button class="btn btn-danger btn-sm">ACTUALIZAR</button>
        </div>
      </div>
    </div>

    <!-- Fila 3: Tratamientos -->
    <div class="row g-3 mt-2">
      <div class="col-12">
        <div class="info-box">
          <div class="d-flex justify-content-between align-items-center">
            <h4 class="m-0">Tratamientos</h4>
            <button class="btn btn-danger btn-sm">Actualizar</button>
          </div>
          <p class="fw-bold mt-2"><?php echo $nombreTratamiento ?><br>
          <?php echo $fechaAplicacion ?>
        <br>
      <?php echo $diagnostico ?></p>
          <hr>
          <hr>
          <hr>
        </div>
      </div>
    </div>

    <!-- Fila 4: Leche -->
    <div class="row g-3 mt-2">
      <div class="col-12">
        <div class="info-box text-center">
          <img src="https://cdn-icons-png.flaticon.com/512/1790/1790203.png" alt="leche" width="30" class="mb-2">
          <a  class="fw-bold m-0" href="calendario.html">
            <button class="btn btn-danger btn-sm">LECHE (LITROS) DIARIA</button></a>
          <p>3 L - 21/05/2025</p>

 <!-- Script que se ejecuta cuando se carga toda la página -->
<script>
window.onload = function() {

    // Arreglo que almacenará los puntos del gráfico (x, y)
    var dataPoints = [];

    // Configuración del gráfico
    var options = {
        theme: "light2", // Tema visual del gráfico
        title: {
            text: "Producción de leche" // Título del gráfico
        },
        data: [{
            type: "line", // Tipo de gráfico: línea
            dataPoints: dataPoints // Aquí se agregan los puntos dinámicos
        }]
    };

    // Inicializa el gráfico en el contenedor con las opciones definidas
    $("#chartContainer").CanvasJSChart(options);

    // Llama a la función que actualiza los datos del gráfico
    updateData();

    // Variables para el eje X e Y y la cantidad de datos nuevos a agregar
    var xValue = 0;
    var yValue = 10;
    var newDataCount = 6;

    // Función que agrega nuevos datos al gráfico
    function addData(data) {
        if(newDataCount != 1) {
            // Si se agregan múltiples datos, se recorre el arreglo
            $.each(data, function(key, value) {
                dataPoints.push({x: value[0], y: parseInt(value[1])});
                xValue++; // Incrementa el valor X
                yValue = parseInt(value[1]); // Actualiza Y con el valor actual
            });
        } else {
            // Si se agrega solo un punto nuevo
            dataPoints.push({x: data[0][0], y: parseInt(data[0][1])});
            xValue++;
            yValue = parseInt(data[0][1]);
        }

        newDataCount = 1; // A partir de aquí, solo se agregará un dato a la vez

        // Se vuelve a renderizar el gráfico con los nuevos datos
        $("#chartContainer").CanvasJSChart().render();

        // Se programa otra actualización de datos dentro de 1.5 segundos
        setTimeout(updateData, 1500);	
    }

    // Función que obtiene nuevos datos desde un servicio externo
    function updateData() {
        // Petición AJAX para obtener datos simulados desde el servidor de CanvasJS
        $.getJSON("../Controlador/leche/datos_leche_animal.php", addData);
    }

}
</script>

<!-- Contenedor donde se mostrará el gráfico -->
<div id="chartContainer" style="height: 370px; width: 100%;"></div>

<!-- Librería de jQuery requerida para el gráfico -->
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>

<!-- Librería de CanvasJS que permite renderizar el gráfico -->
<script src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>


          <button class="btn btn-danger btn-sm">ACTUALIZAR</button>
        </div>
      </div>
    </div>

  </div>
</main>

<?php
include 'footer.html';
?>

</body>
</html>
