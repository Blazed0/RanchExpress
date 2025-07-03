  <?php
  include '../Controlador/inicio_sesion/sesiones.php';
  include '../Controlador/inicio_sesion/roles.php';
  include '../Modelo/conn.php';
  include '../Controlador/ver_datos_antiguos_animal.php';
    $codigoEncriptado = $_GET['codigo'];
    $codigo = base64_decode($codigoEncriptado);
  ?>
  <!DOCTYPE html>
  <html lang="es">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Actualizar datos</title>
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
    
      <h2>Actualización de datos</h2>
      <form id="registration-form" action ="../Controlador/registros/actualizar_datos.php" method="POST" enctype="multipart/form-data">
        <div class="row mb-4" > 
            <div class="col-md-6">
              <div class="mb-3">
        <input type="hidden" name="codigo_Oculto"  id="codigo_Oculto" class="form-control" value="<?php echo $codigo ?>">
          <label class="form-label">Código del Animal</label>
          <input type="text" name="codigo_animal" id="codigo_animal" class="form-control" value="<?php echo $codigoAntiguo?>">
        </div>
    
              <div class="mb-3">
          <label class="form-label">Proposito</label>
          <input type="text" name="proposito"  id="proposito" class="form-control" value="<?php echo $proposito ?>" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Edad del animal</label>
          <select name="edad" id="edad" class="form-select">
            <option value="Adulto" <?php if($edad == 'Adulto') echo 'selected'; ?>>Animal en Etapa Adulta</option>
            <option value="Cria" <?php if($edad== 'Cria') echo 'selected'; ?>>Animal en etapa de Cria</option>
          </select>
        </div>
          </div>

          <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label">Nombre</label>
          <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $nombre ?>">
        </div>
               <div class="mb-3">
          <label class="form-label">Estado</label>
          <select name="estado" id="estado" class="form-select">
            <?php
            $opciones_estado = [
              'Vivo'    => 'Vivo',
              'Muerto'  => 'Muerto',
              'Vendido' => 'Vendido'
            ];
            
            // Iteramos sobre las opciones para generarlas dinámicamente
            foreach ($opciones_estado as $valor_opcion => $texto_opcion) {
              // Comprobamos si el valor de esta opción coincide con el $estado actual
              $seleccionado = ($estado === $valor_opcion) ? 'selected' : '';
              
              // Imprimimos la etiqueta <option>
                echo '<option value="' . htmlspecialchars($valor_opcion) . '" ' . $seleccionado . '>' . htmlspecialchars($texto_opcion) . '</option>';
              }
              ?>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Color</label>
          <input type="text" name="color" id="color" class="form-control" value="<?php echo $color ?>">
        </div>
          </div>
  <div class="row">
  <div class="col-md-6 offset-md-3 text-center">
      <!-- Imagen actual -->
      <?php if (!empty($animal['imagen_animal'])): ?>
          <div class="mb-3">
              <label class="form-label">Imagen actual</label><br>
              <img src="../Media/Uploads/<?php echo $imagen ?>" alt="Imagen actual" style="width: 150px; border-radius: 10px; box-shadow: 2px 2px 10px rgba(0,0,0,0.2);">
          </div>
      <?php endif; ?>

      <!-- Nueva imagen -->
      <div class="mb-3">
          <label class="form-label">Nueva Imagen (opcional)</label>
          <input type="file" class="form-control" name="imagen_animal" accept="image/*">
      </div>
  </div>
</div>
        </div>
  <div class="d-flex justify-content-center">

<button type="submit" class="btn-submit">Actualizar Animal</button>
  </div>
      </form>
      <div id="result"></div>
    

  </div>   
        <!-- Scripts para la funcionalidad de la pagina -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
        
  </body>
  </html>