<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registra tu animal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/registro_animal.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<body>


  <div class="container mt-5">

 <button class="btn-flecha" onclick="history.back()">  
    <i class="bi bi-arrow-left"> </i> 
</button>
    <?php 
    session_start();
    if(isset($_SESSION['alert'])){
        echo $_SESSION['alert'];
        unset ($_SESSION['alert']);
    }
    ?>
    <h2>Registro de animales</h2>
    <form id="registration-form" action="../Controlador/registro_animal.php" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="especie" class="form-label">Especie</label>
            <select class="form-select" id="especie" name="especie" required>
                <option value="">Seleccionar especie</option>
                <option value="bovino">Bovino</option>
                <option value="caprino">Caprino</option>
                  <option value="ovino">Ovino</option>
                    <option value="porcino">Porcino</option>
            </select>
        </div>

         <div class="mb-3">
            <label for="id" class="form-label">N° Codigo</label>
            <input type="number" class="form-control" id="id" name="id" required>
        </div>
        
        <div class="mb-3">
            <label for="weight" class="form-label">Peso (kg)</label>
            <input type="number" class="form-control" id="weight" name="weight" required>
        </div>
        <div class="mb-3">
            <label for="breed" class="form-label">Raza</label>
            <input type="text" class="form-control" id="breed" name="breed" required>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Edad</label>
            <input type="number" class="form-control" id="age" name="age" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Sexo</label>
            <select class="form-select" id="gender" name="gender" required>
                <option value="">Seleccionar sexo</option>
                <option value="macho">Macho</option>
                <option value="hembra">Hembra</option>
            </select>
        </div>
        
       
        <div class="mb-3">
            <label for="image" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-submit">Registrar Animal</button>
    </form>
    <div id="result"></div>
</div>   
      <!-- Scripts para la funcionalidad de la pagina -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 

  <script src="/Controlador/registro_animal.js">
</script>
      
</body>
</html>