<?php
// Inicia o reanuda la sesión existente
session_start();

// Verifica si el usuario no está logueado (no existe id en sesión)
// o si no tiene rol 1 (estudiante) ni 2 (profesor)
if (!isset($_SESSION['id']) || ($_SESSION['rol'] != 1 && $_SESSION['rol'] != 2)) {
    // Redirige a la página principal si no cumple los requisitos
    header("Location: ../index.php");
    // Termina la ejecución del script
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Configuración básica del documento -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telemática - ET José Ricardo Guillén</title>
    <!-- Hojas de estilo -->
    <link rel="stylesheet" href="../css/estilo-ifaz.css"> <!-- Estilos generales -->
    <link rel="stylesheet" href="../css/telematica.css"> <!-- Estilos específicos para telemática -->
    <!-- Iconos de Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Incluye el header para estudiantes -->
    <?php include 'includes/header_estudiantes.php'; ?>
    
    <!-- Contenido principal de la página -->
    <main class="main-content">
        <!-- Banner principal -->
        <section class="hero-telematica">
            <h1><i class="fas fa-network-wired"></i> TÉCNICO MEDIO EN TELEMÁTICA</h1>
            <p class="subtitulo">Formando profesionales para la era digital</p>
        </section>
        
        <!-- Sección de perfil profesional -->
        <section class="perfil-profesional">
            <h2><i class="fas fa-user-tie"></i> Perfil Profesional</h2>
            <p>Capacitado para desempeñarse en:</p>
            <ul>
                <li>Programación (Python, Java, C++)</li>
                <li>Redes LAN/WAN y seguridad informática</li>
                <li>Administración de sistemas operativos</li>
                <li>Automatización de procesos con IoT</li>
            </ul>
        </section>
        
        <!-- Plan de estudios por años -->
        <div class="plan-estudio">
            <!-- Primer año -->
            <div class="anio-card">
                <h3><i class="fas fa-calendar-alt"></i> 1er Año</h3>
                <ul class="materias-list">
                    <li>Introducción a la Informática</li>
                    <li>Redes de Datos Básicas</li>
                    <li>Electricidad Fundamental</li>
                    <li>Matemáticas Aplicadas</li>
                    <li>Proyectos Comunitarios</li>
                </ul>
            </div>

            <!-- Segundo año -->
            <div class="anio-card">
                <h3><i class="fas fa-calendar-alt"></i> 2do Año</h3>
                <ul class="materias-list">
                    <li>Sistemas Operativos</li>
                    <li>Mantenimiento de Hardware</li>
                    <li>Química Aplicada</li>
                    <li>Robótica Básica</li>
                    <li>Proyectos Socioproductivos</li>
                </ul>
            </div>

            <!-- Tercer año -->
            <div class="anio-card">
                <h3><i class="fas fa-calendar-alt"></i> 3er Año</h3>
                <ul class="materias-list">
                    <li>Programación Básica</li>
                    <li>Protocolos de Comunicación</li>
                    <li>Aplicaciones Móviles</li>
                    <li>Electrotecnia</li>
                    <li>Legislación Tecnológica</li>
                </ul>
            </div>

            <!-- Cuarto año -->
            <div class="anio-card">
                <h3><i class="fas fa-calendar-alt"></i> 4to Año</h3>
                <ul class="materias-list">
                    <li>Bases de Datos</li>
                    <li>Seguridad Informática</li>
                    <li>Automatización Industrial</li>
                    <li>Procesamiento Digital</li>
                    <li>Diseño de Sistemas</li>
                </ul>
            </div>

            <!-- Quinto año -->
            <div class="anio-card">
                <h3><i class="fas fa-calendar-alt"></i> 5to Año</h3>
                <ul class="materias-list">
                    <li>Blockchain y Criptografía</li>
                    <li>Internet de las Cosas (IoT)</li>
                    <li>Programación Avanzada</li>
                    <li>Ciberseguridad</li>
                    <li>Proyectos Integradores</li>
                </ul>
            </div>
        </div>
        
        <!-- Sección de enfoque educativo -->
        <section class="enfoque-educativo">
            <h2><i class="fas fa-graduation-cap"></i> Nuestro Método</h2>
            <div class="grid-enfoque">
                <!-- Tarjeta 1: Prácticas Reales -->
                <div class="card-enfoque">
                    <i class="fas fa-laptop-code"></i>
                    <h3>Prácticas Reales</h3>
                    <p>Laboratorios equipados con tecnología actualizada</p>
                </div>
                <!-- Tarjeta 2: Vinculación Laboral -->
                <div class="card-enfoque">
                    <i class="fas fa-briefcase"></i>
                    <h3>Vinculación Laboral</h3>
                    <p>Convenios con empresas del sector tecnológico</p>
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