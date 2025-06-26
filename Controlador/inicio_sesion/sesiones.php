<?php
session_start();
/* Si no existe la sesion con el campo user entonces redirige al inicio de sesion */
if(!isset($_SESSION['user'])){
    header('Location:iniciar_sesion.php');
    exit();
}
?>