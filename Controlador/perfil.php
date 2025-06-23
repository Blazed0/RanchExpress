<?php 
include '../Modelo/conn.php';

$usuario = $_SESSION['user'];

$sqlPerfil = "SELECT * FROM usuario WHERE id_usuario = ?";
$stmtPerfil = $conn->prepare($sqlPerfil);
$stmtPerfil->bind_param("i", $usuario);
$stmtPerfil->execute();
$resultadoPerfil = $stmtPerfil->get_result();
$perfil = $resultadoPerfil->fetch_assoc();

$nombre = $perfil['nombre'];
$email = $perfil['correo'];
$DNI = $perfil['nit'];
$rol = $perfil['rol'];
?>