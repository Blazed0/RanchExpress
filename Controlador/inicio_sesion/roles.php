<?php
if(!isset($_SESSION['rol']) || $_SESSION['rol']!='Instructor'){
    $_SESSION['alert'] = alerta("No tienes los permisos para acceder al componente");
    header("Location:index.php");
    exit();
}
?>