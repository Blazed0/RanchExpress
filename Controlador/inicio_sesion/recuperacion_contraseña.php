<?php
session_start();    
include '../../Modelo/conn.php';
include 'alertas.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/Exception.php';
require '../PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP; 

try {
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $rol = $_GET['rol'];
    $DNI = $_GET['numeroDNI'];
    $usuario = $_GET['nombre'];
    if (!empty($DNI) && !empty($usuario)) {
        $sqlRecuperar = "SELECT * FROM usuario WHERE nit = ? AND nombre = ? AND rol = ?";
        $stmt = $conn->prepare($sqlRecuperar);
        $stmt->bind_param("iss", $DNI, $usuario, $rol);
        $stmt->execute();
        
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $correo = $row['correo'];

            $mail = new PHPMailer(true);
            $clave = 'fmpk nzxi ygwv bnll';
            $correoMensajero = "kyish921@gmail.com";

            // Config SMTP
            $mail->SMTPDebug = SMTP::DEBUG_OFF; 
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = $correoMensajero;
            $mail->Password   = $clave;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            // Recipients
            $mail->setFrom($correoMensajero, 'RanchExpress');
            $mail->addAddress($correo, $usuario);

            // Token
            $token = base64_encode($correo . ',' . time());
            $enlaceUrl = "http://localhost/Ranchexpress/Vista/actualizar_contraseña.php?token=" . $token;

            // Cuerpo HTML mejorado
            $boton = '<a href="' . $enlaceUrl . '" style="display: inline-block; padding: 12px 24px; background-color: #7ea93a; color: white; text-decoration: none; border-radius: 6px; font-weight: bold;">Cambiar contraseña</a>';

            $mail->isHTML(true);
            $mail->Subject = 'Recuperar la clave - RanchExpress';
            $mail->Body    = '
                <div style="font-family: Arial, sans-serif; text-align: center;">
                    <h2 style="color: #333;">Solicitud de cambio de contraseña</h2>
                    <p style="color: #555;">Hola ' . htmlspecialchars($usuario) . ',</p>
                    <p style="color: #555;">Hemos recibido una solicitud para restablecer tu contraseña. Si fuiste tú, haz clic en el siguiente botón:</p>
                    <p>' . $boton . '</p>
                    <p style="color: #777; margin-top: 20px; font-size: 0.9em;">Si no solicitaste este cambio, puedes ignorar este mensaje.</p>
                    <p style="color: #aaa; font-size: 0.8em;">© 2025 RanchExpress</p>
                </div>';
            $mail->AltBody = 'Hola ' . $usuario . ', Ingresa al siguiente enlace para cambiar tu contraseña: ' . $enlaceUrl;

            $mail->send();
            $_SESSION['alert'] = alerta("Por favor revisa tu correo para seguir el proceso");
            header('Location:../../Vista/recuperar_contraseña.php');
            exit();
        } else {
            $_SESSION['alert'] = alerta("Usuario no encontrado, por favor verifica y vuelve a intentar");
            header("Location:../../Vista/recuperar_contraseña.php");
            exit();
        }
    } else {
        $_SESSION['alert'] = alerta("No puedes enviar campos vacíos");
        header("Location:../../Vista/recuperar_contraseña.php");
        exit();
    }
}
} catch (Exception $e) {
    echo 'Excepción encontrada: ' . $e->getMessage();
}
?>
