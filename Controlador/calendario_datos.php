<?php 
include '../Modelo/conn.php';
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
/*         $fechaProduccion = $produccion['fecha_produccion'];
        $litrosProducidos = $produccion['litros_producidos']; */
        $produccionArray[$produccion['fecha_produccion']] = $produccion['litros_producidos'];
        }
        $produccionJSON = json_encode($produccionArray);

    }else{
                echo $id;
    }
}
else{
    echo "nada sirvio";
}

?>