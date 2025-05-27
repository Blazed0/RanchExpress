<?php

include '../Modelo/conn.php';
require '../Controlador/inicio_sesion/sesiones.php';
include '../Controlador/inicio_sesion/cerrar_sesion.php';

$stmtPadre = "SELECT codigo_animal FROM animal WHERE estado = 'Activo' AND sexo = 'Macho' AND proposito = 'Reproductor'";
$resultPadre = $conn->query($stmtPadre);

if($resultPadre->num_rows>0){
    $codigoPadre = [];
    while($row = $resultPadre->fetch_assoc()){
        $codigoPadre[] = $row['codigo_animal'];
    }
}
else{
    $codigoPadre = ['No hay machos disponibles'];
}
$stmtMadre = "SELECT codigo_animal FROM animal WHERE estado = 'Activo' AND sexo = 'Hembra' AND proposito = 'Reproductor'";
$resultMadre = $conn->query($stmtMadre);
$codigoMadre = [];
if($resultMadre->num_rows>0){
    while($row=$resultMadre->fetch_assoc()){
        $codigoMadre[]=$row['codigo_animal'];
    }
}
else{
    $codigoMadre = ['No hay hembras disponibles'];
}
?>