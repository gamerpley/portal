<?php
// Inicia o reanuda la sesión
session_start();

// Incluye el archivo de configuración de la base de datos
require_once '../config/db.php';

// Verifica si el usuario está logueado y tiene rol 1 (estudiante)
if (!isset($_SESSION['id']) || $_SESSION['rol'] != 1) {
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
    }
}

// Obtiene datos del usuario
try {
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt->execute([$_SESSION['id']]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$usuario) {
        header("Location: ../index.php");
        exit();
    }
} catch (PDOException $e) {
    error_log("Error al obtener datos del usuario: " . $e->getMessage());
    $mensaje = 'Error al cargar tus datos. Por favor, recarga la página.';
    $tipoMensaje = 'error';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajustes | IFaz</title>
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
            
            <h1 class="titulo-ajustes"><i class="fas fa-user-cog"></i> Ajustes de Cuenta</h1>
            
            <!-- Sección de datos del usuario -->
            <div class="seccion-datos">
                <h2><i class="fas fa-id-card"></i> Tus Datos</h2>
                <ul class="lista-datos">
                    <li><strong>Nombre:</strong> <?= htmlspecialchars($usuario['nombre']) ?></li>
                    <li><strong>Apellido:</strong> <?= htmlspecialchars($usuario['apellido']) ?></li>
                    <li><strong>Cédula:</strong> <?= htmlspecialchars($usuario['ci']) ?></li>
                    <li><strong>Año:</strong> <?= htmlspecialchars($usuario['anio']) ?> (No modificable)</li>
                    <li><strong>Mención:</strong> <?= htmlspecialchars($usuario['mencion']) ?> (No modificable)</li>
                </ul>
            </div>
            
            <!-- Sección para modificar datos -->
            <div class="seccion-modificar">
                <h2><i class="fas fa-edit"></i> Modificar Datos</h2>
                <form action="procesar_modificar.php" method="post">
                    <div class="grupo-formulario">
                        <label for="nombre"><i class="fas fa-signature"></i> Nombre:</label>
                        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>" required>
                    </div>
                    <div class="grupo-formulario">
                        <label for="apellido"><i class="fas fa-signature"></i> Apellido:</label>
                        <input type="text" id="apellido" name="apellido" value="<?= htmlspecialchars($usuario['apellido']) ?>" required>
                    </div>
                    <div class="grupo-formulario">
                        <label for="anio"><i class="fas fa-calendar-alt"></i> Año:</label>
                        <div class="campo-con-candado">
                            <input type="text" id="anio" value="<?= htmlspecialchars($usuario['anio']) ?>" class="campo-deshabilitado" disabled>
                            <i class="fas fa-lock icono-candado"></i>
                        </div>
                    </div>
                    <div class="grupo-formulario">
                        <label for="mencion"><i class="fas fa-book"></i> Mención:</label>
                        <div class="campo-con-candado">
                            <input type="text" id="mencion" value="<?= htmlspecialchars($usuario['mencion']) ?>" class="campo-deshabilitado" disabled>
                            <i class="fas fa-lock icono-candado"></i>
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
            
            <a href="estudiante.php" class="boton-volver">
                <i class="fas fa-arrow-left"></i> Volver al Panel
            </a>
        </div>
    </div>

    <script>
        function confirmarEliminacion() {
            if (confirm('¿Estás seguro de eliminar tu cuenta permanentemente?\nEsta acción no se puede deshacer.')) {
                // Agrega token CSRF para mayor seguridad
                window.location.href = 'procesar_eliminar.php?csrf=<?= hash('sha256', session_id()) ?>';
            }
        }
    </script>
</body>
</html>