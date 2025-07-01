<?php
include '../Controlador/inicio_sesion/roles.php';
include '../Controlador/panel_administracion.php';
include 'header.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Registro de Peso</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../public/tabla.css" />
  <link rel="stylesheet" href="../public/modal.css" />
</head>
<body>

   <?php 
      if(isset($_SESSION['alert'])){
          echo $_SESSION['alert'];
          unset ($_SESSION['alert']);
      }
      ?>



<main class="container my-4">
  
  <div class="mb-3">
    <a href="hoja_animales.php">
    <button class="btn btn-outline-dark rounded-circle" >
      <span class="fs-4">&#8592;</span>
    </button>
    </a>
  </div>
  <div class="table-responsive">
    <table class="table custom-table text-center align-middle">
      <thead class="table-head">
        <tr>
          <th scope="col">USUARIO</th>
          <th scope="col">ROL</th>
          <th scope="col">CORREO</th>
          <th scope="col">OPCIONES
          </th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
          <?php echo $html ?>
      </tbody>
    </table>
  </div>
      <div class="ventana-Modal" id = "ventana-Modal">
        <div class="modal container">
        <span class="icono-Eliminar">🗑️</span>
        <p class="titulo-Modal">¿Estas seguro de eliminar este usuario?</p>
        <p class="mensaje-Modal">Ten En cuenta que esta accion es irreversible y no habra forma de recuperar la informacion del usuario</p>
        <div class="botones">
          <button class="cancelar" id="cancelar">Cancelar</button>
          <button class="confirmar" id = "confirmar">Eliminar de todos modos</button>
        </div>
      </div>
    </div>
    <script src = "../Controlador/Modal.js"></script>
</main>



</body>
</html>
