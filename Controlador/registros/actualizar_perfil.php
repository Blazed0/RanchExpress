<?php 
session_start();
include '../../Modelo/conn.php';

header('Content-Type: application/json');

$datosJson = file_get_contents('php://input');
$datos = json_decode($datosJson,true );

$idUsuario = $_SESSION['user'];

if(!isset($datos['nombre'], $datos['identificacion'], $datos['email'])){
    echo json_encode(['success'=> false, 'message' => "No se pueden mandar campos vacios"]);
    exit();
}

$nombre = trim($datos['nombre']);
$identificacion = trim($datos['identificacion']);
$email = trim($datos['email']);

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    ECHO json_encode(['success'=> false, 'message' => "Ingresa un email valido"]);
    exit();
}

$actualizarSQL = "UPDATE usuario SET nombre = ?, nit = ?, correo = ? WHERE id_usuario = ?";
$actualizar = $conn->prepare($actualizarSQL);
$actualizar->bind_param("sisi", $nombre,$identificacion, $email, $idUsuario);

if($actualizar->execute()){
    if($actualizar->affected_rows>0){
        echo json_encode(['success' => true, 'message' => 'Perfil actualizado correctamente']);
    }
    else{
        echo json_encode(['success' => false, 'message' => 'Error al actualizar, verifica los datos y en caso de persistir el problema contacta con soporte']);
    }
}
else{
    echo json_encode(['success' => false, 'message' => 'Error al actualizar el usuario']);
}

$actualizar-> close();
$conn-> close();

exit();

?>