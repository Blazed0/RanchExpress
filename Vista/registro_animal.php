  <?php
  include '../Controlador/inicio_sesion/roles.php';
  include '../Controlador/inicio_sesion/sesiones.php';
  include '../Controlador/registros/padres.php';
  ?>
  <!DOCTYPE html>
  <html lang="es">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Registra tu animal</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
      <link rel="stylesheet" href="../public/registro_animal.css">

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
    
      <h2>Registro de animales</h2>
      <form id="registration-form" action ="../Controlador/registros/procesar_registro.php" method="POST" enctype="multipart/form-data">
        <div class="row mb-4" > 
            <div class="col-md-6">
      <div class="mb-3">
          <label class="form-label">Código del Animal</label>
          <input type="text" name="codigo_animal"  id="codigo_animal" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Fecha de Ingreso</label>
          <input type="date" name="fecha_ingreso" id="fecha_ingreso"class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Fecha de Nacimiento</label>
          <input type="date" name="fecha_nacimiento"id= "fecha_nacimiento" class="form-control">
        </div>
              <div class="mb-3">
          <label class="form-label">Proposito</label>
          <input type="text" name="proposito"  id="proposito" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Peso de nacimiento</label>
          <input type="number" step="0.01" name="peso_nacimiento" id="peso_nacimiento" class="form-control">
        </div>
          <div class="mb-3">
          <label class="form-label">Selecciona la especie</label>
        <select name="especie" id= "especie" class="form-select">
            <option value="Caprino">Caprino</option>
            <option value="Ovino">Ovino</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Edad del animal</label>
          <select name="edad" id="edad" class="form-select">
            <option value="Adulto">Animal en Etapa Adulta</option>
            <option value="Cria">Animal en etapa de Cria</option>
          </select>
        </div>
          </div>

          <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label">Nombre</label>
          <input type="text" name="nombre" id="nombre" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Raza</label>  
          <input type="text" name="raza" id="raza" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Color</label>
          <input type="text" name="color" id="color" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Sexo</label>
          <select name="sexo" id="sexo" class="form-select">
            <option value="Macho">Macho</option>
            <option value="Hembra">Hembra</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Estado</label>
          <select name="estado" id="estado" class="form-select">
            <option value="activo">Activo</option>
            <option value="vendido">Vendido</option>
            <option value="muerto">Muerto</option>
          </select>
        </div>



          <div class="mb-3">
            <label class="form-label">Padre</label>
            <select name="padre" id="padre" class = "form-select">
              <option disabled selected>Selecciona Un Animal</option>
        <?php if (count($codigoPadre) > 0): ?>
            <?php foreach ($codigoPadre as $padre): ?>
                <option value="<?php echo htmlspecialchars($padre['id_animal']); ?>">
                    <?php echo htmlspecialchars($padre['codigo_animal']); ?>
                </option>
            <?php endforeach; ?>
        <?php else: ?>
            <option value="" disabled selected>No hay machos disponibles</option>
        <?php endif; ?>
              <option value="">Animal Comprado o sin datos</option>
            </select>
          </div>




          <div class="mb-3">
            <label class="form-label">Madre</label>
            <select name="madre" id="madre" class = "form-select">
              <option disabled selected>Selecciona Un Animal</option>
              <?php if(count($codigoMadre) > 0): ?>
              <?php foreach($codigoMadre as $madre):?>
                <option value="<?php htmlspecialchars($madre['id_animal']) ?>">
                  <?php echo htmlspecialchars($madre['codigo_animal']) ?></option>
                  <?php endforeach ?>
                <?php else: ?>
                    <option value="" disabled selected>No hay Hembras disponibles</option>
                  <?php endif; ?>
                  <option value="">Animal Comprado o sin datos</option>
            </select>
          </div>

          
          
         
          </div>
           <center>
          <div class="mb-3 ">
              <label for="image" class="form-label">Imagen</label>
              <input type="file" class="form-control" id="image" name="imagen_animal" accept="image/*" required>
            </div>
          </center>
        </div>
  <div class="d-flex justify-content-center">

    <button type="submit" class="btn-submit">Registrar Animal</button>
  </div>
      </form>

        <!-- Scripts para la funcionalidad de la pagina -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
  crossorigin="anonymous"></script> 
        
  </body>
  </html>