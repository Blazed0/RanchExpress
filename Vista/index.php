<?php
include "../Controlador/vistas_dinamicas/pagina_principal.php";
require_once "../Controlador/inicio_sesion/sesiones.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal</title>

    <link rel="stylesheet" href="../public/pagina_principal.css">

</head>
<body>
  <div class="grid grid-cols-6 grid-rows-6 gap-4">
    <div class="col-span-6">
      <nav class="navbar navbar-expand-lg navbar-custom">
        <header class="header">
        <div class="logo">
        <img src = "../Media/logo_pagina.png" alt="logoApp" id="logazo">
      </div>
    </header>
    <a class="navbar-brand" href = "index.php">RanchExpress</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

   <!-- Esto hay que centrarlo -->
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       <li class="nav-item">
         <a class="nav-link active" aria-current="page" href="registro_animal.php">Registra un nuevo animal</a>
       </li>
       <li class = "nav-item">
        <a class = "nav-link" aria-details="page"href = "seleccion_animales.php"><strong>Animales</strong></a>
       </li>
<!-- Hay que mandar esto a la derecha -->
     <form class="d-flex" role="search">
       <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
       <button class="btn btn-outline-custom btn-custom-outline" type="submit">Buscar</button>
     </form>
    </div>
    </div> 
    <div class="col-span-2 col-start-3 row-start-2">
        <h1>
            Animales recientes
        </h1>
        <h3>Hola <?php echo $_SESSION['user'] ?></h3>
    </div>
<div class = "especie">
  <div class="col-span-2 row-span-3 row-start-3">
    <H2>
      Bovinos
    </H2>
    <?php echo $htmlBovinos ?>
  </div>
  <div class="col-span-2 row-span-3 col-start-3 row-start-3">
    <h2>
      Cabras
    </h2>
    <?php echo $htmlCabras?>
  </div>
  <div class="col-span-2 row-span-3 col-start-5 row-start-3">
    <h2>
      Gallinas
    </h2>
    <?php echo $htmlGallinas?>
  </div>
</div>
  <div class="col-span-6 row-start-6">
    <footer>
      <div class="footer-content">
        
      <div class="container">
        <p class="slogan">"SENA conocimiento y emprendimiento para todos los colombianos"</p>
        <div class="social-icons">
          <a href="https://www.facebook.com/groups/742279244377198/?ref=share&mibextid=NSMWBT" target="_blank" class="social-icon"><i class="fab fa-facebook"></i></a>
                  <a href="https://wa.me/573142293920" target="_blank" class="social-icon"><i class="fab fa-whatsapp"></i></a>
                  <a href="https://www.instagram.com/rach.express?igsh=bzhpem96cWlsM3kx" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
        </div>
      </div> 
  </footer>
    </div>

</body>
</html>