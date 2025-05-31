<?php

include '../Modelo/conn.php';
require '../Controlador/inicio_sesion/sesiones.php';
include '../Controlador/inicio_sesion/cerrar_sesion.php';

<<<<<<< HEAD
$stmtPadre = "SELECT id_animal,codigo_animal FROM animal WHERE estado = 'Activo' AND sexo = 'Macho' AND proposito = 'Reproductor'";
=======
$stmtPadre = "SELECT codigo_animal FROM animal WHERE estado = 'Activo' AND sexo = 'Macho' AND proposito = 'Reproductor'";
>>>>>>> 5c0306bf5443da2d237602eb785568085674806a
$resultPadre = $conn->query($stmtPadre);

if($resultPadre->num_rows>0){
    $codigoPadre = [];
    while($row = $resultPadre->fetch_assoc()){
<<<<<<< HEAD
        $codigoPadre[] = $row;
=======
        $codigoPadre[] = $row['codigo_animal'];
>>>>>>> 5c0306bf5443da2d237602eb785568085674806a
    }
}
else{
    $codigoPadre = ['No hay machos disponibles'];
}
<<<<<<< HEAD
$stmtMadre = "SELECT id_animal,codigo_animal FROM animal WHERE estado = 'Activo' AND sexo = 'Hembra' AND proposito = 'Reproductor'";
=======
$stmtMadre = "SELECT codigo_animal FROM animal WHERE estado = 'Activo' AND sexo = 'Hembra' AND proposito = 'Reproductor'";
>>>>>>> 5c0306bf5443da2d237602eb785568085674806a
$resultMadre = $conn->query($stmtMadre);
$codigoMadre = [];
if($resultMadre->num_rows>0){
    while($row=$resultMadre->fetch_assoc()){
<<<<<<< HEAD
        $codigoMadre[]=$row;
    }
}
else{
    $codigoMadre = ['No hay hembras disponibles'];  
=======
        $codigoMadre[]=$row['codigo_animal'];
    }
}
else{
    $codigoMadre = ['No hay hembras disponibles'];
>>>>>>> 5c0306bf5443da2d237602eb785568085674806a
}
?>