<?php
// Inicia o reanuda la sesión
session_start();

// Incluye el archivo de configuración de la base de datos
require_once '../config/db.php';

// Verifica si el usuario está logueado y tiene rol 1 (estudiante)
if (!isset($_SESSION['id']) || $_SESSION['rol'] != 1) {
    // Redirige al index si no cumple los requisitos
    header("Location: ../index.php");
    exit(); // Termina la ejecución del script
}

// Prepara y ejecuta consulta para obtener datos del usuario
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->execute([$_SESSION['id']]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC); // Obtiene los datos como array asociativo
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajustes | IFaz</title>
    <!-- Hojas de estilo -->
    <link rel="stylesheet" href="../css/estilo-ajustes.css"> <!-- Estilos específicos -->
    <!-- Font Awesome para íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Contenedor principal -->
    <div class="contenedor-ajustes">
        <!-- Tarjeta de ajustes -->
        <div class="tarjeta-ajustes">
            <!-- Título con ícono -->
            <h1 class="titulo-ajustes"><i class="fas fa-user-cog"></i> Ajustes de Cuenta</h1>
            
            <!-- Sección de datos del usuario -->
            <div class="seccion-datos">
                <h2><i class="fas fa-id-card"></i> Tus Datos</h2>
                <ul class="lista-datos">
                    <!-- Muestra cada dato del usuario con htmlspecialchars para seguridad -->
                    <li><strong>Nombre:</strong> <?= htmlspecialchars($usuario['nombre']) ?></li>
                    <li><strong>Apellido:</strong> <?= htmlspecialchars($usuario['apellido']) ?></li>
                    <li><strong>Cédula:</strong> <?= htmlspecialchars($usuario['ci']) ?></li>
                    <!-- Campos no editables -->
                    <li><strong>Año:</strong> <?= htmlspecialchars($usuario['anio']) ?> (No modificable)</li>
                    <li><strong>Mención:</strong> <?= htmlspecialchars($usuario['mencion']) ?> (No modificable)</li>
                </ul>
            </div>
            
            <!-- Sección para modificar datos -->
            <div class="seccion-modificar">
                <h2><i class="fas fa-edit"></i> Modificar Datos</h2>
                <!-- Formulario para actualizar datos -->
                <form action="procesar_modificar.php" method="post">
                    <!-- Grupo para nombre -->
                    <div class="grupo-formulario">
                        <label for="nombre"><i class="fas fa-signature"></i> Nombre:</label>
                        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>" required>
                    </div>
                    
                    <!-- Grupo para apellido -->
                    <div class="grupo-formulario">
                        <label for="apellido"><i class="fas fa-signature"></i> Apellido:</label>
                        <input type="text" id="apellido" name="apellido" value="<?= htmlspecialchars($usuario['apellido']) ?>" required>
                    </div>
                    
                    <!-- Grupo para año (no editable) -->
                    <div class="grupo-formulario">
                        <label for="anio"><i class="fas fa-calendar-alt"></i> Año:</label>
                        <div class="campo-con-candado">
                            <input type="text" id="anio" value="<?= htmlspecialchars($usuario['anio']) ?>" class="campo-deshabilitado" disabled>
                            <i class="fas fa-lock icono-candado"></i> <!-- Ícono de candado -->
                        </div>
                    </div>
                    
                    <!-- Grupo para mención (no editable) -->
                    <div class="grupo-formulario">
                        <label for="mencion"><i class="fas fa-book"></i> Mención:</label>
                        <div class="campo-con-candado">
                            <input type="text" id="mencion" value="<?= htmlspecialchars($usuario['mencion']) ?>" class="campo-deshabilitado" disabled>
                            <i class="fas fa-lock icono-candado"></i> <!-- Ícono de candado -->
                        </div>
                    </div>
                    
                    <!-- Grupo para contraseña (opcional) -->
                    <div class="grupo-formulario">
                        <label for="contrasena"><i class="fas fa-lock"></i> Nueva Contraseña:</label>
                        <input type="password" id="contrasena" name="contrasena" placeholder="Dejar vacío para no cambiar">
                    </div>
                    
                    <!-- Botón de enviar -->
                    <button type="submit" class="boton-accion boton-primario boton-block">
                        <i class="fas fa-save"></i> Guardar Cambios
                    </button>
                </form>
            </div>
            
            <!-- Sección peligrosa (eliminar cuenta) -->
            <div class="seccion-peligro">
                <h2><i class="fas fa-exclamation-triangle"></i> ¿Deseas borrar tu cuenta?</h2>
                <p>Esta acción eliminará permanentemente tu cuenta y todos tus datos.</p>
                <!-- Botón con confirmación JavaScript -->
                <button onclick="confirmarEliminacion()" class="boton-accion boton-peligro boton-block">
                    <i class="fas fa-trash-alt"></i> Eliminar Cuenta
                </button>
            </div>
            
            <!-- Enlace para volver -->
            <a href="estudiante.php" class="boton-volver">
                <i class="fas fa-arrow-left"></i> Volver al Panel
            </a>
        </div>
    </div>

    <!-- Script para confirmar eliminación -->
    <script>
        function confirmarEliminacion() {
            // Muestra diálogo de confirmación
            if (confirm('¿Estás seguro de eliminar tu cuenta permanentemente?\nEsta acción no se puede deshacer.')) {
                // Redirige si confirma
                window.location.href = 'procesar_eliminar.php';
            }
        }
    </script>
</body>
</html>