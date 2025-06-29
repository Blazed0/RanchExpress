<!-- PruebaInsertacionDir3cta -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Unete a RanchExpress</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="../public/Registro.css"/>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<!-- Estos estilos es para mantener distinta imagen pero conservando mismos estilos -->
<body>
    <!-- Color del fondo blanco pa que se vea bonito
     Si lo hago cafe, la letra tiene que ser blanca para resultar -->
<div class="wrapper">
<form method="POST" id = "formulario" action="../Controlador/inicio_sesion/inicio_sesion.php">
    <?php
session_start();
    if(isset($_SESSION['alert'])){
        echo $_SESSION['alert'];
        unset($_SESSION['alert']);
    }
?>
<h1>Inicio De Sesión</h1>
<div class="input-box">
    <select name="rol" id="rol">
        <option value="Encargado De Area">Encargado De Area</option>
        <option value="Visualizador">Visualizador</option>
    </select>
</div>
<div class="input-box">
<input type ="text" id = "numeroDNI" placeholder="Numero de Identificacion" 
         required name="numeroDNI">
<i class='bx bxs-lock-alt'></i>
</div>
<div class="input-box">
<input type = "password" id="clave" name = "clave" placeholder="Contrase&#241;a" required >
<i class='bx bx-ghost'></i>
</div>
<div class="remember-forgot">
<a href="recuperar_contraseña.php">¿Olvidaste la contraseña?</a>
</div>
<button type="submit" class="btn" id="iniciar" name = "iniciar">Inicia Sesion</button>
</div>
</form>
<script src="../Controlador/inicio_sesion/validacion_registro.js"></script>
</div>
</body> 
</html>
