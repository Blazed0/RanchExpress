<?php
  include '../Controlador/inicio_sesion/sesiones.php';
  include '../Controlador/inicio_sesion/roles.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de Tratamiento</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
     <link rel="stylesheet" href="../public/registro_tratamientos.css">
</head>
<body>
 <div class="container mt-5">

 <button class="btn-flecha" onclick="history.back()">  
    <i class="bi bi-arrow-left"> </i> 
</button>

  <?php 
    
    if(isset($_SESSION['alert'])){
        echo $_SESSION['alert'];
        unset ($_SESSION['alert']);
    }
    ?>


    <h2 >Registro de Tratamiento</h2>
    <form id="registration-form" action="../Controlador/registros/registro_tratamiento.php" method="POST" >

      <div class="mb-3">
        <label class="form-label">Fecha de aplicacion</label>
        <input type="date" name="fecha_aplicacion" id="fecha_aplicacion" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Diagnostico</label>
        <input type="text" name="diagnostico" id="diagnostico" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label nom " >Nombre del tratamiento</label>
        <input type="text" name="nombre_tramiento" id="nombre_tratamiento" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Observaciones</label>
        <input type="text"  name="obsevaciones" id="observaciones" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Realizador</label>
        <input type="text" name="realizador" id="realizador" class="form-control">
      </div>
      
     <div class="d-flex justify-content-center">
  <button type="submit" class="btn-submit">Registrar Tratamiento</button>
</div>
    </form>

    


          <!-- Scripts para la funcionalidad de la pagina -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
</script>
</body>
</html>