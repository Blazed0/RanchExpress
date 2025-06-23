<?php
include '../Controlador/pagina_principal.php';
include 'header.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Principal</title>

  <!-- Bootstrap + Icons -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- Tu CSS personalizado -->
  <link rel="stylesheet" href="../public/pagina_principal.css">
</head>


  <main class="container my-4">
    <div class="row text-center align-items-center">
      <?php
      if(isset($_SESSION['alert'])){
        echo $_SESSION['alert'];
        unset($_SESSION['alert']);
      }
      ?>
      <!-- CAPRINOS -->
      <div class="col-md-5 mb-4">
        <div class="card-custom h-100">
          <a class="fw-bold m-0 hola" href="animales_caprinos.php">
            <button class="btn btn-danger btn-sm">CAPRINOS</button>
          </a>
          <p>
            Su leche es una fuente excelente de proteína animal que puede ser consumida por los niños y la familia en forma de leche fresca o transformada en queso.
          </p>
          <div class="row">
            <?php echo $htmlCabras ?>
          </div>
        </div>
      </div>

      <!-- TOTAL -->
      <div class="col-md-2 mb-4 d-flex align-items-center justify-content-center">
        <div class="central-box text-center">
          <strong>TOTAL DE <br> ANIMALES</strong>
          <div class="total-count"><?php echo $totalResultados ?></div>
        </div>
      </div>

      <!-- OVINOS -->
      <div class="col-md-5 mb-4">
        <div class="card-custom h-100">
          <a class="fw-bold m-0 hola" href="animales_ovinos.php">
            <button class="btn btn-danger btn-sm">OVINOS</button>
          </a>
          <p>
            Son buenos productores de leche y carne, pero también lo son como proveedores de lana que se emplea en la industria textil para la confección de diversos tipos de tela.
          </p>
          <div class="row">
            <?php echo $htmlOvejas ?>
          </div>
        </div>
      </div>
    </div>
  </main>

  
  <?php
include 'footer.html';
  ?>