<?php
//Esta linea lo que hace es inicializar la sesion en caso de que no haya ninguna, por el contrario si hay alguna solamente lo deja asi
//PHP_SESSION_NONE = No hay sesion activada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>