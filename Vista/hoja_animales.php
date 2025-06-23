<?php
include '../Controlador/mostrar_info_animales.php';
include '../Controlador/graficos_hoja_animal.php';
include 'header.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registro Animal</title>
  <link rel="stylesheet" href="../public/hojanimales.css">
</head>
<body>
  <div class="main-box p-3">
    <main class="container my-3">

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
          <a class="fw-bold m-0 hola"  href="formulario_peso.php">
          <button class="btn btn-danger btn-sm">ACTUALIZAR</button>
          </a>
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

        <h2>Produccion</h2>
        
<script src="../Controlador/graficos.js"></script>
        <?php  
        echo  $produccion;
        ?>

        </div>
      </div>
    </div>

          <!-- Tengo que hacer que esto solo se muestre si es una cabra y es hembra y su proposito es de leche -->

  </main>
  </div>

<?php
include 'footer.html';
?>

</body>
</html>
