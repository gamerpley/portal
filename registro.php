<!DOCTYPE html>
<!-- Declaración del tipo de documento HTML5 -->
<html lang="es">
<!-- Define el idioma principal del documento como español -->
<head>
    <!-- Sección de metadatos y recursos externos -->
    <meta charset="UTF-8">
    <!-- Especifica la codificación de caracteres como UTF-8 para soportar caracteres especiales -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Configuración para diseño responsive (adaptable a dispositivos móviles) -->
    <title>Registro de Estudiante</title>
    <!-- Título que aparece en la pestaña del navegador -->
    
    <!-- Recursos externos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Importa Font Awesome para usar iconos -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Enlaza la hoja de estilos CSS local -->
</head>

<body>
    <!-- Contenedor principal del formulario de registro -->
    <div class="login-container">
        <!-- Encabezado del formulario -->
        <div class="login-header">
           <img src="ifaz/includes/logo.png" alt="Logo E.T. José Ricardo Guillén" class="logo">
            <!-- Muestra el logo institucional con texto alternativo -->
            <h1>Registro de Estudiante</h1>
            <!-- Título principal del formulario -->
        </div>
        
        <!-- Formulario de registro que envía datos a procesar_registro.php -->
        <form id="registroForm" action="procesar_registro.php" method="POST">
            <!-- Campo oculto que asigna automáticamente el rol 1 (estudiante) -->
            <input type="hidden" name="rol" value="1">
            
            <!-- Grupo de entrada para el nombre -->
            <div class="input-group">
                <label for="nombre"><i class="fas fa-user"></i> Nombre:</label>
                <!-- Etiqueta con icono de Font Awesome -->
                <input type="text" id="nombre" name="nombre" placeholder="---" required>
                <!-- Campo de texto obligatorio para el nombre -->
            </div>
            
            <!-- Grupo de entrada para el apellido -->
            <div class="input-group">
                <label for="apellido"><i class="fas fa-user"></i> Apellido:</label>
                <input type="text" id="apellido" name="apellido" placeholder="---" required>
            </div>
            
            <!-- Grupo de entrada para la cédula -->
            <div class="input-group">
                <label for="ci"><i class="fas fa-id-card"></i> Cédula:</label>
                <input type="text" id="ci" name="ci" placeholder="---" required>
            </div>
            
            <!-- Grupo de entrada para la contraseña -->
            <div class="input-group">
                <label for="contrasena"><i class="fas fa-lock"></i> Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" placeholder="Mínimo 6 caracteres" required>
                <!-- Campo de contraseña con texto de ayuda -->
            </div>
            
            <!-- Grupo de selección para el año académico -->
            <div class="input-group">
                <label for="anio"><i class="fas fa-calendar-alt"></i> Año:</label>
                <select id="anio" name="anio" required>
                    <option value="" disabled selected>Seleccione</option>
                    <!-- Opciones deshabilitada por defecto como placeholder -->
                    <option value="3ro">3er Año</option>
                    <option value="4to">4to Año</option>
                    <option value="5to">5to Año</option>
                </select>
            </div>
            
            <!-- Grupo de selección para la mención -->
            <div class="input-group">
                <label for="mencion"><i class="fas fa-graduation-cap"></i> Mención:</label>
                <select id="mencion" name="mencion" required>
                    <option value="" disabled selected>Seleccione</option>
                    <option value="Turismo">Turismo</option>
                    <option value="Contabilidad">Contabilidad</option>
                    <option value="Telemática">Telemática</option>
                    <option value="Administración">Administración</option>
                </select>
            </div>
            
            <!-- Botón para enviar el formulario -->
            <button type="submit" class="btn-login">Registrarse</button>
        </form>
        
        <!-- Pie de página con enlace al login -->
        <div class="login-footer">
            <a href="index.php" class="link">¿Ya tienes cuenta? Inicia sesión</a>
            <!-- Enlace que redirige a la página de inicio de sesión -->
        </div>
    </div>
</body>
</html>