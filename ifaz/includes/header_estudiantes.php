<?php
// Verifica si la sesión no está activa y la inicia si es necesario
if (session_status() === PHP_SESSION_NONE) session_start();
// Si el usuario no está logueado (no existe 'id' en la sesión), redirige al inicio
if (!isset($_SESSION['id'])) {
    header("Location: ../index.php");
    exit(); // Termina la ejecución del script
}
?>
<!-- Contenedor principal del menú lateral -->
<div class="header-lateral">
    <!-- Logo de la institución -->
    <img src="/portal/ifaz/includes/logo.png" alt="Logo E.T. José Ricardo Guillén" class="logo">
    <!-- Sección de información del usuario -->
    <div class="seccion-usuario">
        <div class="nombre-usuario">
            <!-- Ícono dinámico: 
                 - Profesor (rol 2): ícono de pizarra (fa-chalkboard-teacher)
                 - Estudiante (rol 1): ícono de graduado (fa-user-graduate) -->
            <i class="fas <?php echo ($_SESSION['rol'] == 2 ? 'fa-chalkboard-teacher' : 'fa-user-graduate'); ?>"></i><br>
            <!-- Nombre del usuario (escapado para seguridad con htmlspecialchars) -->
            <?php echo htmlspecialchars($_SESSION['nombre']); ?>
            <!-- Texto del rol: "Profesor" o "Estudiante" -->
            <small><?php echo ($_SESSION['rol'] == 1 ? 'Estudiante' : 'Profesor'); ?></small>
        </div>
        <!-- Botón de ajustes (redirige a ajustes.php) -->
        <button class="boton-ajustes" onclick="window.location.href='ajustes.php'">
            <i class="fas fa-cog"></i> Ajustes
        </button>
        
        <!-- Botón de cerrar sesión (redirige a logout.php) -->
        <button class="boton-logout" onclick="window.location.href='/portal/logout.php'">
            <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
        </button>
    </div>
    
    <!-- Menú de navegación principal -->
    <nav class="menu-menciones">
        <!-- Enlace a Inicio: 
             - Profesor (rol 2): redirige a profesor.php
             - Estudiante (rol 1): redirige a estudiante.php -->
        <a href="<?php echo ($_SESSION['rol'] == 2 ? 'profesor.php' : 'estudiante.php'); ?>" class="menu-link">
            <i class="fas fa-home"></i> Inicio
        </a>
        
        <!-- Enlaces a las menciones (siempre visibles) -->
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

        <!-- Enlace para registrar nuevo profesor (SOLO visible para rol 2) -->
        <?php if ($_SESSION['rol'] == 2): ?>
            <a href="registro_profesor.php" class="menu-link">
                <i class="fas fa-chalkboard-teacher"></i> Registrar nuevo profesor
            </a>
        <?php endif; ?>
    </nav>
</div>