<?php 
include 'header.php';

?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>RanchExpress</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  
  <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">

  <style>
    body {
  background-color: #ffffc3;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  color: #2e4a21;
  margin: 0;
  padding: 0;
}

main {
  padding-top: 30px;
}

.animal-card {
  border-radius: 20px;
  box-shadow: 15px 15px 30px #c8d8c0, -15px -15px 30px #ffffff;
  background-color: #e0f2df;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  overflow: hidden;
  height: 100%;
}

.animal-card:hover {
  transform: translateY(-10px);
  box-shadow: 20px 20px 40px #bdd6b0, -20px -20px 40px #ffffff;
}

.animal-card img {
  height: 300px;
  object-fit: cover;
  border-bottom: 4px solid #6b8e23;
}

.animal-label {
  display: inline-block;
  margin-top: 15px;
  font-size: 1.2rem;
  font-weight: 700;
  padding: 10px 20px;
  border-radius: 20px;
  text-decoration: none;
  background-color: #6b8e23;
  color: #ffffff;
  box-shadow: 5px 5px 10px #587a1e, -5px -5px 10px #7fb428;
  transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

.animal-label:hover {
  background-color: #7ea93a;
  box-shadow: 4px 4px 10px #5a7528, -4px -4px 10px #9bd255;
}

  </style>
</head>
<body>
   
  <main class="py-4 text-center">
  <div class="container">
    <div class="row justify-content-center g-4">
        
        
      
        <div class="col-md-5">
          <div class="card animal-card">
            <img src="../Media/General/easset_upload_file43365_884961_e.png" class="card-img-top" alt="Ganado">
            <div class="card-body" >
              <!-- Cambiar el color del boton porque no calza y la tipografia menos todos los botones iguales o comemos vrga  -->
              <a class="animal-label ganado" href="animales_ovinos.php" >Ganado Ovino</a>
            </div>  
          </div>
        </div>

       
        <div class="col-md-5">
          <div class="card animal-card">
            <img src="../Media/General/tree-goats-morocco.jpg" class="card-img-top" alt="Caprinos">
            <div class="card-body">
             <a class="animal-label caprinos" href="animales_caprinos.php" >Ganado Caprino</a>
            </div>
          </div>
        </div>

      </div>
    </main>
  </div>
   <head>
    <link rel="stylesheet" href="../public/footer.css">
   </head>
  

</body>
</html>
