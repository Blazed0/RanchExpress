<?php
include '../Modelo/conn.php';
include 'inicio_sesion/alertas.php';
$conn->begin_transaction();
$id = $_GET['token'];
$idUsuario = urldecode($id);
$sqlEliminar = "DELETE FROM usuario WHERE id_usuario = ?";
$stmtEliminar = $conn->prepare($sqlEliminar);
$stmtEliminar->bind_param("i", $idUsuario);
if($filasAfectadas = $stmtEliminar->affected_rows > 1){
$conn->rollback();
$_SESSION['alert'] = alerta("No Puedes eliminar mas de 1 usuario a la vez");
header('Location:../Vista/index.php');
exit();
}
else{
    if($stmtEliminar->execute()){
        $conn->commit();
        $_SESSION['alert'] = alerta("Usuario eliminado con exito");
        header('Location:../Vista/panel_administrador.php');
        exit();
    }
    else{
        $conn->rollback();
        $_SESSION['alert'] = alerta("Error al eliminar al usuario, vuelve a intentar");
        header('Location:../Vista/panel_administrador.php');
        exit();
    }
}
?>