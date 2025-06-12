  <?php
  include '../Controlador/inicio_sesion/sesiones.php';
  include '../Controlador/ver_pesos.php';
  ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Registro de Peso</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../public/tabla.css" />
</head>
<body>

   <?php 

      if(isset($_SESSION['alert'])){
          echo $_SESSION['alert'];
          unset ($_SESSION['alert']);
      }
      ?>


<header class="header d-flex justify-content-between align-items-center px-3 py-2">
  <div class="d-flex align-items-center">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Logo_SENA.svg/1200px-Logo_SENA.svg.png" alt="logo" class="logo me-2">
    <span class="brand-name">RanchExpress</span>
  </div>
  <nav class="nav-links d-flex gap-3">
    <a href="index.php">Principal</a>
    <a href="especies.html">animales</a>
  </nav>
  <input type="text" class="search-input" placeholder="Search">
</header>


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
          <th scope="col">PESO</th>
          <th scope="col">FECHA</th>
          <th scope="col">OBSERVACIONES</th>
        </tr>
      </thead>
      <tbody>
          <?php echo $html ?>

        
      </tbody>
    </table>
  </div>
</main>


<footer class="footer text-center py-2">
  SENA: CONOCIMIENTO Y EMPRENDIMIENTO PARA TODOS LOS COLOMBIANOS
  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Logo_SENA.svg/1200px-Logo_SENA.svg.png" class="logo-sena ms-2" alt="SENA">
</footer>

</body>
</html>
