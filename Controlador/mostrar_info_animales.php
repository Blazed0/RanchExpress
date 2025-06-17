<?php
include '../Modelo/conn.php';
include 'inicio_sesion/alertas.php';
$token = $_GET['token'];
if(!isset($token) || is_null($token)){
    header('Location: ../Vista/index.php');
    exit;
}

//Consulta SQL para recoger todos los datos. Tiene galleta esto
$sqlDatosAnimal = "SELECT
/* Agarramos toda la informacion NECESARIA, por eso se especifica cada campo. Ya que si agarraramos todo estariamos trayendo informacion no tan necesaria para la hoja del animal */
            a.id_animal,
            a.codigo_animal,
            a.raza,
            a.sexo,
            a.proposito,
            a.estado,
            a.imagen_animal,
            a.id_padre,
            a.id_madre,

/* En esta parte al tener una tabla Recursiva (Osea que se relaciona consigo misma) Tenemos problema porque es imposible agarrar el codigo de animales sin otra consulta
A no ser por los apodos. Con AS podemos darle otro nombre temporal a ese campo durante la consulta para poder usarlo normalmente sin importar que sean el mismo registro */
            padre.codigo_animal AS codigo_padre,
            madre.codigo_animal AS codigo_madre,
            padre.raza AS raza_padre,
            madre.raza AS raza_madre,
            p.peso,
            p.fecha_pesaje,
            t.diagnostico,
            t.nombre_tratamiento,
            t.fecha_aplicacion
        FROM
        /* Aca tambien tenemos otro sobrenombre 'a' y es que si se fija todos los campos tienen unicamente la inicial del nombre de su respectiva tabla.
        Esto es porque en la consulta podemos darle un sobrenombre a la tabla para que sea mas sencillo de redactar */
            animal a

            /* Aca empezamos los JOIN para poder hacer efectiva la recursividad del programa y agarrar registros de nuestra propia tabla.
            Por esto es importante el apodo
            ¿Si notan que en el inicio del JOIN le da un apodo a cada tabla? ya sea 'madre' o 'padre' pues ahi es donde se centra el truco, haciendo esto podemos fingir tener 3 tablas distintas
            A pesar de que estan en la misma, pero el sistema lo toma como que estamos con tablas diferentes y finge de tal manera que podemos interactuar con padres como si fuera otra tabla*/
        LEFT JOIN
            animal padre ON a.id_padre = padre.id_animal
        LEFT JOIN
            animal madre ON a.id_madre = madre.id_animal
        LEFT JOIN
            peso p ON a.id_animal = p.id_animal
        LEFT JOIN
            tratamientos t ON a.id_animal = t.id_animal
        WHERE
            a.codigo_animal = ?;";

            $stmtAnimales = $conn->prepare($sqlDatosAnimal);
            $stmtAnimales -> bind_param("s", $token);
            $stmtAnimales ->execute();
            $resultados = $stmtAnimales->get_result();
if($resultados->num_rows > 0){
        $fila = $resultados-> fetch_assoc();

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
        $id_animal = $fila['id_animal'];
    
        //Datos de los PADRES
        $nombrePadre = $fila['codigo_padre'] ?? "Sin Padres";
        $nombreMadre = $fila['codigo_madre'] ?? "Sin padres";
        $padreRaza = $fila['raza_padre'] ?? "Sin datos";
        $madreRaza = $fila['raza_madre'] ?? "Sin datos";



        /* Informacion del PESO */
        $peso = $fila['peso'];
        $fechaPesaje = $fila['fecha_pesaje'];

        /* Informacion del estado de SALUD */
        $diagnostico = $fila['diagnostico'];
        $nombreTratamiento = $fila['nombre_tratamiento'];
        $fechaAplicacion = $fila['fecha_aplicacion'];
    }
else{
    $_SESSION['alert'] = alerta("Hubo un error al intentar ver el animal, si el problema persiste contacta con soporte");
    header('Location: ../Vista/index.php');
    exit;
}

?>