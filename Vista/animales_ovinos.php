<?php
include '../Controlador/ver_ovinos.php';
include 'header.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Ganado Ovino - RanchExpress</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  
  <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">

  <style>
    body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background-color: #ffffc3;
  color: #3a5e2a;
  margin: 0;
  padding: 0;
}

.section-title {
  font-family: 'Luckiest Guy', cursive;
  font-size: 2.5rem;
  color: #4e6821;
  text-transform: uppercase;
  margin-bottom: 20px;
  text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
}

.total-box {
  background: #e0e0e0;
  box-shadow: 10px 10px 20px #bebebe, -10px -10px 20px #ffffff;
  border-radius: 20px;
  padding: 15px 25px;
  max-width: 250px;
  text-align: center;
  color: #4e6821;
}

.row .fw-bold {
  color: #4e6821;
  font-size: 1.2rem;
}

.card {
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 15px 15px 30px #c7c7c7, -15px -15px 30px #ffffff;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 20px 20px 40px #c0c0c0, -20px -20px 40px #ffffff;
}

.card img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  object-position: center;
}

.card .btn {
  background-color: #6b8e23;
  border: none;
  border-radius: 12px;
  color: white;
  font-weight: bold;
  margin-top: 10px;
  padding: 8px 16px;
  transition: background-color 0.3s ease, transform 0.2s ease;
}

.card .btn:hover {
  background-color: #7ea93a;
  transform: scale(1.05);
}

  </style>
</head>
<body>
  <main class="text-center py-4">
    <h2 class="section-title">ovinos</h2>

    <div class="total-box mx-auto my-3">
      <p class="fw-bold m-0">TOTAL</p>
      <hr class="my-1">
      <h4 class="m-0"><?php echo $conteoTotal ?></h4>
    </div>
     <div class="container mt-4">
      <div class="row g-4 justify-content-center">
    <div class="row text-center mt-2">
      <div class="col-4 fw-bold">MACHOS</div>
      <div class="col-4 fw-bold">HEMBRAS</div>
      <div class="col-4 fw-bold">CRÍAS</div>
    </div>
     <!-- Imágenes por categoría -->
    <div class="row text-center  mb-4 gx-2 gy-2">
      <!-- Fila 1 -->
       <div class="col-md-4 align-items-center">
        <?php echo $htmlMacho; ?>  
      </div>
 
      <!-- Fila 2 -->
       <div class="col-md-4 align-items-center justify-content-center">
        <?php echo $htmlHembra  ?>
      </div>

      <!-- Fila 3 -->
       <div class="col-md-4">
         <?php echo $htmlCrias ?>
    </div>



      </div>
    </div>
  </main>

</body>
</html>
