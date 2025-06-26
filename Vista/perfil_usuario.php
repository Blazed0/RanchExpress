<?php 
include 'header.php';
include '../Controlador/perfil.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de usuario</title>
    <link rel="stylesheet" href="../public/perfil_usuario.css">
</head>
</body>
</html>
<body>
    <div class="container">
        <div class="header">
            <img class="profile-avatar" src="../Media/icons/user_icon.png">

            </img>
            <h1>Perfil De usuario</h1>
            <p id="mode-text">Informacion Personal</p>
        </div>

        <div class="profile-content">
            <div id = "success-message" class="success-message hidden"></div>
            <div id = "error-message" class="error-message hidden"></div>
            <form action="" class="formularioPerfil" id ="formularioPerfil">
                <div class="field-group">
                    <label class="field-label">Nombre</label>
                    <div class="field-value" id = "nombre"><?php echo htmlspecialchars($nombre) ?></div>
                    <input type="text" class="field-input hidden" id="nombreInput" value="<?php echo htmlspecialchars($nombre) ?>" required>
                </div>
                
                <div class="field-group">
                    <label class="field-label">Identificación</label>
                    <div class="field-value" id = "identificacion"><?php echo htmlspecialchars($DNI) ?></div>
                    <input type="number" class="field-input hidden" id="identificacionInput" value="<?php echo htmlspecialchars($DNI) ?>" required>
                </div>
                
                <div class="field-group">
                    <label class="field-label">Rol</label>
                    <div class="field-value" id = "rol"><?php echo htmlspecialchars($rol) ?></div>
                </div>
                
                <div class="field-group">
                    <label class="field-label">Email</label>
                    <div class="field-value" id = "email"><?php echo htmlspecialchars($email) ?></div>
                    <input type="email" class="field-input hidden" id = "emailInput" value="<?php echo htmlspecialchars($email) ?>" required>
                </div>
            </form>
            </div>

            <div class="update-section">
            <div id="view-buttons">
                <button class="btn btn-primary" onclick="habilitarEditar()">Editar Perfil</button>
                <a href = "recuperar_contraseña.php" role = "button"  class="btn btn-secondary">Actualizar Contraseña</a>
            </div>
            <div id="edit-buttons" class="hidden">
                <button class="btn btn-success" onclick="guardarPerfil()">Guardar Cambios</button>
                <button class="btn btn-secondary" onclick="cancelarEditar()">Cancelar</button>
            </div>
        </div>
    </div>

    <script src = "../Controlador/registros/editar_perfil.js">
    </script>
    <?php
    include 'footer.html';
    ?>
</body>
</html>