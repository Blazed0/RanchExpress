<?php

include '../../Modelo/conn.php';
include '../inicio_sesion/sesiones.php';
include '../inicio_sesion/alertas.php';

    
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $fecha = $_POST['fecha_pesaje'];
    $peso = $_POST['peso_animal'];
    $codigo = $_POST['codigo_animal'];
    $observaciones = trim($_POST['observaciones']);

    $camposObligatorios = [$fecha,$peso,$codigo,$observaciones];

    foreach($camposObligatorios as $obligatorio){
        if(empty($obligatorio)){
            $_SESSION['alert'] = alerta("No se pueden enviar campos vacios");
            header('Location:../../Vista/formulario_peso.php?token='.base64_encode($codigoAnimal));
            exit;
        }
    }

    // Buscar ID del animal o cría
    $query = "SELECT id_animal FROM animal WHERE codigo_animal = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $codigo);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        $id_animal = $row['id_animal'];
        $insert = "INSERT INTO peso (fecha_pesaje, peso, observaciones, id_animal)
                       VALUES (?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($insert);
        $stmt_insert->bind_param("sdsi", $fecha, $peso, $observaciones, $id_animal);
        
        if ($stmt_insert->execute()) {
            header("Location: ../../Vista/tabla.php?token=".base64_encode($id_animal)."");
            exit();
        }else{
            $_SESSION['alert'] = alerta("Error al ingresar al animal");
            header('Location: ../../Vista/formulario_peso.php?token='.base64_encode($codigoAnimal));
            exit();
        }
        
    } 
    else {
        echo " No se encontró un animal/cría con ese código.";
    }
    
    $stmt_insert->close();
    $stmt->close();
    $conn->close();
}
?>
