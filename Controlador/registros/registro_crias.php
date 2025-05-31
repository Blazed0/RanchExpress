<?php

include '../../Modelo/conn.php';
include '../inicio_sesion/sesiones.php';
include '../inicio_sesion/cerrar_sesion.php';


<<<<<<< HEAD

=======
>>>>>>> 5c0306bf5443da2d237602eb785568085674806a
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
<<<<<<< HEAD
$madre              = $_POST['idMadre'];
$padre           = $_POST['idPadre'];



=======
>>>>>>> 5c0306bf5443da2d237602eb785568085674806a


$stmt = $conn->prepare("INSERT INTO crias (
    fecha_nacidos, sexo, codigo_cria, 
<<<<<<< HEAD
    raza,observaciones, peso_nacimiento,nombre_cria,especie_cria, imagen_cria,id_madre,id_padre
) VALUES (?, ?, ?, ?, ?, ?, ?,?,?,?,?)");

$stmt->bind_param("sssssisssii", 
=======
    raza,observaciones, peso_nacimiento,nombre_cria,especie_cria, imagen_cria
) VALUES (?, ?, ?, ?, ?, ?, ?,?,?)");

$stmt->bind_param("sssssisss", 
>>>>>>> 5c0306bf5443da2d237602eb785568085674806a
    $fecha_nacimiento, 
    $sexo, 
    $codigo_cria, 
    $raza, 
    $observaciones,
    $peso_nacimiento, 
    $nombre,
    $especie,
<<<<<<< HEAD
    $imagen_cria,
    $madre,
    $padre
=======
    $imagen_cria
>>>>>>> 5c0306bf5443da2d237602eb785568085674806a

    
);


if ($stmt->execute()) {
    $session['alert'] = alerta("La cria ha sido registrada  con exito");
    header('Location: ../../Vista/registro_crias.php');
} else {
    $_SESSION['alert'] = alerta("Hubo un, error vuelve a intentarlo");
    header('Location: ../../Vista/registro_cria.php');
    exit();
}


<<<<<<< HEAD

=======
>>>>>>> 5c0306bf5443da2d237602eb785568085674806a
$stmt->close();
$conn->close();
?>
