<?php
include '../Controlador/pagina_principal.php';
include "../Controlador/inicio_sesion/sesiones.php";
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
<body>
  <nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid align-items-center">
      <div class="logo">
        <img src="../Media/icons/logo_pagina-removebg-preview.png" alt="Logo" id="logazo">
      </div>
      <p class="navbar-brand">RanchExpress</p>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-between" id="navbar">
        <ul class="navbar-nav flex-row gap-4 justify-content-center">
          <li class="nav-item">
            <a class="nav-link" href="especies.html"><strong>Animales</strong></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="registro_animal.php">Registro de animales</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="registro_crias.php"><strong>Registrar una nueva cría</strong></a>
          </li>
        </ul>
        <form class="d-flex search-form" role="search">
          <input class="form-control me-2" type="search" placeholder="Buscar">
          <button class="btn btn-outline-custom btn-custom-outline" type="submit">Buscar</button>
        </form>
      </div>
    </div>
  </nav>

  <main class="container my-4">
    <div class="row text-center align-items-center">
      <!-- CAPRINOS -->
      <div class="col-md-5 mb-4">
        <div class="card-custom h-100">
          <a class="fw-bold m-0 hola" href="caprinos.html">
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
          <a class="fw-bold m-0 hola" href="ovinos.html">
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

  <!-- FOOTER -->
  <footer>
    <div class="footer-content d-flex justify-content-between align-items-center px-4">
      <p class="slogan m-0">SENA: CONOCIMIENTO Y EMPRENDIMIENTO PARA TODOS LOS COLOMBIANOS</p>
      <img src="../Media/icons/Logo_Sena.png" alt="Logo SENA" style="height: 40px;">
    </div>
  </footer>
</body>
</html>
