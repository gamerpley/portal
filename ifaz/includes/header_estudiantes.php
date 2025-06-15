<?php
// Verifica si la sesión no está activa y la inicia si es necesario
if (session_status() === PHP_SESSION_NONE) session_start();

// Verifica si el usuario no está logueado (no existe id en sesión)
if (!isset($_SESSION['id'])) {
    // Redirige a la página principal si no hay sesión activa
    header("Location: ../index.php");
    // Termina la ejecución del script
    exit();
}
?>

<!-- Header Lateral -->
<div class="header-lateral">
    <!-- Logo de la institución -->
    <img src="/portal/ifaz/includes/logo.png" alt="Logo E.T. José Ricardo Guillén" class="logo">
    
    <!-- Sección de información del usuario -->
    <div class="seccion-usuario">
        <div class="nombre-usuario">
            <!-- Muestra ícono diferente según el rol (profesor o estudiante) -->
            <i class="fas <?php echo ($_SESSION['rol'] == 2 ? 'fa-user-tie' : 'fa-user-graduate'); ?>"></i><br>
            <!-- Muestra el nombre del usuario (escapado para seguridad) -->
            <?php echo htmlspecialchars($_SESSION['nombre']); ?>
            <!-- Muestra el tipo de usuario -->
            <small><?php echo ($_SESSION['rol'] == 2 ? 'Profesor' : 'Estudiante'); ?></small>
        </div>
        
        <!-- Botón de ajustes -->
        <button class="boton-ajustes" onclick="window.location.href='ajustes.php'">
            <i class="fas fa-cog"></i> Ajustes
        </button>
        
        <!-- Botón de cierre de sesión -->
        <button class="boton-logout" onclick="window.location.href='/portal/logout.php'">
            <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
        </button>
    </div>
    
    <!-- Menú de navegación -->
    <nav class="menu-menciones">
        <!-- Enlace dinámico a Inicio (diferente para profesores y estudiantes) -->
        <a href="<?php echo ($_SESSION['rol'] == 2 ? 'profesor.php' : 'estudiante.php'); ?>" class="menu-link">
            <i class="fas fa-home"></i> Inicio
        </a>
        
        <!-- Enlaces a las diferentes menciones -->
        <a href="telematica.php" class="menu-link">
            <i class="fas fa-network-wired"></i> Telemática
        </a>
        <a href="administracion.php" class="menu-link">
            <i class="fas fa-briefcase"></i> Administración
        </a>
        <a href="contabilidad.php" class="menu-link">
            <i class="fas fa-calculator"></i> Contabilidad
        </a>
        <a href="turismo.php" class="menu-link">
            <i class="fas fa-umbrella-beach"></i> Turismo
        </a>
        
        <!-- Enlace para registrar nuevo profesor (visible según lógica de permisos) -->
        <a href="registro_profesor.php" class="menu-link">
            <i class="fas fa-chalkboard-teacher"></i> Registrar nuevo profesor
        </a>
        <!-- Espacio para otros elementos del menú -->
    </nav>
</div>