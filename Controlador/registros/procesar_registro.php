<?php

include '../../Modelo/conn.php';
include '../inicio_sesion/sesiones.php';
include '../inicio_sesion/cerrar_sesion.php';


$idUsuario = $_SESSION['user'];

//Variables tomadas del formulario 
$estado            = $_POST['estado'];
$codigo_animal     = $_POST['codigo_animal'];
$fecha_ingreso     = $_POST['fecha_ingreso'];

$estado            = $_POST['estado'];
$codigo_animal     = $_POST['codigo_animal'];
$fecha_ingreso     = !empty($_POST['fecha_ingreso']) ? $_POST['fecha_ingreso'] : NULL;

$fecha_nacimiento  = $_POST['fecha_nacimiento'];
$proposito         = $_POST['proposito'];
$peso_nacimiento   = $_POST['peso_nacimiento'];
$especie            = $_POST['especie'];
$nombre            = $_POST['nombre'];
$raza              = $_POST['raza'];
$color             = $_POST['color'];
$sexo              = $_POST['sexo'];

$ingresadoPor  = $_SESSION['user'];

//Variables de tipo archivo tomadas del formulario manejadas por $_FILES
$imagen = $_FILES['imagen_animal'];


$nombreImagen = $imagen['name']; //Nombre del archivo
$tipoImagen = $imagen['type']; //Tipo de archivo
$nombreTemporal = $imagen['tmp_name']; //Aca se guarda temporalmente la imagen en lo que se define su destino final

$directorioImagen = "../../Media/Uploads/adultos/";
$archivoSubido = $directorioImagen. basename($nombreImagen);

$valoresPost = [
    $estado,
    $codigo_animal,
    $fecha_ingreso,
    $fecha_nacimiento,
    $proposito,
    $peso_nacimiento,
    $nombre,
    $especie,
    $raza,
    $color,
    $sexo,
    $nombreImagen,
    $ingresadoPor
];
foreach($valoresPost as $valores){
    if(is_null($valores)){
        $_SESSION['alert'] = alerta("No se permiten campos vacios, vuelve a intentarlo por favor");
        header('Location:../../Vista/registro_animal.php');
        exit();
    }
}

if(move_uploaded_file($nombreTemporal, $archivoSubido)){
    echo "<img src = '".$archivoSubido."'/>";
}
else{
    echo "Error";
}

// Columnas fijas si siempre se insertan todas
$columnas = "estado, codigo_animal, fecha_ingreso, fecha_nacimiento, proposito, peso_nacimiento, nombre, especie, raza, color, sexo, imagen_animal,id_usuario";
$camposBindeados = "?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?"; 
// Definimos que tipo de datos van a ser metidos por bind_param (siempre los mismos)
$tiposDatos = "sssssissssssi";


// Definimos la consulta SQL
$stmt = $conn->prepare("INSERT INTO animal (" . $columnas . ") VALUES (" . $camposBindeados . ")");

// Ahora usamos el spread operator para pasar los valores directamente por referencia
$stmt->bind_param($tiposDatos, ...$valoresPost);






$fileName = $_FILES['imagen_animal']['name'];
$imagen_animal = $fileName;


$stmt = $conn->prepare("INSERT INTO animal (estado,codigo_animal, fecha_ingreso, fecha_nacimiento,proposito,peso_nacimiento,nombre, especie, raza, color, sexo, imagen_animal) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?)");

$stmt->bind_param("sssssissssss", 
    $estado,
    $codigo_animal, 
    $fecha_ingreso, 
    $fecha_nacimiento, 
    $proposito,
    $peso_nacimiento, 
    $nombre,
    $especie, 
    $raza, 
    $color, 
    $sexo, 
    $imagen_animal
);

if ($stmt->execute()) {
    $session['alert'] = alerta("El animal ha sido registrada  con exito");
    header('Location: ../../Vista/registro_animal.php');
} else {
    $_SESSION['alert'] = alerta("Hubo un, error vuelve a intentarlo");
    header('Location: ../../Vista/registro_animal.php');
    exit();
}


$stmt->close();
$conn->close();
?>
