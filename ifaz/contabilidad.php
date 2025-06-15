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
    <title>Contabilidad - ET José Ricardo Guillén</title>
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
        <!-- Banner principal con gradiente rojo y fondo de imagen -->
        <section class="hero-telematica" style="background: linear-gradient(rgba(255, 0, 0, 0.66), rgba(255, 119, 119, 0.68)), url('../img/banner-contabilidad.jpg') center/cover;">
            <h1><i class="fas fa-calculator"></i> TÉCNICO MEDIO EN CONTABILIDAD</h1>
            <p class="subtitulo">Formando expertos en gestión financiera y fiscal</p>
        </section>
        
        <!-- Sección de perfil profesional -->
        <section class="perfil-profesional">
            <h2><i class="fas fa-user-tie"></i> Perfil Profesional</h2>
            <p>Capacitado para desempeñarse en:</p>
            <ul>
                <li>Gestión contable y fiscal (libros diarios, mayor, balances)</li>
                <li>Análisis de estados financieros y auditoría interna</li>
                <li>Uso de software contable (Tally, SAP, sistemas nacionales)</li>
                <li>Elaboración de informes económicos y tributarios</li>
                <li>Normativas legales (Código de Comercio, LOPCYMAT)</li>
            </ul>
        </section>
        
        <!-- Plan de estudios por años -->
        <div class="plan-estudio">
            <!-- Primer año -->
            <div class="anio-card">
                <h3><i class="fas fa-calendar-alt"></i> 1er Año</h3>
                <ul class="materias-list">
                    <li>Introducción a la Contabilidad</li>
                    <li>Principios Contables (PCGA)</li>
                    <li>Matemáticas Financieras Básicas</li>
                    <li>Derecho Comercial Venezolano</li>
                    <li>Proyectos Comunitarios</li>
                </ul>
            </div>

            <!-- Segundo año -->
            <div class="anio-card">
                <h3><i class="fas fa-calendar-alt"></i> 2do Año</h3>
                <ul class="materias-list">
                    <li>Libros Auxiliares (Diario, Mayor)</li>
                    <li>Teoría del Cargo y Abono</li>
                    <li>Contabilidad Social</li>
                    <li>Legislación Tributaria</li>
                    <li>Proyectos Socioproductivos</li>
                </ul>
            </div>

            <!-- Tercer año -->
            <div class="anio-card">
                <h3><i class="fas fa-calendar-alt"></i> 3er Año</h3>
                <ul class="materias-list">
                    <li>Inventarios y Ajustes Contables</li>
                    <li>Control Interno Organizacional</li>
                    <li>Contabilidad de Costos</li>
                    <li>Hoja de Trabajo</li>
                    <li>Procesos Aduaneros</li>
                </ul>
            </div>

            <!-- Cuarto año -->
            <div class="anio-card">
                <h3><i class="fas fa-calendar-alt"></i> 4to Año</h3>
                <ul class="materias-list">
                    <li>Estados Financieros (Balance General, Flujo de Efectivo)</li>
                    <li>Conciliaciones Bancarias</li>
                    <li>Contabilidad Bancaria</li>
                    <li>TIC aplicadas a la Contabilidad</li>
                    <li>Auditoría Básica</li>
                </ul>
            </div>

            <!-- Quinto año -->
            <div class="anio-card">
                <h3><i class="fas fa-calendar-alt"></i> 5to Año</h3>
                <ul class="materias-list">
                    <li>Análisis Financiero (Ratios, Dupont)</li>
                    <li>Proyectos Socioproductivos Contables</li>
                    <li>Normas Internacionales (NIIF)</li>
                    <li>Ética Profesional</li>
                    <li>Práctica Preprofesional</li>
                </ul>
            </div>
        </div>
        
        <!-- Sección de enfoque educativo -->
        <section class="enfoque-educativo">
            <h2><i class="fas fa-graduation-cap"></i> Nuestro Método</h2>
            <div class="grid-enfoque">
                <!-- Tarjeta 1: Software Contable -->
                <div class="card-enfoque">
                    <i class="fas fa-laptop"></i>
                    <h3>Software Contable</h3>
                    <p>Aprendizaje con herramientas digitales (Tally, SAP) y sistemas nacionales</p>
                </div>
                <!-- Tarjeta 2: Vinculación Laboral -->
                <div class="card-enfoque">
                    <i class="fas fa-handshake"></i>
                    <h3>Vinculación Laboral</h3>
                    <p>Convenios con firmas contables, UPETAI y entes fiscales</p>
                </div>
                <!-- Tarjeta 3: Enfoque Práctico -->
                <div class="card-enfoque">
                    <i class="fas fa-chart-line"></i>
                    <h3>Enfoque Práctico</h3>
                    <p>Simulación de casos reales (impuestos, nóminas, auditorías)</p>
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