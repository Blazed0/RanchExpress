<?php
include '../Modelo/conn.php';

$token = $_GET['token'];
$tokenDesencriptado = base64_decode($token);
$sql = "SELECT * FROM tratamientos WHERE id_animal = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $tokenDesencriptado);
$stmt->execute();
$filasCoincidentes = $stmt->get_result();

$html = '';

if($filasCoincidentes && $filasCoincidentes->num_rows>0){
while($result = $filasCoincidentes->fetch_assoc()){
        $fechaAplicada = $result['fecha_aplicacion'];
        $diagnostico = $result['diagnostico'];
        $nombreTratamiento = $result['nombre_tratamiento'];
        $realizador = $result['realizador'];
        $observaciones = $result['observaciones'];
        $html.= "<tr>
        <td>".$nombreTratamiento."</td>
        <td>". $fechaAplicada. "</td>
        <td>" .$diagnostico."</td>
        <td>" .$observaciones."</td>
        <td>" .$realizador."</td>
        </tr>";
        }
    }
    else{
        $html .= "<tr>
        <td colspan = 5>No hay datos Disponibles</td>
        </tr>";
    }
?>