<?php
// Inicia o reanuda la sesión
session_start();

// Incluye el archivo de configuración de la base de datos
require_once '../config/db.php';

// Verifica si el usuario está logueado y tiene rol 2 (profesor)
if (!isset($_SESSION['id']) || $_SESSION['rol'] != 2) {
    header("Location: ../index.php");
    exit();
}

// Manejo de mensajes de retroalimentación
$mensaje = '';
$tipoMensaje = '';

if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 'no_encontrado':
            $mensaje = 'No se pudo encontrar tu cuenta para eliminar.';
            $tipoMensaje = 'error';
            break;
        case 'bd':
            $mensaje = 'Error al procesar la solicitud. Por favor, inténtalo nuevamente.';
            $tipoMensaje = 'error';
            break;
        case 'modificacion':
            $mensaje = 'Error al actualizar tus datos. Verifica la información.';
            $tipoMensaje = 'error';
            break;
    }
}

if (isset($_GET['exito'])) {
    $mensaje = 'Tus datos se actualizaron correctamente.';
    $tipoMensaje = 'exito';
}

// Obtiene datos del profesor
try {
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt->execute([$_SESSION['id']]);
    $profesor = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$profesor) {
        header("Location: ../index.php");
        exit();
    }
} catch (PDOException $e) {
    error_log("Error al obtener datos del profesor: " . $e->getMessage());
    $mensaje = 'Error al cargar tus datos. Por favor, recarga la página.';
    $tipoMensaje = 'error';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajustes del Profesor | IFaz</title>
    <link rel="stylesheet" href="../css/estilo-ajustes.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Estilos para mensajes de retroalimentación */
        .mensaje-error {
            background-color: #ffebee;
            border-left: 4px solid #f44336;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            color: #d32f2f;
        }
        .mensaje-exito {
            background-color: #e8f5e9;
            border-left: 4px solid #4caf50;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            color: #2e7d32;
        }
        
        /* Estilo específico para campo de años de experiencia */
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
    <div class="contenedor-ajustes">
        <div class="tarjeta-ajustes">
            <!-- Mensajes de retroalimentación -->
            <?php if (!empty($mensaje)): ?>
                <div class="mensaje-<?= $tipoMensaje ?>">
                    <p><?= htmlspecialchars($mensaje) ?></p>
                </div>
            <?php endif; ?>
            
            <h1 class="titulo-ajustes"><i class="fas fa-chalkboard-teacher"></i> Ajustes del Profesor</h1>
            
            <!-- Sección de datos del profesor -->
            <div class="seccion-datos">
                <h2><i class="fas fa-id-card"></i> Tus Datos</h2>
                <ul class="lista-datos">
                    <li><strong>Nombre:</strong> <?= htmlspecialchars($profesor['nombre']) ?></li>
                    <li><strong>Apellido:</strong> <?= htmlspecialchars($profesor['apellido']) ?></li>
                    <li><strong>Cédula:</strong> <?= htmlspecialchars($profesor['ci']) ?></li>
                    <li><strong>Materia:</strong> <?= htmlspecialchars($profesor['mencion']) ?></li>
                    <li><strong>Años de Experiencia:</strong> <?= htmlspecialchars($profesor['anio']) ?></li>
                </ul>
            </div>
            
            <!-- Sección para modificar datos -->
            <div class="seccion-modificar">
                <h2><i class="fas fa-edit"></i> Modificar Datos</h2>
                <form action="procesar_modificar_profesor.php" method="post">
                    <div class="grupo-formulario">
                        <label for="nombre"><i class="fas fa-signature"></i> Nombre:</label>
                        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($profesor['nombre']) ?>" required>
                    </div>
                    <div class="grupo-formulario">
                        <label for="apellido"><i class="fas fa-signature"></i> Apellido:</label>
                        <input type="text" id="apellido" name="apellido" value="<?= htmlspecialchars($profesor['apellido']) ?>" required>
                    </div>
                    <div class="grupo-formulario">
                        <label for="materia"><i class="fas fa-book-open"></i> Materia:</label>
                        <input type="text" id="materia" name="materia" value="<?= htmlspecialchars($profesor['mencion']) ?>" required>
                    </div>
                    <div class="grupo-formulario">
                        <label for="experiencia"><i class="fas fa-briefcase"></i> Años de Experiencia:</label>
                        <div class="experiencia-input">
                            <input type="number" id="experiencia" name="experiencia" 
                                   value="<?= htmlspecialchars($profesor['anio']) ?>" 
                                   min="1" max="50" required>
                            <span>años</span>
                        </div>
                    </div>
                    <div class="grupo-formulario">
                        <label for="contrasena"><i class="fas fa-lock"></i> Nueva Contraseña:</label>
                        <input type="password" id="contrasena" name="contrasena" placeholder="Dejar vacío para no cambiar">
                    </div>
                    <button type="submit" class="boton-accion boton-primario boton-block">
                        <i class="fas fa-save"></i> Guardar Cambios
                    </button>
                </form>
            </div>
            
            <!-- Sección peligrosa (eliminar cuenta) -->
            <div class="seccion-peligro">
                <h2><i class="fas fa-exclamation-triangle"></i> ¿Deseas borrar tu cuenta?</h2>
                <p>Esta acción eliminará permanentemente tu cuenta y todos tus datos.</p>
                <button onclick="confirmarEliminacion()" class="boton-accion boton-peligro boton-block">
                    <i class="fas fa-trash-alt"></i> Eliminar Cuenta
                </button>
            </div>
            
            <a href="profesor.php" class="boton-volver">
                <i class="fas fa-arrow-left"></i> Volver al Panel
            </a>
        </div>
    </div>

    <script>
        function confirmarEliminacion() {
            if (confirm('¿Estás seguro de eliminar tu cuenta permanentemente?\nEsta acción no se puede deshacer.')) {
                // Agrega token CSRF para mayor seguridad
                window.location.href = 'procesar_eliminar_profesor.php?csrf=<?= hash('sha256', session_id()) ?>';
            }
        }
    </script>
</body>
</html>