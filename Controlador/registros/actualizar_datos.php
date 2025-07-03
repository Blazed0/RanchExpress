<?php
include '../../Modelo/conn.php';
include '../inicio_sesion/sesiones.php';
include '../inicio_sesion/alertas.php';


$codigoAnimalViejo = $_POST['codigo_Oculto'];
$codigoAnimalNuevo = $_POST['codigo_animal'];
$proposito     = $_POST['proposito'];
$edad          = $_POST['edad'];
$nombre        = $_POST['nombre'];
$estado        = $_POST['estado'];
$color         = $_POST['color'];


//Esto en caso de que se suba una imagen nueva
$imagen = $_FILES['imagen_animal'];
$nombreImagen = $imagen['name'];
$tmpImagen = $imagen['tmp_name'];


if(!empty($nombreImagen)){
    $direcciorio = "../../Media/Uploads/";
    $destino = $direcciorio. basename($nombreImagen);

    if(!move_uploaded_file($tmpImagen, $destino)){
        $_SESSION['alert'] = alerta("Error al subir la imagen");
        header("Location: ../../Vista/actualizar_animal.php?codigo=".base64_encode($codigoAnimalNuevo)."");
        exit();
    }

    $sql= "UPDATE animal SET codigo_animal = ?, estado=?, proposito=?, nombre=?, color=?,imagen_animal=?,etapa_edad=? WHERE codigo_animal = ?";
    $stmt = $conn->prepare($sql);
    $stmt-> bind_param("sssssss", $codigoAnimalNuevo, $estado,$proposito,$nombre,$color,$nombreImagen,$edad,$codigoAnimalViejo);
}else{
    // Si no sube imagen
    $sql = "UPDATE animal SET codigo_animal = ?, estado=?, proposito=?, nombre=?, color=?, etapa_edad=? WHERE codigo_animal=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $codigoAnimalNuevo,$estado, $proposito, $nombre, $color, $edad, $codigoAnimalViejo);
}


if($stmt->execute()){
        $_SESSION['alert'] = alerta("Animal Actualizado Correctamente");
        header("Location: ../../Vista/actualizar_animal.php?codigo=".base64_encode($codigoAnimalNuevo)."");
        exit();
} else {
        $_SESSION['alert'] = alerta("Error al actualizar el animal, intenta nuevamente y si persiste contacta con soporte");
        header("Location: ../../Vista/actualizar_animal.php?codigo=".base64_encode($codigoAnimalNuevo)."");
        exit();
}

 /* $stmt->close();
$conn->close(); */
