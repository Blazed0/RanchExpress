<?php
    include 'cerrar_sesion.php';
    include '../../Modelo/conn.php';

    session_start();
    if($_SERVER['REQUEST_METHOD']!='POST'){
        $_SESSION['alert'] = alerta("Hubo un error, por favor vuelve a intentarlo");
        header('Location: ../../Vista/actualizar_contraseña.php');
        exit();
    }
    else{
        $token = $_POST['token'];
        $nuevaClave = $_POST['claveNueva'];
        $datos = explode(',', base64_decode($token));
        $email = $datos[0];
        $tiempo = $datos[1];
        
        if(time() - $tiempo > 3600){
            $_SESSION['alert'] = "Lo sentimos, el tiempo expiro. Por favor vuelve a intentarlo nuevamente";
            header('Location: ../../Vista/actualizar_contraseña.php');
            exit();
        }
        else{
            $nuevoHash = password_hash($nuevaClave, PASSWORD_DEFAULT);

            $sqlUpdatePass = "UPDATE usuario SET clave = ? WHERE correo = ?";
            $stmt = $conn->prepare($sqlUpdatePass);
            $stmt->bind_param("ss", $nuevoHash, $email);
            if($stmt->execute()){
                $_SESSION['alert'] = alerta("Contraseña Cambiada Exitosamente");
                header('Location:../../Vista/iniciar_sesion.php');
                exit();
            }
            else{
                $_SESSION['alert'] = alerta("Hubo un error, por favor vuelve a intentarlo");
                header('Location: ../../Vista/actualizar_contraseña.php');
                exit();
            }
        }
    } 
        ?>