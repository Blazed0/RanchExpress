<?php
include '../Controlador/pagina_principal.php';
include 'header.php';

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

  <style>
    .custom-carousel {
      height: 400px;
      overflow: hidden;
      border-radius: 20px;
      transition: transform 0.4s ease, box-shadow 0.4s ease;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    .custom-carousel:hover {
      transform: translateY(-10px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
    }

    .custom-carousel .carousel-item,
    .custom-carousel .carousel-inner {
      height: 100%;
      border-radius: 20px;
    }

    .custom-carousel .carousel-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 20px;
    }

    .carousel-caption {
      bottom: 20px;
<<<<<<< HEAD
      center: 20px;
      text-align: center;
=======
      left: 20px;
      text-align: left;
>>>>>>> 9b22825f7b7705bb40dbc5fffafa7e35759c3859
    }

    .carousel-caption button {
      font-size: 14px;
      padding: 10px 20px;
      border: none;
      background-color: #6B8E23;
    }

    /* Neumorphism style for Caprinos */
    .par5a-caprinos {
      width: 100%;
      min-height: 350px;
      border-radius: 30px;
      background: #e0e0e0;
      box-shadow: 15px 15px 30px #bebebe, -15px -15px 30px #ffffff;
      padding: 20px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .par5a-caprinos:hover {
      transform: translateY(-10px);
      box-shadow: 20px 20px 40px #b1b1b1, -20px -20px 40px #ffffff;
    }
    .par5a-caprinos h1 {
      font-weight: bold;
      margin-bottom: 20px;
      color: #4b6836;
    }

    /* Neumorphism style for Total */
    .par5a-total {
      width: 100%;
      min-height: 350px;
      border-radius: 30px;
      background: #e0e0e0;
      box-shadow: 15px 15px 30px #bebebe, -15px -15px 30px #ffffff;
      padding: 20px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .par5a-total:hover {
      transform: translateY(-10px);
      box-shadow: 20px 20px 40px #b1b1b1, -20px -20px 40px #ffffff;
    }
    .par5a-total strong {
      font-size: 1.3rem;
      color: #4b6836;
      margin-bottom: 20px;
      text-align: center;
    }
    .par5a-total .total-count {
      font-size: 3rem;
      font-weight: 900;
      color: #6b8e23;
    }

    /* Neumorphism style for Ovinos */
    .par5a-ovinos {
      width: 100%;
      min-height: 350px;
      border-radius: 30px;
      background: #e0e0e0;
      box-shadow: 15px 15px 30px #bebebe, -15px -15px 30px #ffffff;
      padding: 20px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .par5a-ovinos:hover {
      transform: translateY(-10px);
      box-shadow: 20px 20px 40px #b1b1b1, -20px -20px 40px #ffffff;
    }
    .par5a-ovinos h1 {
      font-weight: bold;
      margin-bottom: 20px;
      color: #4b6836;
    }

    /* --- Aquí agrego el estilo para el botón verde oliva con efecto neumorphism --- */
    .btn-olive {
      background-color: #6b8e23;
      color: white;
      font-weight: 600;
      border: none;
      border-radius: 20px;
      box-shadow: 7px 7px 15px #a3b85c,
                  -7px -7px 15px #b8de65;
      transition: all 0.3s ease;
      user-select: none;
      padding: 10px 12px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
    }
    .btn-olive:hover {
      background-color: #7ea93a;
      box-shadow: 4px 4px 10px #9bb53e,
                  -4px -4px 10px #b9f07f;
      cursor: pointer;
      color: white;
    }
  </style>
</head>

<body>
  <main class="w-100 p-0 m-0">
    <!-- Carrusel -->
    <div id="carouselExample" class="carousel slide custom-carousel mb-4" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="../Media/General/cabra2.jfif" class="d-block w-100" alt="..." />
          <div class="carousel-caption d-none d-md-block">
<<<<<<< HEAD
         <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'Instructor'): ?>
                <a href="estadisticacaprinos.php" class="btn btn-olive">Estadistica</a> <!-- Cambiado a btn-olive -->
                   <?php else: ?>
                     <button class="btn btn-olive" disabled>Estadistica</button>
                     <?php endif; ?> <!-- Cambiado a btn-olive -->
=======
>>>>>>> 9b22825f7b7705bb40dbc5fffafa7e35759c3859
          </div>
        </div>
        <div class="carousel-item">
          <img src="../Media/General/beja.avif" class="d-block w-100" alt="..." />
          <div class="carousel-caption d-none d-md-block">
<<<<<<< HEAD
            <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'Instructor'): ?>
                <a href="estadisticaovinos.php" class="btn btn-olive" >Estadistica</a> <!-- Cambiado a btn-olive -->
                   <?php else: ?>
                     <button class="btn btn-olive" disabled>Estadistica</button>
                     <?php endif; ?>
            
=======
>>>>>>> 9b22825f7b7705bb40dbc5fffafa7e35759c3859
          </div>
        </div>
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>

    <div class="row text-center align-items-center">
      <?php
      if(isset($_SESSION['alert'])){
        echo $_SESSION['alert'];
        unset($_SESSION['alert']);
      }
      ?>

      <!-- CAPRINOS -->
      <div class="col-md-5 mb-4">
        <div class="par5a-caprinos">
          <h1>CAPRINOS</h1>
          <div class="row">
            <?php echo $htmlCabras; ?>
          </div>
        </div>
      </div>

      <!-- TOTAL -->
      <div class="col-md-2 mb-4 d-flex align-items-center justify-content-center">
        <div class="par5a-total text-center">
          <strong>TOTAL DE <br />ANIMALES</strong>
          <div class="total-count"><?php echo $totalResultados; ?></div>
        </div>
      </div>

      <!-- OVINOS -->
      <div class="col-md-5 mb-4">
        <div class="par5a-ovinos">
          <h1>OVINOS</h1>
          <div class="row">
            <?php echo $htmlOvejas; ?>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
