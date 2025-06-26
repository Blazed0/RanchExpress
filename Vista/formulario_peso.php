  <?php
  include '../Controlador/inicio_sesion/sesiones.php';
  $idAnimal = $_GET['token'];
  $token = base64_decode($idAnimal);
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Registra un nuevo peso</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
      <link rel="stylesheet" href="../public/peso.css">

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
    
      <h2>Registro de actualización de pesos</h2>
      <form id="registration-form" action ="../Controlador/registros/registro_peso.php" method="POST" >
        
      <center>
            <div class="col-md-8">

            <div class="mb-8">
    
          <label class="form-label">Fecha del pesaje</label>
          <input type="date" name="fecha_pesaje" class="form-control">
        </div>
   
        <div class="mb-8">
                        <label class="form-label">Tipo de animal</label>
           <select name="peso" id= "peso" class="form-select">
            <option value="Adulto">Adulto</option>
            <option value="Cria">Cria</option>
          </select>
        </div>
           <div class="mb-8">
          <label class="form-label">Peso del animal</label>
          <input type="number" name="peso_animal"id= "peso_animal" class="form-control">
        </div>
          <div class="mb-8">
          <label class="form-label">Codigo del animal</label>
          <input type="number" name="codigo_animal" value = "<?php echo htmlspecialchars($token)?>"id= "codigo_animal" class="form-control">
        </div>
  <div class="mb-8">
          <label class="form-label">Observaciones</label>
          <input type="text" name="observaciones"id= "observaciones" class="form-control">
        </div>
          </div>
          </center>
          
  <div class="d-flex justify-content-center">
    <button type="submit" class="btn-submit">Registrar peso</button>
  </div>
      </form>
      <div id="result"></div>
    

  </div>   

        
  </body>
  </html>