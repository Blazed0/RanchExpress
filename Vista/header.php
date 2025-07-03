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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">


  <style>
#menuCard {
  position: absolute;
  top: 80px;
  left: 20px;
  z-index: 9999;
  width: 220px;
  background-color: #4e6821;
  background-image: linear-gradient(145deg, #6B8E23 0%, #3e5221 100%);
  border-radius: 10px;
  padding: 15px 0;
  display: none;
  flex-direction: column;
  gap: 10px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
  transition: all 0.3s ease;
}

#menuCard .separator {
  border-top: 1.5px solid #86a34c;
  margin: 5px 10px;
}

#menuCard .list {
  list-style-type: none;
  padding: 0 10px;
  margin: 0;
  display: flex;
  flex-direction: column;
  gap: 8px;
}

#menuCard .element {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 6px 7px;
  color: #d1e5b2;
  border-radius: 6px;
  cursor: pointer;
  transition: all 0.3s ease;
  text-decoration: none;
}

#menuCard .element svg {
  width: 20px;
  height: 20px;
  stroke: #cde49a;
  transition: all 0.3s ease;
}

#menuCard .element .label {
  font-weight: 600;
  text-decoration: none;
  color: inherit;
}

#menuCard .element:hover {
  background-color: #7ea93a;
  color: #ffffff;
  transform: translate(1px, -1px);
}

#menuCard .element:hover svg {
  stroke: #ffffff;
}

#menuCard .delete:hover {
  background-color: #9c3b3b;
}

#menuCard .element:active {
  transform: scale(0.98);
}

/* Estilo especial para última sección (por si la separas) */
#menuCard .list:last-child svg {
  stroke: #a1e878;
}

#menuCard .list:last-child .element {
  color: #a1e878;
}

#menuCard .list:last-child .element:hover {
  background-color: rgba(105, 175, 58, 0.2);
}



   /* Estilo input búsqueda personalizado */
    .input {
      border: none  !important;
      outline: none  !important;
      border-radius: 15px;
      padding: 1em;
      background-color: #ccc;
      box-shadow: inset 2px 5px 10px rgba(0, 0, 0, 0.3);
      transition: 300ms ease-in-out;
      width: 200px;
      font-size: 1rem;
      height: 32px; 
      margin-top: -1px;
    }

    .input:focus {
      background-color: white;
      transform: scale(1.05);
      box-shadow: 13px 13px 100px #969696, -13px -13px 100px #ffffff;
    }


    /*botonbuscar*/
 .booton{
 appearance: button;
 background-color:white;
 border: solid transparent;
 border-radius: 16px;
 border-width: 0 0 4px;
 box-sizing: border-box;
 color: black;
 cursor: pointer;
 display: inline-block;
 font-size: 12px;
 font-weight: 700;
 letter-spacing: .8px;
 line-height: 20px;
 margin: 0;
 outline: none;
 overflow: visible;
 padding: 5px 8px;
 text-align: center;
 text-transform: uppercase;
 touch-action: manipulation;
 transform: translateZ(0);
 transition: filter .2s;
 user-select: none;
 -webkit-user-select: none;
 vertical-align: middle;
 white-space: nowrap;
}

.booton:after {
 background-clip: padding-box;
 background-color:white;
 border: solid transparent;
 border-radius: 16px;
 border-width: 0 0 4px;
 bottom: -4px;
 content: "";
 left: 0;
 position: absolute;
 right: 0;
 top: 0;
 z-index: -1;

}

.booton:main, button:focus {
 user-select: auto;
}

.booton:hover:not(:disabled) {
 filter: brightness(1.1);
}

.booton:disabled {
 cursor: auto;
}

.booton:active:after {
 border-width: 0 0 0px;
}

.booton:active {
 padding-bottom: 10px;
}

.tilin {
  margin-left: 500px

}





    
</style>
</head>
<body>
  <!-- Barra de navegación -->
  <nav class="navbar navbar-expand-lg navbar-custom position-relative">
    <div class="container-fluid align-items-center">
      <div class="logo">
        <img
          src="../Media/icons/logo_pagina-removebg-preview.png"
          alt="Logo"
          id="logazo"
        />
      </div>

      <a href="index.php" class="navbar-brand d-flex align-items-center">
        <p class="navbar-brand">RanchExpress</p>
      </a>

      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbar"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-between" id="navbar">
        <ul class="navbar-nav flex-row gap-4 justify-content-center">
          <li class="nav-item">
            <a class="nav-link   tilin" href="especies.php"><strong>Animales</strong></a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="registro_animal.php">Registro de animales</a>
          </li>
        </ul>

        <form class="d-flex search-form" id = "form" role="search" method="GET" action="hoja_animales.php">
          <input type="text" id="originalToken" class="input me-2" placeholder="Buscar" required/>
          <input type="hidden" name="token" id= "token"/>
          <button class="booton" type = "submit">
            Buscar
          </button>
        </form>
        <script>
          form.addEventListener('submit', function(event){
            const originalToken = document.getElementById('originalToken');
            const originalTokenValue = originalToken.value;
            const token64 = btoa(originalTokenValue);
            const tokenHidden = document.getElementById('token');
            tokenHidden.value = token64;
          })
        </script>
      </div>
    </div>
  </nav>

  <!-- Menú flotante  -->
  <div class="card" id="menuCard">
    <ul class="list">
      <li class="element">
      <a href="perfil_usuario.php" class="label" role = "button">
      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="none" stroke="#7e8590" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M18 21a8 8 0 0 0-16 0"/> <circle cx="10" cy="8" r="5"/>
        </svg>
        Perfil</a>
      </li>
      <?php if ($_SESSION['rol'] == 'Encargado De Area'){
        echo '<li class="element">
        <a href="panel_administrador.php" class="label">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="none" stroke="#7e8590" stroke-width="2">
          <path d="M19 16v6"/>
          <path d="M22 19h-6"/>
          <circle cx="10" cy="8" r="5"/>
          <path d="M2 21a8 8 0 0 1 13.292-6"/>
        </svg>
          Panel de administracion</a>
      </li>';
      }
      ?>
      <div class="separator"></div>
      <li class="element delete">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="25"
          height="25"
          fill="none"
          stroke="#7e8590"
          stroke-width="2"
        >
          <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
          <polyline points="16 17 21 12 16 7" />
          <line x1="21" y1="12" x2="9" y2="12" />
        </svg>
        <a
          href="../Controlador/inicio_sesion/destruir_sesion.php"
          class="label"
          >Cerrar sesión</a
        >
      </li>
    </ul>
  </div>

  <script>
    const logo = document.getElementById("logazo");
    const menu = document.getElementById("menuCard");

    logo.addEventListener("click", () => {
      const visible = menu.style.display === "block";
      menu.style.display = visible ? "none" : "block";
    });

    document.addEventListener("click", function (e) {
      if (!menu.contains(e.target) && e.target !== logo) {
        menu.style.display = "none";
      }
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
