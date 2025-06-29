<?php
/* Si no existe la sesion con el campo user entonces redirige al inicio de sesion */
include 'session_start.php';
if(!isset($_SESSION['user'])){
    header('Location:iniciar_sesion.php');
    exit();
}
?>