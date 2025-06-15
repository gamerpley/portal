<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Configuración básica del documento -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Profesor | Portal Educativo</title>
    
    <!-- Hojas de estilo -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/portal/css/style.css">
    
    <!-- Estilos CSS adicionales específicos para este formulario -->
    <style>
        /* Estilos para el campo de experiencia */
        .experiencia-input {
            display: flex;
            align-items: center;
        }
        .experiencia-input input {
            width: 80px;
            margin-right: 10px;
        }
        .experiencia-input span {
            color: var(--azul-rey);
            font-weight: 600;
        }
    </style>
</head>
<body>
    <!-- Contenedor principal del formulario -->
    <div class="login-container">
        <!-- Encabezado del formulario -->
        <div class="login-header">
            <h1><i class="fas fa-chalkboard-teacher"></i> Registro de Profesor</h1>
            <p>Complete sus datos para acceder al sistema</p>
        </div>
        
        <!-- Formulario de registro -->
       <form action="../procesar_registro_profesor.php" method="POST">
            <!-- Campo oculto para definir el rol 2 (profesor) -->
            <input type="hidden" name="rol" value="2">
            
            <!-- Grupo para nombre -->
            <div class="input-group">
                <label for="nombre"><i class="fas fa-user"></i> Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="---" required>
            </div>
            
            <!-- Grupo para apellido -->
            <div class="input-group">
                <label for="apellido"><i class="fas fa-user"></i> Apellido:</label>
                <input type="text" id="apellido" name="apellido" placeholder="---" required>
            </div>
            
            <!-- Grupo para cédula -->
            <div class="input-group">
                <label for="ci"><i class="fas fa-id-card"></i> Cédula:</label>
                <input type="text" id="ci" name="ci" placeholder="---" required>
            </div>
            
            <!-- Grupo para contraseña -->
            <div class="input-group">
                <label for="contrasena"><i class="fas fa-lock"></i> Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" placeholder="Mínimo 6 caracteres" required>
            </div>
            
            <!-- Grupo para años de experiencia (con estilo personalizado) -->
            <div class="input-group">
                <label for="anio"><i class="fas fa-briefcase"></i> Años de Experiencia:</label>
                <div class="experiencia-input">
                    <input type="number" id="anio" name="anio" min="1" max="50" 
                           placeholder="--" required>
                    <span>años</span>
                </div>
            </div>
            
            <!-- Grupo para materia impartida -->
            <div class="input-group">
                <label for="mencion"><i class="fas fa-book-open"></i> Materia Impartida:</label>
                <input type="text" id="mencion" name="mencion" 
                       placeholder="en caso de mas de una elegir principal" required
                       pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" title="Solo letras y espacios">
            </div>
            
            <!-- Botón de envío -->
            <button type="submit" class="btn-login">Registrarse</button>
        </form>
        
        <!-- Pie del formulario -->
        <div class="login-footer">
            <a href="index.php" class="link">¿Ya tienes cuenta? Inicia sesión</a>
        </div>
    </div>
</body>
</html>