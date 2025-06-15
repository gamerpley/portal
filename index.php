<!DOCTYPE html>
<!-- Define que el documento es HTML5 -->
<html lang="es">
<!-- Inicia el documento HTML con lenguaje español -->
<head>
    <!-- Metadatos y recursos externos -->
    <meta charset="UTF-8">
    <!-- Codificación de caracteres UTF-8 para soportar caracteres especiales -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Configuración responsive para adaptarse a dispositivos móviles -->
    <title>Iniciar Sesión - Portal Educativo</title>
    <!-- Título de la pestaña del navegador -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Importa Font Awesome para íconos (ej: id-card, lock) -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Enlaza la hoja de estilos CSS local -->
</head>
<body>
    <!-- Contenedor principal del formulario de login -->
    <div class="login-container">
        <!-- Encabezado del login -->
        <div class="login-header">
            <img src="/portal/ifaz/includes/logo.png" alt="Logo Institucional" class="logo">
            <!-- Muestra el logo de la institución -->
            <h1>Iniciar Sesión</h1>
            <!-- Título del formulario -->
        </div>
        
        <!-- Formulario de inicio de sesión -->
        <form id="loginForm" action="procesar_login.php" method="POST">
            <!-- Grupo de entrada para la cédula -->
            <div class="input-group">
                <label for="ci"><i class="fas fa-id-card"></i> Cédula:</label>
                <!-- Ícono y etiqueta para el campo de cédula -->
                <input type="text" id="ci" name="ci" placeholder="---" required>
                <!-- Campo de texto obligatorio para ingresar la cédula -->
            </div>
            
            <!-- Grupo de entrada para la contraseña -->
            <div class="input-group">
                <label for="contrasena"><i class="fas fa-lock"></i> Contraseña:</label>
                <!-- Ícono y etiqueta para el campo de contraseña -->
                <input type="password" id="contrasena" name="contrasena" placeholder="******" required>
                <!-- Campo de contraseña obligatorio (el texto se oculta) -->
            </div>
            
            <!-- Botón para enviar el formulario -->
            <button type="submit" class="btn-login">Ingresar</button>
        </form>
        
        <!-- Pie de página del login -->
        <div class="login-footer">
            <a href="registro.php" class="link">¿No tienes cuenta? Regístrate</a>
            <!-- Enlace a la página de registro -->
        </div>
    </div>
</body>
</html>