<?php
session_start();    
include '../../Modelo/conn.php';
include 'cerrar_sesion.php';

$usuario = $_POST['numeroDNI'];
$clave = $_POST['clave'];
$rol = $_POST['rol'];

$columns = ['id_usuario','nit','nombre', 'correo', 'clave', 'rol'];
$table = "usuario";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['numeroDNI']) && !empty($_POST['clave'])) {
 // Usar consultas preparadas para evitar inyecciones SQL
        $stmt = "SELECT ". implode(",",$columns).
        " FROM ". $table ." WHERE ".$columns[1]. "= ? AND ". $columns[4]. "= ? AND ".$columns[5]." = ?";

        $result = $conn->prepare($stmt);
        $result->bind_param("iss", $usuario, $clave,$rol);

        $result->execute();
        $filas = $result->get_result();

        if ($datos = $filas->fetch_object()) {
            $nombre = $datos->nombre;
            $_SESSION['user'] = $nombre;
            header('Location: ../../Vista/index.php');
        }
        else{
            $_SESSION['alert'] = alerta("Valida los datos nuevamente y vuelve a intentarlo por favor");
            header("Location:../../Vista/iniciar_sesion.php");
            exit();
        }
        $result->close();
        $conn->close();
        echo $rol, $clave ,$usuario;
    } 
    
    else {
        $_SESSION['alert'] = alerta("No puedes dejar los campos vacios");
        header("Location:../../Vista/iniciar_sesion.php");
            exit();
    }
        if(isset($sesionCerrada) && $sesionCerrada){
            $_SESSION['alert'] = alerta("Inicia sesion nuevamente para volver a entrar");
            header("Location:../../Vista/iniciar_sesion.php");
            exit();
        }
}
?>
