<?php
include '../Modelo/conn.php';

$token = $_GET['token'];
$id_animal = base64_decode($token);
$sql = "SELECT * FROM peso WHERE id_animal = ? ";
$stmtConsulta = $conn->prepare($sql);
$stmtConsulta->bind_param("i", $id_animal);
$stmtConsulta->execute();
$result = $stmtConsulta->get_result();


$html = '';
if($result && $result ->num_rows>0){
    while($filas = $result ->fetch_assoc()){
    $peso = $filas['peso'];
    $fecha = $filas['fecha_pesaje'];
    $observaciones = $filas['observaciones'];
    $html .= "
          <tr>
          <td>".$peso." KG</td>
          <td>". $fecha. "</td>
          <td>" .$observaciones."</td>
          </tr>";
    }
}
else{
    $html .= '<tr>
    <td colspan = 3 >Sin datos</td>
    </tr>';
}

?>