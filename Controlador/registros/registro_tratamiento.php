<?php

include '../../Modelo/conn.php';
include '../inicio_sesion/sesiones.php';
include '../inicio_sesion/alertas.php';

$Fecha_Aplicacion = $_POST['fecha_aplicacion'];
$token = $_POST['token'];
$Diagnostico = $_POST['diagnostico'];
$Nombre_Tratamiento  = $_POST['nombre_tramiento'];
$Observaciones = $_POST['obsevaciones'];
$Realizador = $_POST['realizador'];

$camposObligatorios = [$Fecha_Aplicacion,$token,$Diagnostico,$Nombre_Tratamiento,$Observaciones,$Realizador];

foreach($camposObligatorios as $Obligatorio){
    if(empty($Obligatorio)){
    $_SESSION['alert'] = alerta("No puedes enviar campos vacios");
    header('Location: ../../Vista/registro_tratamiento.php?token='.base64_encode($token).'');
    exit();
    }
}

$sqlTratamientos = "INSERT INTO tratamientos(fecha_aplicacion, diagnostico,nombre_tratamiento,observaciones,realizador,id_animal) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sqlTratamientos);

$stmt->bind_param("sssssi", 
    $Fecha_Aplicacion, 
    $Diagnostico, 
    $Nombre_Tratamiento, 
    $Observaciones, 
    $Realizador, 
    $token
);


if ($stmt->execute()) {
    $_SESSION['alert'] = alerta("El animal ha sido registrada  con exito");
    header('Location: ../../Vista/registro_tratamiento.php?token='.base64_encode($token).'');
    exit();
} else {
    $_SESSION['alert'] = alerta("Hubo un, error vuelve a intentarlo");
    header('Location: ../../Vista/tabla_tratamientos.php?token='.base64_encode($token).'');
    exit();
}

?>
