  <?php
  include '../Controlador/inicio_sesion/sesiones.php';
    include '../Controlador/inicio_sesion/roles.php';
  $codigoEncriptado = $_GET['token'];
  $token = base64_decode($codigoEncriptado);
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Registra la producción de leche</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
      <link rel="stylesheet" href="../public/leche.css">

  </head>
  <body>


    <div class="container mt-4">

  <button class="btn-flecha" onclick="history.back()">  
      <i class="bi bi-arrow-left"> </i> 
  </button>
      <?php 

      if(isset($_SESSION['alert'])){
          echo $_SESSION['alert'];
          unset ($_SESSION['alert']);
      }
      ?>
    
      <h2>Registro de producción de leche</h2>
      <form id="registration-form" action ="../Controlador/leche/datos_leche_animal.php" method="POST" >
      
      <center>
            <div class="col-md-8">
        <div class="mb-8">
          <label class="form-label">Fecha de producción</label>
          <input type="date" name="fecha_produccion" id="fecha_produccion"class="form-control">
        </div>
        <div class="mb-8">
          <label class="form-label">Litros producidos</label>
          <input type="number" name="litros"id= "litros" class="form-control">
        </div>
        <div class="mb-8">
          <label class="form-label">Codigo del animal</label>
          <input type="number" name="codigo_animal"id= "codigo_animal" value ="<?php echo htmlspecialchars($token)?>" class="form-control">
        </div>
          </div>
          </center>
          
  <div class="d-flex justify-content-center">
    <button type="submit" class="btn-submit">Registrar producción de leche</button>
  </div>
      </form>

        
  </body>
  </html>