<?php
//En caso de error quiten el 3307
$host = "localhost:3307";
$usuario = "root";
$password = "";
<<<<<<< HEAD
$database = "ranchexpress_v3";
=======
$database = "ranchexpress v3";
>>>>>>> 5c0306bf5443da2d237602eb785568085674806a

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