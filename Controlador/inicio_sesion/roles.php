<?php
include 'alertas.php';
session_start();

if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 'Encargados De Area'){
    header('Location:../../Vista/index.php');
    $_SESSION['alerta'] = alerta("No tienes permisos para poder interactuar con ese componente, por favor habla con el encargado de area para poder conseguir los permisos");
    exit();
}
?>