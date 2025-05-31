<?php
//En caso de error quiten el 3307
$host = "localhost:3307";
$usuario = "root";
$password = "";
$database = "ranchexpress_v3";

$conn = new mysqli($host,$usuario,$password,$database);

try{
    if($conn){
        $success = "conexion exitosa";
    }
    else{
        throw new Exception("Error al conectar");
    }
}catch(Exception $e){
    echo $e->getMessage();
}


?>