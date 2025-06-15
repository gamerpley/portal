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
    <title>Turismo - ET José Ricardo Guillén</title>
    <!-- Hojas de estilo -->
    <link rel="stylesheet" href="../css/estilo-ifaz.css"> <!-- Estilos generales -->
    <link rel="stylesheet" href="../css/telematica.css"> <!-- Reutiliza estilos de telemática -->
    <!-- Iconos de Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Incluye el header para estudiantes -->
    <?php include 'includes/header_estudiantes.php'; ?>
    
    <!-- Contenido principal de la página -->
    <main class="main-content">
        <!-- Banner principal con gradiente verde y fondo de imagen -->
        <section class="hero-telematica" style="background: linear-gradient(rgba(0, 100, 0, 0.8), rgba(0, 80, 0, 0.8)), url('../img/banner-turismo.jpg') center/cover;">
            <h1><i class="fas fa-umbrella-beach"></i> TÉCNICO MEDIO EN TURISMO</h1>
            <p class="subtitulo">Formando profesionales para la industria turística</p>
        </section>
        
        <!-- Sección de perfil profesional -->
        <section class="perfil-profesional">
            <h2><i class="fas fa-user-tie"></i> Perfil Profesional</h2>
            <p>Capacitado para desempeñarse en:</p>
            <ul>
                <li>Formulación, ejecución y evaluación de proyectos turísticos</li>
                <li>Programación y animación de eventos turísticos</li>
                <li>Creación y promoción de servicios turísticos</li>
                <li>Gestión hotelera y gastronómica</li>
                <li>Promoción del turismo local y regional</li>
            </ul>
        </section>
        
        <!-- Plan de estudios por años -->
        <div class="plan-estudio">
            <!-- Primer año -->
            <div class="anio-card">
                <h3><i class="fas fa-calendar-alt"></i> 1er Año</h3>
                <ul class="materias-list">
                    <li>Introducción al Turismo</li>
                    <li>Geografía Turística Nacional</li>
                    <li>Animación y Recreación</li>
                    <li>Idiomas Aplicados al Turismo</li>
                    <li>Proyectos Comunitarios</li>
                </ul>
            </div>

            <!-- Segundo año -->
            <div class="anio-card">
                <h3><i class="fas fa-calendar-alt"></i> 2do Año</h3>
                <ul class="materias-list">
                    <li>Gestión Turística</li>
                    <li>Patrimonio Cultural y Natural</li>
                    <li>Diseño de Rutas Turísticas</li>
                    <li>Excursionismo y Seguridad</li>
                    <li>Proyectos Socioproductivos</li>
                </ul>
            </div>

            <!-- Tercer año -->
            <div class="anio-card">
                <h3><i class="fas fa-calendar-alt"></i> 3er Año</h3>
                <ul class="materias-list">
                    <li>Turismo Socio Comunitario</li>
                    <li>Economía Turística</li>
                    <li>Introducción a la Hotelería</li>
                    <li>Control de Gestión Turística</li>
                    <li>Legislación Turística</li>
                </ul>
            </div>

            <!-- Cuarto año -->
            <div class="anio-card">
                <h3><i class="fas fa-calendar-alt"></i> 4to Año</h3>
                <ul class="materias-list">
                    <li>Organización de Eventos</li>
                    <li>Protocolo y Etiqueta</li>
                    <li>Gerencia Hotelera</li>
                    <li>Diseño de Paquetes Turísticos</li>
                    <li>Promoción Turística</li>
                </ul>
            </div>

            <!-- Quinto año -->
            <div class="anio-card">
                <h3><i class="fas fa-calendar-alt"></i> 5to Año</h3>
                <ul class="materias-list">
                    <li>Turismo Sostenible</li>
                    <li>Planificación Territorial Turística</li>
                    <li>Transporte y Logística Turística</li>
                    <li>Ferias y Convenciones</li>
                    <li>Proyectos Integradores</li>
                </ul>
            </div>
        </div>
        
        <!-- Sección de enfoque educativo -->
        <section class="enfoque-educativo">
            <h2><i class="fas fa-graduation-cap"></i> Nuestro Método</h2>
            <div class="grid-enfoque">
                <!-- Tarjeta 1: Prácticas de Campo -->
                <div class="card-enfoque">
                    <i class="fas fa-map-marked-alt"></i>
                    <h3>Prácticas de Campo</h3>
                    <p>Visitas a destinos turísticos y hoteleros de la región</p>
                </div>
                <!-- Tarjeta 2: Vinculación Comunitaria -->
                <div class="card-enfoque">
                    <i class="fas fa-hands-helping"></i>
                    <h3>Vinculación Comunitaria</h3>
                    <p>Proyectos que desarrollan el turismo local</p>
                </div>
                <!-- Tarjeta 3: Tecnología Turística -->
                <div class="card-enfoque">
                    <i class="fas fa-laptop"></i>
                    <h3>Tecnología Turística</h3>
                    <p>Uso de sistemas de reservación y gestión turística</p>
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