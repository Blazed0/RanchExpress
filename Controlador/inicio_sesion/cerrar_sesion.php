<?php
$sesionCerrada = false;
function cerrarSesion(): never{
    $sesionCerrada = true;
    session_destroy();
    header("Location: ../../Vista/iniciar_sesion.php");
    exit();
}
 function alerta($mensaje): string{
       return "<div class='alert alert-warning' role='alert'>"
       .$mensaje.
       "</div>";
    }
?>