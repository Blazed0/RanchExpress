<?php

include '../Modelo/conn.php';


$stmtPadre = "SELECT id_animal,codigo_animal FROM animal WHERE estado = 'Activo' AND sexo = 'Macho' AND proposito = 'Reproductor'";
$resultPadre = $conn->query($stmtPadre);
$codigoPadre = [];

if($resultPadre->num_rows>0){
    while($row = $resultPadre->fetch_assoc()){
        $codigoPadre[] = $row;
    }
}

$stmtMadre = "SELECT id_animal,codigo_animal FROM animal WHERE estado = 'Activo' AND sexo = 'Hembra' AND proposito = 'Reproductor'";
$resultMadre = $conn->query($stmtMadre);
$codigoMadre = [];
if($resultMadre->num_rows>0){
    while($row=$resultMadre->fetch_assoc()){
        $codigoMadre[]=$row;
    }
}
?>