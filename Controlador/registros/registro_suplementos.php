<?php

include '../Modelo/conn.php';


if($_SERVER['REQUEST_METHOD'] === "POST") {
 
    $suplemento = $_POST ["vacuna"];
    $dateVencimiento = $_POST ["date"];
    $purpose = $_POST ["purpose"];
    $fabricante = $_POST ["fabricante"];
    $date1 = $_POST ["date1"];


  


    
    $sql = "INSERT INTO suplementos ( nombre_suplemento, fabricante_suplemento, fecha_suministrada, objetivo_suplemento, fecha_caducidad ) VALUES ( ?, ?, ?, ?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdsdsss", $suplemento, $fabricante, $date1, $purpose, $dateVencimiento);


        if ($stmt->execute()) {
            echo "El suplemento ha sido registrado correctamente.";
        } else {
            echo "Error al registrar el suplemento.";
        }
        $stmt->close();
 

    $conn->close();
}
?>
