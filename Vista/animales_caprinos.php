<?php 
include '../Controlador/ver_caprinos.php';
include 'header.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Ganado Caprino - RanchExpress</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="../public/animalescaprinos.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
</head>
<body>

  <main class="text-center py-4">
    <h2 class="section-title">CAPRINO</h2>

   
    <div class="total-box mx-auto my-3">
      <p class="fw-bold m-0">TOTAL</p>
      <hr class="my-1">
      <h4 class="m-0"><?php echo $conteoTotal ?></h4>
    </div>
    <div class="container mt-4">
      <div class="row g-4 justify-content-center">
    <div class="row text-center mt-2">
      <div class="col-4 fw-bold">HEMBRAS</div>
      <div class="col-4 fw-bold">MACHOS</div>
      <div class="col-4 fw-bold">CRÍAS</div>
    </div>
     <!-- Imágenes por categoría -->
    <div class="row text-center  mb-4 gx-2 gy-2">
      <!-- Fila 1 -->
       <div class="col-md-4 align-items-center">
        <?php echo $htmlMacho; ?>  
      </div>
 
      <!-- Fila 2 -->
       <div class="col-md-4 align-items-center justify-content-center">
        <?php echo $htmlHembra  ?>
      </div>

      <!-- Fila 3 -->
       <div class="col-md-4">
         <?php echo $htmlCrias ?>
    </div>



      </div>
    </div>
    </main>
    <?php
    include 'footer.html';
    ?>
</body>
</html>
