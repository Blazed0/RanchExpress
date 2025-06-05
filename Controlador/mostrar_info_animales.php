<?php
include '../Modelo/conn.php';
include 'inicio_sesion/cerrar_sesion.php';
$token = $_GET['token'];

$sqlDatosAnimal = "SELECT * FROM `animal` LEFT JOIN peso ON peso.id_animal = animal.id_animal LEFT JOIN tratamientos ON tratamientos.id_animal = animal.id_animal WHERE codigo_animal = '$token';";
$stmtAnimales = $conn->query($sqlDatosAnimal);
$resultados = $stmtAnimales->num_rows;

if($resultados && $resultados > 0){
    while($fila = $stmtAnimales-> fetch_assoc()){

        /* Informacion del ANIMAL unicamente */

        $imagen = $fila['imagen_animal'];

        $estado = $fila['estado'];
        $html = "";

        switch($estado){
            case 'activo':
                $html .=  '<div class="alert alert-success" role="alert">
                                Activo
                            </div>';
                            break;
            case 'vendido':
                $html .= '  <div class="alert alert-warning" role="alert">
                              Vendido
                            </div>';
                            break;
            case 'muerto':
                $html.= '   <div class="alert alert-danger" role="alert">
                                Fallecido
                            </div>';
                            break;
            default:
                $html .= '   <div class="alert alert-secondary" role="alert">
                                Hubo un error.
                                Revisa que esten bien ingresados los datos del animal
                            </div>';
                            break;
        }

        $codigo = $fila['codigo_animal'];
        $raza = $fila['raza'];
        $sexo = $fila['sexo'];
        $proposito = $fila['proposito'];



        $nombrePadre = "Luego hay que arreglar esto, no tenemos padres para los adultos";

        /* Informacion del PESO */
        $peso = $fila['peso'];
        $fechaPesaje = $fila['fecha_pesaje'];

        /* Informacion del estado de SALUD */
        $diagnostico = $fila['diagnostico'];
        $nombreTratamiento = $fila['nombre_tratamiento'];
        $fechaAplicacion = $fila['fecha_aplicacion'];
    }
}
else{
    $_SESSION['alert'] = alerta("Hubo un error al intentar ver el animal, si el problema persiste contacta con soporte");
    header('Location: ../Vista/index.php');
    exit;
}

?>