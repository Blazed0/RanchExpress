  <?php
  include '../Controlador/inicio_sesion/sesiones.php';
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Registra la producción de lana</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
      <link rel="stylesheet" href="../public/lana.css">

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
    
      <h2>Registro de producción de lana</h2>
      <form id="registration-form" action ="../Controlador/lana/datos_lana_animal.php" method="POST">
        
      <center>
            <div class="col-md-8">

  
   
        <div class="mb-8">
          <label class="form-label">Kilos producidos</label>
          <input type="number" name="kilos"id= "kilos"  step="0.01" class="form-control">
        </div>
          <div class="mb-8">
          <label class="form-label">Codigo del animal</label>
          <input type="text" name="codigo_animal"id= "codigo_animal" class="form-control">
        </div>
          </div>
          </center>
          
  <div class="d-flex justify-content-center">
    <button type="submit" class="btn-submit">Registrar producción de lana</button>
  </div>
      </form>

        
  </body>
  </html>