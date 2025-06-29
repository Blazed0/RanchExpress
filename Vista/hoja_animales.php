<?php
include '../Controlador/mostrar_info_animales.php';
include '../Controlador/graficos_hoja_animal.php';
include 'header.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Registro Animal</title>

  <!-- Aquí incluyo el CSS directamente -->
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #ffffc3;
      margin: 0;
      padding: 0;
    }

    .main-box {
      border-radius: 20px;
      background: #e0e0e0;
      box-shadow: 15px 15px 30px #bebebe,
                  -15px -15px 30px #ffffff;
      padding: 20px;
      margin: 20px auto;
      max-width: 1100px;
    }

    .container {
      max-width: 100%;
    }

    /* Imagen que iguala al estado */
    .img-box {
      border-radius: 20px;
      overflow: hidden;
      height: 100%;
      box-shadow: inset 5px 5px 15px #bebebe,
                  inset -5px -5px 15px #ffffff;
    }

    .img-box img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 20px;
      display: block;
      box-shadow: none;
      user-select: none;
    }

    /* Cajas de contenido */
    .info-box {
      background: #e0e0e0;
      border-radius: 20px;
      box-shadow: 15px 15px 30px #bebebe,
                  -15px -15px 30px #ffffff;
      padding: 20px;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      color: #333;
    }

    /* Títulos y textos */
    h2, h4, h6 {
      color: #4e6821;
      font-weight: 700;
      margin-bottom: 15px;
      user-select: none;
    }

    h6 {
      font-size: 1rem;
    }

    p {
      margin: 5px 0;
      color: #555;
      font-size: 1rem;
    }

    p.fs-5 {
      font-size: 1.25rem;
      font-weight: 600;
      color: #4e6821;
    }

    /* Botones estilo neumorphism */
    .btn-danger {
      background-color: #6b8e23;
      border: none;
      border-radius: 20px;
      box-shadow: 7px 7px 15px #a3b85c,
                  -7px -7px 15px #b8de65;
      color: white;
      font-weight: 600;
      transition: all 0.3s ease;
      user-select: none;
    }

    .btn-danger:hover {
      background-color: #7ea93a;
      box-shadow: 4px 4px 10px #9bb53e,
                  -4px -4px 10px #b9f07f;
      cursor: pointer;
    }

    .btn-primary {
      background-color: #4e6821;
      border: none;
      border-radius: 20px;
      box-shadow: 7px 7px 15px #3b4a16,
                  -7px -7px 15px #5a7327;
      color: white;
      font-weight: 600;
      transition: all 0.3s ease;
      user-select: none;
    }

    .btn-primary:hover {
      background-color: #66862f;
      box-shadow: 4px 4px 10px #527122,
                  -4px -4px 10px #78a144;
      cursor: pointer;
    }

    a.hola {
      text-decoration: none;
      color: #4e6821;
      font-weight: 600;
      transition: color 0.3s ease;
      user-select: none;
    }

    a.hola:hover {
      color: #7ea93a;
      text-decoration: underline;
    }

    #estado {
      max-width: 50%;
      font-weight: 700;
      color: #4e6821;
      user-select: none;
    }
  </style>
</head>
<body>
  <div class="main-box p-3">
    <main class="container my-3">

      <!-- Fila 1: Imagen + Estado -->
      <div class="row g-3 align-items-stretch">
        <div class="col-md-6">
          <div class="img-box h-100">
            <?php
              echo '<img src="../Media/Uploads/' . $imagen . '" alt="Animal" />';
            ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="info-box h-100 d-flex flex-column justify-content-between">
            <div>
              <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="m-0">ESTADO</h6>
                <span id="estado"><?php echo $html ?></span>
              </div>
              <p class="mb-1">Padre: <a href="hoja_animales.php?token=<?= $nombrePadre ?>" class="hola"><?= $nombrePadre ?></a></p>
              <p class="mb-1">Madre: <a href="hoja_animales.php?token=<?= $nombreMadre ?>" class="hola"><?= $nombreMadre ?></a></p>
              <p class="mb-1">Codigo: <?= $codigo ?></p>
              <p class="mb-1">Raza: <?= $raza ?></p>
              <p class="mb-1">Raza Del Padre: <?= $padreRaza ?></p>
              <p class="mb-1">Raza De La Madre: <?= $madreRaza ?></p>
              <p class="mb-2">Sexo: <?= $sexo ?></p>
            </div>
            <a class="btn btn-danger btn-sm mt-2" href="#">ACTUALIZAR</a>
          </div>
        </div>
      </div>
            <p class="mb-1">Padre: <a href= "hoja_animales.php?token=<?=base64_encode($nombrePadre)?>"><?php echo $nombrePadre ?></a></p>
            <p class="mb-1">Madre:<a href = "hoja_animales.php?token=<?=base64_encode($nombreMadre)?>"><?php echo $nombreMadre ?></a></p>
            <p class="mb-1">Codigo: <?php echo $codigo ?></p>
            <p class="mb-1">Raza: <?php echo $raza ?></p>
            <p class="mb-1">Raza Del Padre: <?php echo $padreRaza?></p>
            <p class="mb-1">Raza De La Madre: <?php echo $madreRaza?></p>
            <p class="mb-2">Sexo: <?php echo $sexo ?></p>
          </div>
          <a class="btn btn-danger btn-sm mt-2" href="#">ACTUALIZAR</a>
        </div>
      </div>
    </div>

      <!-- Fila 2: Propósito + Peso -->
      <div class="row g-3 mt-2">
        <div class="col-md-6">
          <div class="info-box text-center h-100">
            <p class="fw-bold mb-0">Propósito</p>
            <p class="fs-5"><?= $proposito ?></p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="info-box text-center h-100">
            <img src="https://cdn-icons-png.flaticon.com/512/5270/5270995.png" alt="peso" width="30" class="mb-2" />
            <a class="fw-bold m-0 hola" href="tabla.php?token=<?= base64_encode($id_animal) ?>">
              <button class="btn btn-danger btn-sm">Peso En Kilogramos</button>
            </a>
            <p>
              Último Pesaje: <?= $peso ?><br />
              Fecha del Pesaje: <?= $fechaPesaje ?>
            </p>
            <a href="formulario_peso.php?token=<?= base64_encode($token) ?>" role="button" class="btn btn-danger btn-sm">ACTUALIZAR</a>
          </div>
        </div>
      </div>

      <!-- Fila 3: Tratamientos -->
      <div class="row g-3 mt-2">
        <div class="col-12">
          <div class="info-box">
            <div class="d-flex justify-content-between align-items-center">
              <h4 class="m-0">Tratamientos</h4>
              <a href="registro_tratamiento.php" role="button" class="btn btn-primary btn-sm">Actualizar</a>
            </div>
            <p class="fw-bold mt-2">
              <?= $nombreTratamiento ?><br />
              <?= $fechaAplicacion ?><br />
              <?= $diagnostico ?>
            </p>
            <hr />
            <hr />
            <hr />
          </div>
        </div>
      </div>

      <!-- Fila 4: Producción -->
      <div class="row g-3 mt-2">
        <div class="col-12">
          <div class="info-box text-center">
            <h2>Producción</h2>

            <script src="../Controlador/graficos.js"></script>
            <script src="../Controlador/grafico_lana.js"></script>
            <?php
              echo $GLOBALS['produccion'];
            ?>
          </div>
        </div>
      </div>

    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>
  <script src="../Controlador/grafico_lana.js"></script>
  <script src="../Controlador/graficos.js"></script>
</body>
</html>
