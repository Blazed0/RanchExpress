<?php
include '../Controlador/pagina_principal.php';
include "../Controlador/inicio_sesion/sesiones.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
<<<<<<< HEAD
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Principal</title>
=======

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal</title>
>>>>>>> 5c0306bf5443da2d237602eb785568085674806a

  <!-- Bootstrap + Icons -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- Tu CSS personalizado -->
  <link rel="stylesheet" href="../public/pagina_principal.css">
</head>
<body>
<<<<<<< HEAD
  <nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid align-items-center">
      <div class="logo">
        <img src="../Media/icons/logo_pagina-removebg-preview.png" alt="Logo" id="logazo">
=======
  <div class="grid grid-cols-6 grid-rows-6 gap-4">
    <div class="col-span-6">
      <nav class="navbar navbar-expand-lg navbar-custom">
        <header class="header">
        <div class="logo">
        <img src = "../Media/icons/logo_pagina.jpeg" alt="logoApp" id="logazo">
>>>>>>> 5c0306bf5443da2d237602eb785568085674806a
      </div>
      <p class="navbar-brand" >RanchExpress</p>

<<<<<<< HEAD
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-between" id="navbar">
        <div class="mx-auto text-center navbar-links">
          <ul class="navbar-nav flex-row gap-4 justify-content-center">
            <li class="nav-item">
              <a class="nav-link" href="especies.html"><strong>Animales</strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="registro_animal.php">Registro de animales</a>
            </li>
          </ul>
=======
   <!-- Esto hay que centrarlo -->
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       <li class="nav-item">
         <a class="nav-link active" aria-current="page" href="registro_animal.php">Registra un nuevo animal</a>
       </li>
       <li class = "nav-item">
        <a class = "nav-link" aria-details="page"href = "seleccion_animales.php"><strong>Animales</strong></a>
       </li>
       <li class="nav-item">
        <a href="registro_crias.php" aria-details = "page" class="nav-link"><strong>Registra una nueva cria</strong></a>
       </li>
<!-- Hay que mandar esto a la derecha -->
    <div class="search-bar">
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-custom btn-custom-outline" type="submit">Buscar</button>
      </form>
    </div>
  </div> 
</div>     
<main class="container my-4">
    <div class="row text-center">
      
      <!-- Caprinos -->
      <div class="col-md-4">
        <div class="card-custom">
          <h3>CAPRINOS</h3>
          <p>
            Su leche es una fuente excelente de proteína animal que puede ser consumida por los niños y la familia en forma de leche fresca o transformada en queso
          </p>
          <div class="d-flex justify-content-center">
            <div class="text-center mx-2">
                <?php echo $htmlCabras ?>
            </div>
          </div>
        </div>
      </div>

      <!-- Total de animales -->
      <div class="col-md-4 d-flex align-items-center justify-content-center">
        <div class="central-box small-box">
          TOTAL DE <br />ANIMALES <br />
          <div class="total-count"><?php echo $totalResultados ?></div>
        </div>
      </div>

      <!-- Ovinos -->
      <div class="col-md-4">
        <div class="card-custom">
          <h3>OVINOS</h3>
          <p>
            son buenos productores de leche y carne, pero también lo son como proveedores de lana que se emplea en la industria textil para la confección de diversos tipos de tela, entre ellas, la lana.
          </p>
          <div class="d-flex justify-content-center">
            <div class="text-center mx-2">
                <?php echo $htmlOvejas ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>
  <div class="col-span-6 row-start-6">
    <footer>
      <div class="footer-content">
        
      <div class="container">
        <p class="slogan">"SENA conocimiento y emprendimiento para todos los colombianos"</p>
        <div class="social-icons">
          <a href="https://www.facebook.com/groups/742279244377198/?ref=share&mibextid=NSMWBT" target="_blank" class="social-icon"><i class="fab fa-facebook"></i></a>
                  <a href="https://wa.me/573142293920" target="_blank" class="social-icon"><i class="fab fa-whatsapp"></i></a>
                  <a href="https://www.instagram.com/rach.express?igsh=bzhpem96cWlsM3kx" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
>>>>>>> 5c0306bf5443da2d237602eb785568085674806a
        </div>
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
           <a class="fw-bold m-0 hola"  href="">
            <button class="btn btn-danger btn-sm">
              CAPRINOS
            </button>
            </a>
          <p>
            Su leche es una fuente excelente de proteína animal que puede ser consumida por los niños y la familia en forma de leche fresca o transformada en queso
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
          <h3>OVINOS</h3>
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
