<?php 
  include '../Controlador/inicio_sesion/roles.php';
include 'header.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estadísticas Caprinos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">

  <style>
    body {
      background-color: #ffffc3;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #3a5e2a;
      margin: 0;
      padding: 0;
    }

    .titulo-estadistica {
      font-family: 'Luckiest Guy', cursive;
      font-size: 2.5rem;
      color: #4e6821;
      text-transform: uppercase;
      margin-bottom: 20px;
      text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
    }

    .estadistica-box {
      background: #e0e0e0;
      border-radius: 20px;
      box-shadow: 15px 15px 30px #c7c7c7, -15px -15px 30px #ffffff;
      position: relative;
    }

    h5.fw-bold {
      color: #4e6821;
      margin-bottom: 10px;
      font-size: 1.2rem;
    }

    #chartCantidad, #chartProposito, #chartLeche {
      background: #ffffff;
      border-radius: 15px;
      box-shadow: 10px 10px 20px #c0c0c0, -10px -10px 20px #ffffff;
      padding: 10px;
    }

    .btn-back-interno {
      position: absolute;
      top: 15px;
      left: 15px;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #6b8e23;
      color: white;
      font-size: 1.2rem;
      font-weight: bold;
      border-radius: 50%;
      box-shadow: 6px 6px 12px #c0c0c0, -6px -6px 12px #ffffff;
      transition: all 0.3s ease;
      text-decoration: none;
    }

    .btn-back-interno:hover {
      background-color: #7ea93a;
      transform: scale(1.1);
      text-decoration: none;
    }
  </style>
</head>
<body>

<main class="container my-4 text-center">
  <div class="estadistica-box p-4">
    <a href="caprinos.php" class="btn-back-interno" title="Regresar">←</a>

    <h2 class="titulo-estadistica mt-2">ESTADISTICA CAPRINOS</h2>

    <div class="row mt-4">
      <!-- CANTIDAD DE ANIMALES -->
      <div class="col-md-4">
        <h5 class="fw-bold">CANT. ANIMALES</h5>
        <div id="chartCantidad" style="height: 370px; width: 100%;"></div>
      </div>

      <!-- PROPÓSITO -->
      <div class="col-md-4">
        <h5 class="fw-bold">PROPÓSITO</h5>
        <div id="chartProposito" style="height: 370px; width: 100%;"></div>
      </div>

      <!-- LECHE -->
      <div class="col-md-4">
        <h5 class="fw-bold">LECHE</h5>
        <div id="chartLeche" style="height: 370px; width: 100%;"></div>
      </div>
    </div>
  </div>
</main>

<!-- Librerías necesarias -->
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>

<script>
$(document).ready(function () {

  // ----------------- CANTIDAD DE ANIMALES -------------------
  var chartCantidad = new CanvasJS.Chart("chartCantidad", {
    animationEnabled: true,
    theme: "light2",
    title: { text: "Cantidad de Animales" },
    data: [{
      type: "column",
      dataPoints: []
    }]
  });

  $.getJSON("../Controlador/cantidad_animales/datos_animales_caprinos.php", function(data) {
    chartCantidad.options.data[0].dataPoints = data;
    chartCantidad.render();
  });

  // ----------------- PROPÓSITO -------------------
  var chartProposito = new CanvasJS.Chart("chartProposito", {
    animationEnabled: true,
    theme: "light2",
    title: { text: "Propósito" },
    data: [{
      type: "pie",
      dataPoints: []
    }]
  });

  $.getJSON("../Controlador/propositos/proposito_caprino.php", function(data) {
    chartProposito.options.data[0].dataPoints = data;
    chartProposito.render();
  });

  // ----------------- GRAFICO DE LECHE -------------------
  var dataPointsLeche = [];
  var chartLeche = new CanvasJS.Chart("chartLeche", {
    animationEnabled: true,
    theme: "light2",
    title: { text: "Producción de leche" },
    axisY: {
      title: "Litros producidos"
    },
    data: [{
      type: "line",
      dataPoints: dataPointsLeche
    }]
  });
  chartLeche.render();

  function updateLecheData() {
    $.getJSON("../Controlador/leche/datos_leche.php", function(data) {
      $.each(data, function(key, value) {
        dataPointsLeche.push({ x: value[0], y: parseInt(value[1]) });
      });
      chartLeche.render();
      setTimeout(updateLecheData, 1500);
    });
  }

  updateLecheData();
});
</script>

</body>
</html>
