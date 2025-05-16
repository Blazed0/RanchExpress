<?php
session_start();    
include '../Modelo/conn.php';
include 'cerrar_sesion.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP; 

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$usuario = $_GET['nombre'];
$DNI = $_GET['numeroDNI'];
$rol = $_GET['rol'];

    if (!empty($DNI) && !empty($usuario)) {
        // Usar consultas preparadas para evitar inyecciones SQL
        $sqlRecuperar = "SELECT id_usuario, correo FROM usuario WHERE nit = ? AND nombre = ? AND rol = ?";
        $stmt = $conn->prepare($sqlRecuperar);
        $stmt->bind_param("iss", $DNI, $usuario, $rol);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $correo);
        echo $sqlRecuperar;
        if($stmt->num_rows>0){
            
            //Import PHPMailer classes into the global namespace
            //These must be at the top of your script, not inside a function
            
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);
            
            $clave = 'SENAcorreoPrueba';
            $correoMensajero = "kyish921@gmail.com";
            try {
                //Server settings 
                $mail->SMTPDebug = SMTP::DEBUG_CONNECTION;
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = $correo;                     //SMTP username
                $mail->Password   = $clave;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                                 //SMTP password
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
                //Recipients
                $mail->setFrom($correoMensajero, 'Mailer');
                //Creo que el problema se encuentra en que no esta agarrando correctamente el correo o quiza sea que no es uno valido bajo modalidad PHPMAILER. Mañana reviso
                $mail->addAddress($correo, $usuario);     //Add a recipient
                
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Recuperacion de contraseña';
                $mail->Body    = 'Si sirvio el envio de correos';
                $mail->AltBody = 'Hola tilin, no se esto pa que sirva';
                
                $mail->send();
    echo "Esto sirvio";
    $_SESSION['alert'] = alerta("Por favor revisa tu correo para seguir el proceso");
} catch (Exception $e) {
    $_SESSION['alert'] = alerta("Error al enviar correo");
}
}
else{
    $_SESSION['alert'] = alerta("Usuario no encontrado, por favor verifica y vuelte a intentar");
    #   header("Location:../Vista/recuperar_contraseña.php");
    echo "Esto no sirvio";
    
}
}
else{
    $_SESSION['alert'] = alerta("No puedes enviar campos vacios");
    #header("Location:../Vista/recuperar_contraseña.php");
    echo "Esto tampoco sirvio";
}
?>