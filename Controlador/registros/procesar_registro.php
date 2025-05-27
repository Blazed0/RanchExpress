<?php

include '../../Modelo/conn.php';
include '../inicio_sesion/sesiones.php';
include '../inicio_sesion/cerrar_sesion.php';

$estado            = $_POST['estado'];
$codigo_animal     = $_POST['codigo_animal'];
$fecha_ingreso     = !empty($_POST['fecha_ingreso']) ? $_POST['fecha_ingreso'] : NULL;
$fecha_nacimiento  = $_POST['fecha_nacimiento'];
$proposito         = $_POST['proposito'];
$peso_nacimiento   = $_POST['peso_nacimiento'];
$especie            = $_POST['especie'];
$nombre            = $_POST['nombre'];
$raza              = $_POST['raza'];
$color             = $_POST['color'];
$sexo              = $_POST['sexo'];


$fileName = $_FILES['imagen_animal']['name'];
$imagen_animal = $fileName;


$stmt = $conn->prepare("INSERT INTO animal (estado,codigo_animal, fecha_ingreso, fecha_nacimiento,proposito,peso_nacimiento,nombre, especie, raza, color, sexo, imagen_animal) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?)");

$stmt->bind_param("sssssissssss", 
    $estado,
    $codigo_animal, 
    $fecha_ingreso, 
    $fecha_nacimiento, 
    $proposito,
    $peso_nacimiento, 
    $nombre,
    $especie, 
    $raza, 
    $color, 
    $sexo, 
    $imagen_animal
);
if ($stmt->execute()) {
    $session['alert'] = alerta("El animal ha sido registrada  con exito");
    header('Location: ../../Vista/registro_animal.php');
} else {
    $_SESSION['alert'] = alerta("Hubo un, error vuelve a intentarlo");
    header('Location: ../../Vista/registro_animal.php');
    exit();
}


$stmt->close();
$conn->close();
?>
