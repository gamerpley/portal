<?php
// Inicia o reanuda la sesión
session_start();

// Verifica si el usuario está logueado y tiene rol 1 (estudiante) o 2 (profesor)
if (!isset($_SESSION['id']) || ($_SESSION['rol'] != 1 && $_SESSION['rol'] != 2)) {
    // Redirige al index si no cumple los requisitos
    header("Location: ../index.php");
    exit(); // Termina la ejecución del script
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración - ET José Ricardo Guillén</title>
    <!-- Hojas de estilo -->
    <link rel="stylesheet" href="../css/estilo-ifaz.css"> <!-- Estilos generales -->
    <link rel="stylesheet" href="../css/telematica.css"> <!-- Estilos específicos -->
    <!-- Font Awesome para íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Incluye el header para estudiantes -->
    <?php include 'includes/header_estudiantes.php'; ?>
    
    <!-- Contenido principal -->
    <main class="main-content">
        <!-- Banner principal -->
        <section class="hero-telematica" style="background: linear-gradient(rgba(70, 130, 180, 0.8), rgba(70, 130, 180, 0.8)), url('../img/banner-administracion.jpg') center/cover;">
            <h1><i class="fas fa-briefcase"></i> TÉCNICO MEDIO EN ADMINISTRACIÓN</h1>
            <p class="subtitulo">Formando profesionales para la gestión eficiente de organizaciones</p>
        </section>
        
        <!-- Sección de perfil profesional -->
        <section class="perfil-profesional">
            <h2><i class="fas fa-user-tie"></i> Perfil Profesional</h2>
            <p>Capacitado para desempeñarse en:</p>
            <ul>
                <li>Gestión de recursos humanos y financieros</li>
                <li>Planificación y organización de procesos administrativos</li>
                <li>Control de transacciones comerciales y procesos contables</li>
                <li>Aplicación de tecnologías para la administración moderna</li>
            </ul>
        </section>
        
        <!-- Plan de estudios por años -->
        <div class="plan-estudio">
            <!-- Primer año -->
            <div class="anio-card">
                <h3><i class="fas fa-calendar-alt"></i> 1er Año</h3>
                <ul class="materias-list">
                    <li>Introducción a la Administración</li>
                    <li>Contabilidad Básica</li>
                    <li>Matemáticas Aplicadas</li>
                    <li>Proyectos Comunitarios</li>
                    <li>Informática para la Gestión</li>
                </ul>
            </div>

            <!-- Segundo año -->
            <div class="anio-card">
                <h3><i class="fas fa-calendar-alt"></i> 2do Año</h3>
                <ul class="materias-list">
                    <li>Procesos Administrativos</li>
                    <li>Legislación Comercial</li>
                    <li>Economía Social</li>
                    <li>Gestión de Documentos</li>
                    <li>Proyectos Socioproductivos</li>
                </ul>
            </div>

            <!-- Tercer año -->
            <div class="anio-card">
                <h3><i class="fas fa-calendar-alt"></i> 3er Año</h3>
                <ul class="materias-list">
                    <li>Administración de Personal</li>
                    <li>Costos y Presupuestos</li>
                    <li>Software Administrativo</li>
                    <li>Marketing Básico</li>
                    <li>Ética Profesional</li>
                </ul>
            </div>

            <!-- Cuarto año -->
            <div class="anio-card">
                <h3><i class="fas fa-calendar-alt"></i> 4to Año</h3>
                <ul class="materias-list">
                    <li>Gestión Financiera</li>
                    <li>Auditoría Administrativa</li>
                    <li>Proyectos de Emprendimiento</li>
                    <li>Comercio Internacional</li>
                    <li>Seguridad Laboral</li>
                </ul>
            </div>

            <!-- Quinto año -->
            <div class="anio-card">
                <h3><i class="fas fa-calendar-alt"></i> 5to Año</h3>
                <ul class="materias-list">
                    <li>Planificación Estratégica</li>
                    <li>Logística Empresarial</li>
                    <li>Administración Pública</li>
                    <li>Proyectos Integradores</li>
                    <li>Práctica Profesional</li>
                </ul>
            </div>
        </div>
        
        <!-- Sección de enfoque educativo -->
        <section class="enfoque-educativo">
            <h2><i class="fas fa-graduation-cap"></i> Nuestro Método</h2>
            <div class="grid-enfoque">
                <!-- Tarjeta 1 -->
                <div class="card-enfoque">
                    <i class="fas fa-chart-line"></i>
                    <h3>Enfoque Práctico</h3>
                    <p>Simulaciones de gestión empresarial con casos reales</p>
                </div>
                <!-- Tarjeta 2 -->
                <div class="card-enfoque">
                    <i class="fas fa-handshake"></i>
                    <h3>Vinculación Laboral</h3>
                    <p>Convenios con empresas públicas y privadas</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Pie de página -->
    <footer class="footer-telematica">
        <!-- Muestra el año actual dinámicamente -->
        <p>© <?php echo date('Y'); ?> Escuela Técnica "José Ricardo Guillén"</p>
    </footer>
</body>
</html>