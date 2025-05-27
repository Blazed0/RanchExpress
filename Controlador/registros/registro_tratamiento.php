<?php

include '../../Modelo/conn.php';
include '../inicio_sesion/sesiones.php';
include '../inicio_sesion/cerrar_sesion.php';

$Fecha_Aplicacion     = $_POST['fecha_aplicacion'];
$Diagnostico = $_POST['diagnostico'];
$Nombre_Tratamiento  = $_POST['nombre_tramiento'];
$Observaciones     = $_POST['obsevaciones'];
$Realizador           = $_POST['realizador'];



$stmt = $conn->prepare("INSERT INTO tratamientos(fecha_aplicacion, diagnostico,nombre_tratamiento,observaciones,realizador) VALUES (?, ?, ?, ?, ?)");

$stmt->bind_param("sssss", 
    $Fecha_Aplicacion, 
    $Diagnostico, 
    $Nombre_Tratamiento, 
    $Observaciones, 
    $Realizador, 
   
);


if ($stmt->execute()) {
    $session['alert'] = alerta("El animal ha sido registrada  con exito");
    header('Location: ../../Vista/registro_tratamiento.php');
} else {
    $_SESSION['alert'] = alerta("Hubo un, error vuelve a intentarlo");
    header('Location: ../../Vista/registro_tratamiento.php');
    exit();
}

$stmt->close();
$conn->close();
?>


