<?php
include '../../Modelo/conn.php';
include '../inicio_sesion/alertas.php';
;

// Obtener los datos del formulario
$fecha_produccion = $_POST['fecha_produccion'];
$litros_producidos = $_POST['litros'];
$codigo_animal = $_POST['codigo_animal'];
$datosObligatorios = [$fecha_produccion,$litros_producidos,$codigo_animal];

// Validar que se enviaron los datos por POST
foreach($datosObligatorios as $obligatorio){
    if(empty($obligatorio)) {
        $_SESSION['alert'] = alerta("No se pueden enviar campos vacios");
        header('Location: ../../Vista/leche.php?token='. base64_encode($codigoAnimal) .'');
        exit();
    }
}

// Buscar el ID del animal
$sql_buscar = "SELECT id_animal FROM animal WHERE codigo_animal = ?";
$stmt_buscar = $conn->prepare($sql_buscar);
$stmt_buscar->bind_param("s", $codigo_animal);
$stmt_buscar->execute();
$result = $stmt_buscar->get_result();

if ($result->num_rows > 0) {
    $fila = $result->fetch_assoc();
    $id_animal = $fila['id_animal'];
    $stmt_buscar->close();
    
    // Insertar el registro de leche
    $insert = $conn->prepare("INSERT INTO leche (fecha_produccion, litros_producidos, id_animal) VALUES (?, ?, ?)");
    $insert->bind_param("sii", $fecha_produccion, $litros_producidos, $id_animal);
    
    if ($insert->execute()) {
        $_SESSION['alert']=alerta("Produccion Ingresada Correctamente");
        header('Location: ../../Vista/leche.php?token='.base64_encode($codigoAnimal).'');
        exit;
    } else {
        $_SESSION['alert']=alerta("Error al ingresar la produccion");
        header("Location: ../../Vista/leche.php?token=".base64_encode($codigoAnimal)."");
        exit;
}
}
else{
    $_SESSION['alert'] = alerta("Problema al ingresar la produccion, Verifique que este animal exista");
    header('Location:../../Vista/leche.php?token='.base64_encode($codigoAnimal).'');
    exit();
}



?>
