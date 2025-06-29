<?php
include 'alertas.php';
include 'session_start.php';
if(!isset($_SESSION['rol']) && $_SESSION['rol']!='Encargado De Area'){
    $_SESSION['alert'] = alerta("No tienes los permisos para acceder al componente");
    header("Location:index.php");
    exit();
}
?>