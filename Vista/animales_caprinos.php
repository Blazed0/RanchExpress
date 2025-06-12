<?php 
include '../Controlador/inicio_sesion/sesiones.php';
include '../Controlador/ver_caprinos.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Ganado Caprino - RanchExpress</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="../public/animalescaprinos.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
</head>
<body>


  <header class="d-flex justify-content-between align-items-center px-4 py-3 header-custom">
    <div class="d-flex align-items-center">
      <img src="../Media/icons/logo_pagina-removebg-preview.png" alt="Logo" width="50" class="me-2"/>
      <span class="logo-text">RanchExpress</span>
    </div>
    <nav>
      <a href="index.php" class="nav-link-custom">Principal</a>
      <a href="especies.html" class="nav-link-custom">Animales</a>
    </nav>
    <div class="d-flex">
      <input type="text" class="form-control me-2 search-input" placeholder="Search">
      <button class="btn search-btn">🔍</button>
    </div>
  </header>


  <main class="text-center py-4">
    <h2 class="section-title">CAPRINO</h2>

   
    <div class="total-box mx-auto my-3">
      <p class="fw-bold m-0">TOTAL</p>
      <hr class="my-1">
      <h4 class="m-0"><?php echo $conteoTotal ?></h4>
    </div>
    <div class="container mt-4">
      <div class="row g-4 justify-content-center">

            <?php echo $html ?>


      </div>
    </div>
    </main>
    
    
    <footer class="footer-custom d-flex justify-content-center align-items-center py-3">
      <span class="text-white me-2">SENA: CONOCIMIENTO Y EMPRENDIMIENTO PARA TODOS LOS COLOMBIANOS</span>
      <img src="../Media/icons/Logo_Sena.png" alt="SENA" width="60"/>
    </footer>

</body>
</html>
