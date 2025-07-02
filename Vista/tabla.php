  <?php
  include '../Controlador/ver_pesos.php';
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


  <style>
  body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background-color: #ffffc3;
  margin: 0;
  padding: 0;
  color: #374c2c;
}

main.container {
  background-color: #ffffff;
  border-radius: 20px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
  padding: 30px;
  max-width: 850px;
  margin: 40px auto;
}

/* Botón de regreso */
.btn-outline-dark.rounded-circle {
  background-color: #7f9e3f;
  color: white;
  border: none;
  width: 45px;
  height: 45px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  font-weight: bold;
}
.btn-outline-dark.rounded-circle:hover {
  background-color: #67832c;
}

/* Tabla */
.table-responsive {
  overflow-x: auto;
}

.custom-table {
  width: 100%;
  border-collapse: collapse;
  border-radius: 16px;
  overflow: hidden;
  background: #f9fdf2;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.table-head th {
  background-color: #cde5af;
  color: #3b5024;
  font-weight: bold;
  font-size: 16px;
  text-transform: uppercase;
  padding: 15px;
  border-bottom: 2px solid #b1cf88;
}

.custom-table tbody tr {
  transition: background-color 0.2s ease;
}

.custom-table tbody tr:hover {
  background-color: #eaf7d5;
}

.custom-table tbody td {
  padding: 15px 12px;
  font-size: 15px;
  color: #3d5227;
  border-bottom: 1px solid #ddebd2;
}

/* Responsive */
@media (max-width: 600px) {
  .custom-table thead {
    display: none;
  }

  .custom-table, .custom-table tbody, .custom-table tr, .custom-table td {
    display: block;
    width: 100%;
  }

  .custom-table tr {
    margin-bottom: 20px;
    background-color: #f3fdf0;
    border-radius: 15px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    padding: 10px;
  }

  .custom-table td {
    text-align: right;
    padding-left: 50%;
    position: relative;
    border-bottom: none;
  }

  .custom-table td::before {
    content: attr(data-label);
    position: absolute;
    left: 12px;
    top: 14px;
    font-weight: bold;
    color: #6a8b37;
    font-size: 13px;
    text-transform: uppercase;
  }
}


  </style>
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
    <button class="btn btn-outline-dark rounded-circle"  onclick="history.back()" >
      <span class="fs-4">&#8592;</span>
    </button>
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



</body>
</html>
