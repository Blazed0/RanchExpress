<?php
include 'alertas.php';
include 'session_start.php';

if(!isset($_SESSION['rol']) && $_SESSION['rol']!='Encargado De Area'){
    echo "si";
}

?>