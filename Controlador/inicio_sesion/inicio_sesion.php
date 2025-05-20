<?php
session_start();    
include '../../Modelo/conn.php';
include 'cerrar_sesion.php';

//Variables necesarias para la base de datos
$columns = ['id_usuario','nit','nombre', 'correo', 'clave', 'rol'];
$table = "usuario";

    //En caso de que el metodo no sea POST envia error para evitar ataques 
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        $_SESSION['alert'] = alerta("Hubo un error en el metodo");
        header('Location:../../Vista/iniciar_sesion.php');
        exit();
    }


//Variables del formulario HTML
$usuario = $_POST['numeroDNI'];
$clavePlana = $_POST['clave'];
$rol = $_POST['rol'];


    //Si se envian campos vacios devuelve un error y redirige
    if (empty($_POST['numeroDNI']) && empty($_POST['clave'])) {
            $_SESSION['alert'] = alerta("No puedes dejar los campos vacios");
            header("Location:../../Vista/iniciar_sesion.php");
            exit();
        }

    // Usar consultas preparadas para evitar inyecciones SQL
        $stmt = "SELECT ". 
            implode(",",$columns).
            " FROM ". $table ." WHERE "
            .$columns[1]. "= ? AND ".$columns[5]." = ?";
            
            $result = $conn->prepare($stmt);
            $result->bind_param("is", $usuario,$rol);
            
            $result->execute();
            $filas = $result->get_result();
            $datos = $filas->fetch_assoc();
            $nombre = $datos['nombre'];
            $claveHash = $datos['clave']; 
            //El problema estoy casi seguro que esta en el encriptado, tengo que revisar detenidamente la salida de los datos que da y el como tienen que cuadrar con la base de datos
            //El problema se centra principalmente en la encriptacion. No se que sucee pero basicamente el hash es distinto 


            //Si no encuentra datos relacionados a la consulta suelta un error
            if(!$datos){
                $_SESSION['alert'] = alerta("Usuario no encontrado, Verifica los datos y vuelve a intentarlo");
                header("Location:../../Vista/iniciar_sesion.php");
                exit();
            }
 
            if(password_verify($clavePlana,$claveHash)){
                $_SESSION['user'] = $nombre;
                header('Location: ../../Vista/index.php');
            }
            else{
                $_SESSION['alert'] = alerta("Credenciales incorrectas, verifica y vuelve a intentarlo");
                header("Location:../../Vista/iniciar_sesion.php");
                exit();
            }
            $result->close();
        if(isset($sesionCerrada) && $sesionCerrada){
            $_SESSION['alert'] = alerta("Inicia sesion nuevamente para volver a entrar");
            header("Location:../../Vista/iniciar_sesion.php");
            exit();
        }
    ?>
