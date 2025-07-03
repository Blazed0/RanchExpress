<?php
include '../../Modelo/conn.php';
include '../inicio_sesion/alertas.php';

session_start();


// Validar que se envíen los campos necesarios
$kilos_producidos = floatval($_POST['kilos']);
$codigo_animal = $_POST['codigo_animal'];
$datosObligatorios = [$kilos_producidos, $codigo_animal];

foreach($datosObligatorios as $obligatorio){
    if(empty($obligatorio)){
        $_SESSION['alert'] = alerta("No puedes enviar campos vacios");
        header('Location: ../../Vista/lana.php?token='.base64_encode($codigo_animal).'');
        exit();
    }
}

// Buscar el ID del animal por su código
$sql_buscar = "SELECT id_animal FROM animal WHERE codigo_animal = ?";
$stmt_buscar = $conn->prepare($sql_buscar);
$stmt_buscar->bind_param("s", $codigo_animal);
$stmt_buscar->execute();
$result = $stmt_buscar->get_result();

if ($result->num_rows > 0) {
    
    $fila = $result->fetch_assoc();
    $id_animal = $fila['id_animal'];
    $stmt_buscar->close();
    
    // Calcular la producción total hasta ahora
    $sql_suma = "SELECT SUM(kilos_producidos) AS total FROM lana WHERE id_animal = ?";
    $stmt_suma = $conn->prepare($sql_suma);
    $stmt_suma->bind_param("i", $id_animal);
    $stmt_suma->execute();
    $res_suma = $stmt_suma->get_result();

    $produccion_total = 0;
        if ($row = $res_suma->fetch_assoc()) {
            $produccion_total = floatval($row['total']);
        }
// Calcular nueva producción anual
        $nueva_produccion = $produccion_total + $kilos_producidos;

// Insertar el nuevo registro
        $año_produccion = date("Y");

        $sql_insert = "INSERT INTO lana (kilos_producidos, produccion_anual,año_produccion, id_animal) VALUES (?, ?, ?,?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("ddii", $kilos_producidos, $nueva_produccion,$año_produccion, $id_animal);

if ($stmt_insert->execute()) {
    $_SESSION['alert']=alerta("Produccion ingresado correctamente");
    header("Location: ../../Vista/lana.php?token=".base64_encode($codigo_animal)."");
    exit;
} else {
    $_SESSION['alert']=alerta("Hubo un error al ingresar la produccion, intenta de nuevo");
    header("Location: ../../Vista/lana.php?token=".base64_encode($codigo_animal)."");
    exit;
}
}
else{
    $_SESSION['alert'] = alerta("Hubo un error al ingresar la produccion, verifica que si exista el animal");
    header("Location: ../../Vista/lana.php?token=".base64_encode($codigo_animal)."");
    exit();
}


?>