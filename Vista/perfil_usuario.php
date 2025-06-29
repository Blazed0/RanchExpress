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
   

    <style>
        body {
  background-color: #ffffc3;
  color: #2e4d1c;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.container {
  max-width: 600px;
  margin: 30px auto;
  background-color: #ffffff;
  border-radius: 20px;
  box-shadow: 10px 10px 30px #cbdac1, -10px -10px 30px #ffffff;
  overflow: hidden;
}

.header {
  background-color: #cde4b4;
  padding: 30px;
  text-align: center;
  border-bottom: 2px solid #b6d89f;
}

.profile-avatar {
  width: 90px;
  height: 90px;
  border-radius: 50%;
  background-color: #a0c679;
  margin: 0 auto 15px;
  border: 4px solid #7ba853;
}

.header h1 {
  color: #2e4d1c;
  font-size: 26px;
  font-weight: 700;
  margin-bottom: 10px;
}

.header p {
  color: #486f2d;
  font-size: 16px;
  margin: 0;
}

.profile-content {
  padding: 30px;
}

.field-group {
  margin-bottom: 20px;
  padding: 15px;
  background-color: #f4f8f0;
  border-left: 5px solid #a3cb70;
  border-radius: 10px;
  transition: box-shadow 0.3s ease;
}

.field-label {
  font-weight: 600;
  font-size: 14px;
  color: #3e5c23;
  margin-bottom: 5px;
  display: block;
}

.field-value {
  font-size: 17px;
  color: #2e4d1c;
  font-weight: 500;
}

.field-input {
  width: 100%;
  padding: 8px 12px;
  border: 1px solid #adcba2;
  border-radius: 6px;
  margin-top: 5px;
  font-size: 16px;
}

.update-section {
  background-color: #cde4b4;
  padding: 25px;
  text-align: center;
  border-top: 2px solid #b6d89f;
}

button.btn {
  border-radius: 25px;
  font-weight: 600;
  padding: 10px 25px;
  margin: 8px 5px;
  transition: all 0.3s ease;
}

button.btn-primary {
  background-color: #6b8e23;
  color: #fff;
  border: none;
}

button.btn-primary:hover {
  background-color: #7da939;
}

button.btn-success {
  background-color: #4c7c1a;
  color: #fff;
  border: none;
}

button.btn-success:hover {
  background-color: #5b9930;
}

button.btn-secondary {
  background-color: #a4b783;
  color: #fff;
  border: none;
}

button.btn-secondary:hover {
  background-color: #9bb07d;
}

.success-message {
  background-color: #d4edda;
  color: #155724;
  padding: 12px;
  border-radius: 6px;
  margin-bottom: 20px;
  border: 1px solid #c3e6cb;
  text-align: center;
}

.error-message {
  background-color: #f8d7da;
  color: #721c24;
  padding: 12px;
  border-radius: 6px;
  margin-bottom: 20px;
  border: 1px solid #f5c6cb;
  text-align: center;
}

.hidden {
  display: none;
}

/* Responsive */
@media (max-width: 768px) {
  .container {
    margin: 15px;
    border-radius: 15px;
  }

  .profile-content {
    padding: 20px;
  }

  .field-group {
    padding: 12px;
  }
}

    </style>
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
 
</body>
</html>