<?php

include '../../Modelo/conn.php';
include '../inicio_sesion/sesiones.php';
include '../inicio_sesion/cerrar_sesion.php';


$fecha_nacimiento    = $_POST['fecha_nacimiento'];
$sexo                =  $_POST['sexo'];
$codigo_cria         = $_POST['codigo_cria'];
$raza                = $_POST['raza'];
$observaciones       = $_POST['observaciones'];
$peso_nacimiento     = $_POST['peso_nacimiento'];
$nombre              = $_POST['nombre'];
$especie             =$_POST['especie'];

  $fileName = $_FILES['imagen_cria']['name'];
    $imagen_cria = $fileName;


$stmt = $conn->prepare("INSERT INTO crias (
    fecha_nacidos, sexo, codigo_cria, 
    raza,observaciones, peso_nacimiento,nombre_cria,especie_cria, imagen_cria
) VALUES (?, ?, ?, ?, ?, ?, ?,?,?)");

$stmt->bind_param("sssssisss", 
    $fecha_nacimiento, 
    $sexo, 
    $codigo_cria, 
    $raza, 
    $observaciones,
    $peso_nacimiento, 
    $nombre,
    $especie,
    $imagen_cria

    
);


if ($stmt->execute()) {
    $session['alert'] = alerta("La cria ha sido registrada  con exito");
    header('Location: ../../Vista/registro_crias.php');
} else {
    $_SESSION['alert'] = alerta("Hubo un, error vuelve a intentarlo");
    header('Location: ../../Vista/registro_cria.php');
    exit();
}


$stmt->close();
$conn->close();
?>
