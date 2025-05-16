<?php

include '../Modelo/conn.php';


if($_SERVER['REQUEST_METHOD'] === "POST") {
 
    $vacuna = $_POST ["vacuna"];
    $dateVencimiento = $_POST ["date"];
    $purpose = $_POST ["purpose"];
    $fabricante = $_POST ["fabricante"];
    $date1 = $_POST ["date1"];


  


    
    $sql = "INSERT INTO vacuna ( fecha_caducidad, fecha_aplicacion, nombre_vacuna, proposito_vacuna,fabricante ) VALUES ( ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdsdss", $dateVencimiento, $date1, $vacuna, $purpose, $fabricante);


        if ($stmt->execute()) {
            echo "La vacuna ha sido registrada correctamente.";
        } else {
            echo "Error al registrar la vacuna.";
        }
        $stmt->close();
 

    $conn->close();
}
?>
