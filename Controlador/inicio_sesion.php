<?php
session_start();
include '../Modelo/conn.php';
#MAÑANA REVISO A PURA PUTA PROFUNDIDAD ESTE CODIGO A VER QUE ES LO QUE ARREGLO ESE ERROR

$usuario = $_POST['numeroDNI'];
$clave = $_POST['clave'];
$rol = $_POST['rol'];

$columns = ['id_usuario','nit','nombre', 'correo', 'clave', 'rol'];
$table = "usuario";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($_POST['numeroDNI']) || empty($_POST['clave'])) {
        echo "Los campos no pueden estar vacios";
    } else {
        // Usar consultas preparadas para evitar inyecciones SQL
        $stmt = "SELECT ". implode(",",$columns).
        " FROM ". $table ." WHERE ".$columns[1]. "= ? AND ". $columns[4]. "= ? AND ".$columns[5]." = ?";

        $result = $conn->prepare($stmt);
        $result->bind_param("iss", $usuario, $clave,$rol);

        $result->execute();
        $result = $result->get_result();

        if ($datos = $result->fetch_object()) {
            header("Location: ../../pagina1/index.html");
            exit();
        } else {
            echo "El usuario no existe o ingresó datos erróneos";
        }
        $result->close();
    }
}
?>
