<?php

include '../../Modelo/conn.php';
include '../inicio_sesion/sesiones.php';
include '../inicio_sesion/alertas.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $codigoAnimal = $_GET['token'];
    $token = base64_decode($codigoAnimal);
    $fecha = $_POST['fecha_pesaje'];
    $tipo = $_POST['peso'];
    $peso = $_POST['peso_animal'];
    $codigo = $_POST['codigo_animal'];
    $observaciones = trim($_POST['observaciones']);

    // Buscar ID del animal o cría
    if ($tipo === "Adulto") {
        $query = "SELECT id_animal FROM animal WHERE codigo_animal = ?";
    } elseif ($tipo === "Cria") {
        $query = "SELECT id_animal FROM animal WHERE codigo_animal = ?";
    } else {
        echo " Tipo de animal no válido.";
        exit;
    }

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $codigo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $id_animal = $row['id_animal'];

        // Inserción en tabla de peso
        if ($tipo === "Adulto") {
            $insert = "INSERT INTO peso (fecha_pesaje, peso, observaciones, id_animal)
                       VALUES (?, ?, ?, ?)";
        } elseif ($tipo === "Cria") {
            $insert = "INSERT INTO peso (fecha_pesaje, peso, observaciones, id_animal)
                       VALUES (?, ?, ?, ?)";
        }

        $stmt_insert = $conn->prepare($insert);
        $stmt_insert->bind_param("sdsi", $fecha, $peso, $observaciones, $id_animal);

        if ($stmt_insert->execute()) {
            header("Location: ../../Vista/tabla.php?token=".$id_animal."");
            exit();
        } else {
            echo " Error al insertar los datos.";
        }

        $stmt_insert->close();
    } else {
        echo " No se encontró un animal/cría con ese código.";
    }

    $stmt->close();
    $conn->close();
}
?>
