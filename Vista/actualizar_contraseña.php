<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Recupera tu Contraseña</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="../public/Registro.css"/>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<!-- Estos estilos es para mantener distinta imagen pero conservando mismos estilos -->
<body>
<div class="wrapper">
<form action="..\Controlador\inicio_sesion\actualizacion_contraseña.php" method="POST" >
    <?php
    session_start();
        if(isset($_SESSION['alert'])){
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
        }
    ?>
<h1>Recuperacion De contraseña</h1>
<input type= "hidden" name="token" value="<?php echo $_GET['token']; ?>">
<div class="input-box">
    <input type ="text" id = "claveNueva" placeholder="Ingresa tu nueva contraseña" 
    required name="claveNueva">
    <i class='bx bx-pencil'></i>
</div>
<button type="submit" class="btn">Cambiar Contraseña</button>
</form>
</div>
</body> 
</html>
