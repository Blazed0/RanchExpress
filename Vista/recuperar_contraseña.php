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
<form method="GET" id = "formulario" action="../Controlador/inicio_sesion/recuperacion_contraseña.php">
    <?php
    session_start();
        if(isset($_SESSION['alert'])){
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
        }
    ?>
<h1>Recuperacion De contraseña</h1>
<div class="input-box">
    <select name="rol" id="rol">
        <option value="encargado de area">Encargado De Area</option>
        <option value="visualizador">Visualizador</option>
    </select>
</div>
<div class="input-box">
    <input type ="text" id = "numeroDNI" placeholder="Ingresa tu numero de Cedula" 
    required name="numeroDNI">
    <i class='bx bx-pencil'></i>
</div>
<div class="input-box">
    <input type ="text" id = "nombre" placeholder="Ahora tu nombre"
    required name="nombre">
    <i class='bx bx-user'></i> 
</div>
<button type="submit" class="btn">Recuperar contraseña</button>
</div>
</div>
</form>
</div>
</body> 
</html>
