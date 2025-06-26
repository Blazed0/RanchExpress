<?php 
$token = $_GET['token'];
$id = base64_decode($token);

$sqlProduccion = "SELECT * FROM leche WHERE id_animal = ?";
$stmt = $conn->prepare($sqlProduccion);
$stmt->bind_param("i", $id);
if($stmt->execute()){
    $result = $stmt->get_result();
    $produccionArray =[];
    if($result->num_rows>0){
        while($produccion = $result->fetch_assoc()){
        $fechaProduccion = $produccion['fecha_produccion'];
        $litrosProducidos = $produccion['litros_producidos'];
        $produccionArray[$fechaProduccion] = $litrosProducidos;
        }
        $produccionJSON = json_encode($produccionArray);
    }
}

?>