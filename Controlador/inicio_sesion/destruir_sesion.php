<?php 
include 'alertas.php';
session_start();

if(session_destroy()){
    $_SESSION['alert'] = alerta("Sesion Cerrada");
    header('Location: ../../Vista/iniciar_sesion.php');
    exit;
}

?>