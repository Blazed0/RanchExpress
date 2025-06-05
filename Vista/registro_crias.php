<?php

include("../Controlador/registros/padres.php");
include '../Controlador/inicio_sesion/sesiones.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de crias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link rel="stylesheet" href="../public/registro_crias.css">

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
    <h2>Registro de crias</h2>
    <form id="registration-form" action ="../Controlador/registros/registro_crias.php" method="POST" enctype="multipart/form-data">
     <div class="row mb-6">   
      <div class="col-md-6">
    <div class="mb-3">
           <label class="form-label">Código de la cria</label>
        <input type="text" name="codigo_cria" id="codigo_cria" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Fecha de Nacimiento</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Peso de nacimiento</label>
        <input type="number" step="0.01" name="peso_nacimiento" id="peso_nacimiento" class="form-control">
      </div>

      <div class="mb-3">
        <label class="form-label">Nombre de la cria</label>
        <input type="text" name="nombre" id="nombre" class="form-control">
      </div>

      <div class="mb-3">
        <label class="form-label">Especie de la cria </label>
        <input type="text" name="especie" id="especie" class="form-control">
      </div>
     
      </div> 
      
      <div class=" col-md-6">

      <div class="mb-3">
        <label class="form-label">Sexo</label>
        <select name="sexo" id="sexo" class="form-select">
          <option value="Macho">Macho</option>
          <option value="Hembra">Hembra</option>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Observaciones</label>
        <input type="text" name="observaciones" id="observaciones" class="form-control">
      </div>

         <div class="mb-3">
        <label class="form-label">Codigo de padre</label>
        <select name="idPadre" id="idPadre" class="form-select">
        <option value="" disabled selected>Seleccione código de padre</option>
          <?php foreach ($codigoPadre as $codigo): ?>
              <option value="<?= htmlspecialchars($codigo) ?>"><?= htmlspecialchars($codigo) ?></option>
          <?php endforeach; ?>

        </select>

      </div>
         <div class="mb-3">
        <label class="form-label">Codigo de la madre</label>
        <select name="idMadre" id="idMadre" class="form-select">
        <option value="" disabled selected>Seleccione Codigo de Madre</option>
           <?php

           foreach($codigoMadre as $madre):?>
           <option value ="<?= $madre['id_animal']?>"><?=htmlspecialchars($madre['codigo_animal'])?></option>

           foreach($codigoMadre as $codigoMaterno):?>
           <option value ="<?= htmlspecialchars($codigoMaterno)?>"><?=htmlspecialchars($codigoMaterno)?></option>

        <?php endforeach; ?>
        </select>
      </div>
     <div class="mb-3">
            <label for="image" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="image" name="imagen_cria" accept="image/*" required>
        </div>
        </div>  
        </div>
      <center>
         <div class="col-md-4">
         <div class="mb-3">
      
        <label class="form-label">Raza</label>
        <input type="text" name="raza" id="raza" class="form-control">  
      </div>
      </div>
      </center>
<div class="d-flex justify-content-center">
  <button type="submit" class="btn-submit">Registrar Cria</button>
</div>
    </form>
        <div id="result"></div>
  </div>

        <!-- Scripts para la funcionalidad de la pagina -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 

  <script src="../Controlador/registros/registro_crias.js">
</script>
</body>
</html>
