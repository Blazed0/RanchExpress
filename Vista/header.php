<?php
include '../Controlador/inicio_sesion/sesiones.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RanchExpress</title>
    <link rel="stylesheet" href="../public/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid align-items-center">
            <div class="logo">
                <li class="nav-item dropdown">
                        <img src="../Media/icons/logo_pagina-removebg-preview.png" class = "dropdown" role = "button" data-bs-toggle = "dropdown" alt="Logo" id="logazo">   
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item bg-success" href="perfil_usuario.php">Perfil</a></li>
                    <?php if($_SESSION['rol'] = 'Instructor'): ?>
                        <?php echo '<li><a class="dropdown-item bg-success" href="#">Opcion Agregar usuarios</a></li>' ?>
                        <li><a class="dropdown-item bg-primary" href="#">Opcion Eliminar usuarios</a></li>
                        <?php endif ?>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item bg-danger" href= "../Controlador/inicio_sesion/destruir_sesion.php">Cerrar Sesion</a></li>
                </ul>
                </li>
                </div>
            <a href="index.php" class ="navbar-brand d-flex align-items-center">
                <p class="navbar-brand">RanchExpress</p>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbar">
                <ul class="navbar-nav flex-row gap-4 justify-content-center">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="especies.html"><strong>Animales</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registro_animal.php">Registro de animales</a>
                    </li>
                    <?php if($_SESSION['rol']='Instructor'): ?>
                    <?php echo '<li class="nav-item">
                        <a class="nav-link" href="estadisticaovinos.html">Estadistica de Ovinos</a>
                    </li>
                    <li class="nav-item">
                        <a href="estadisticacaprinos.html" class="nav-link">Estadistica De Caprinos</a>
                    </li>';
                    endif;
                    ?>
                </ul>
                 <form class="d-flex search-form" role="search" method="GET" action="../Controlador/mostrar_info_animales.php">
                     <input class="form-control me-2" type="search" name="token" placeholder="Buscar" required>
                    <button class="btn btn-outline-custom btn-custom-outline" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>